<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ad\AdResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Filter\ProductFilterResource;
use App\Http\Resources\Filter\SearchOutputResource;
use App\Http\Resources\Location\CountryResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Http\Resources\SubCategory\SubCategoryWithProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppController extends Controller
{
    use QueriesTrait, ResponseTrait;

    private function getADs (): AnonymousResourceCollection
    {
        $ads = $this->activeAd()->paginate(10);
        return AdResource::collection($ads);
    }
    private function getCategories (): AnonymousResourceCollection
    {
        $categories = $this->activeCategory()->paginate(10);
        return CategoryResource::collection($categories);
    }
    private function getSubCategories ($catId): AnonymousResourceCollection
    {
        $subCategories = $this->activeSubcategory()->where('category', $catId)->paginate(10);
        return SubCategoryResource::collection($subCategories);
    }
    private function getVendors ($catId, $subCatId = null): AnonymousResourceCollection
    {
        $vendorRelationTable = $subCatId ? 'vendor_subcategories' : 'vendor_categories';
        $targetColumn = $subCatId ? 'subcategory' : 'category';
        $targetId = $subCatId ?? $catId;

        $vendors = $this->activeVendor()->join($vendorRelationTable . ' as vc', 'vc.vendor', 'vendors.id')
            ->where('vc.' . $targetColumn, $targetId)->with(['_city' => function ($cityQuery) {
                $cityQuery->with('_country');
            }, '_subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->orderBy('priority', 'desc')->paginate(10);

        return VendorResource::collection($vendors);
    }
    private function getSubCategoriesWithProducts ($vendor_id): AnonymousResourceCollection
    {
        $subCategoriesWithProduct = $this->activeSubcategory()
            ->join('vendor_subcategories as VSC', 'subcategories.id', '=', 'VSC.subcategory')
            ->where('VSC.vendor', $vendor_id)
            ->select([
                'subcategories.id',
                'subcategories.' . Helper::getColumnOnLang('name'),
                'subcategories.avatar',
            ])->with('_products', function ($productQuery) {
                $productQuery->where('active', 1)->with('_components', '_types');
            })->paginate(10);
        return SubCategoryWithProductResource::collection($subCategoriesWithProduct);
    }
    private function getOfferedProducts (): AnonymousResourceCollection
    {
        $offeredProducts = $this->offers()->with(['_subcategory', '_components', '_types'])->paginate(10);
        return ProductResource::collection($offeredProducts);
    }
    private function getSearchOutput ($type, $key): AnonymousResourceCollection
    {
        $output = match ($type) {
            'vendors' => $this->activeVendor()
                ->where('name', 'like', '%' . $key . '%')->paginate(10),
            'categories' => $this->activeCategory()
                ->where('name_en', 'like', '%' . $key . '%')
                ->orWhere('name_ar', 'like', '%' . $key . '%')->paginate(10),
            'subcategories' => $this->activeSubcategory()
                ->where('name_en', 'like', '%' . $key . '%')
                ->orWhere('name_ar', 'like', '%' . $key . '%')->paginate(10),
            default => $this->activeProduct()
                ->where('name_en', 'like', '%' . $key . '%')
                ->orWhere('name_ar', 'like', '%' . $key . '%')->paginate(10),
        };
        return SearchOutputResource::collection($output);
    }
    private function filterAccordingTo($method, $products, $desc): AnonymousResourceCollection
    {
        $filteredData = [];

        if ($method != 'offers') {
            if ($method == 'rates') {
                $filteredData = collect($products)->sortBy(function ($product) {
                    return $product['rate'];
                }, descending: $desc);
            } elseif ($method == 'price') {
                $filteredData = collect($products)->sortBy('types.0.price', descending: $desc);
            } else {
                $filteredData = $products;
            }
        } else {
            foreach ($products as $product) {
                if ($product['offer'] != null)
                    $filteredData[] = $product;
            }
            $filteredData = collect($filteredData)->sortBy(function ($product) {
                return $product['offer']['value'];
            }, descending: $desc);
        }

        return ProductFilterResource::collection($filteredData);
    }

    public function mainPage (): JsonResponse
    {
        return $this->returnData('Main View', [
            'ads' => $this->getADs(),
            'categories' => $this->getCategories(),
        ]);
    }
    public function categoryPage ($catId, $subCatId = null): JsonResponse
    {
        return $this->returnData('Categories View', [
            'subCategories' => $this->getSubCategories($catId),
            'vendors' => $this->getVendors($catId, $subCatId),
        ]);
    }
    public function vendorPage ($id): JsonResponse
    {
        $favoritesUser = $this->favoriteVendors()->where('favorite_id', $id)->get();
        $selectedVendor = $this->vendor()->find($id);
        return $this->returnData('Vendor View', [
            'countOfFavorites' => count($favoritesUser),
            'selectedVendor' => new VendorResource($selectedVendor),
            'subCategoriesWithProduct' => $this->getSubCategoriesWithProducts($id),
        ]);
    }
    public function productPage ($id): JsonResponse
    {
        $selectedProduct = $this->product()->with(['_subcategory', '_components', '_types'])->find($id);
        return $this->returnData('Product View', [
            'selectedProduct' => new ProductResource($selectedProduct),
        ]);
    }
    public function offersPage (): JsonResponse
    {
        return $this->returnData('Offers View', [
            'offeredProducts' => $this->getOfferedProducts(),
        ]);
    }
    public function countries(): JsonResponse
    {
        $allCountries = $this->activeCountry()->with(['_cities' => function ($citiesQuery) {
            $citiesQuery->where('active', 1);
        }])->paginate(10);

        return $this->returnData('All Countries', CountryResource::collection($allCountries));
    }

    public function search (Request $request): JsonResponse
    {
        if (! in_array($request['type'], ['vendors', 'categories', 'subcategories', 'products']))
            return $this->returnError('Invalid type');

        return $this->returnData('Search View', [
            'results' => $this->getSearchOutput($request['type'], $request['key']),
        ]);
    }

    public function filter (Request $request): JsonResponse
    {
        if (! in_array($request['method'], ['offers', 'rates', 'price']))
            return $this->returnError('Invalid method');

        $filteredProducts = $this->filterAccordingTo($request['method'], ProductResource::collection($request['products']) , $request['desc']);
        return $this->returnData('Filtered by ' . $request['method'], $filteredProducts);
    }
}
