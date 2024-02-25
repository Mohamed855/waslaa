<?php

namespace App\Helpers;

use App\Http\Resources\Ad\AdResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Filter\ProductFilterResource;
use App\Http\Resources\Filter\SearchOutputResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Http\Resources\SubCategory\SubCategoryWithProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\QueriesTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppHelper
{
    use QueriesTrait;

    public function getADs (): AnonymousResourceCollection
    {
        $ads = $this->activeAd()->paginate(10);
        return AdResource::collection($ads);
    }
    public function getCategories (): AnonymousResourceCollection
    {
        $categories = $this->activeCategory()->paginate(10);
        return CategoryResource::collection($categories);
    }
    public function getSubCategories ($catId): AnonymousResourceCollection
    {
        $subCategories = $this->activeSubcategory()->where('category', $catId)->paginate(10);
        return SubCategoryResource::collection($subCategories);
    }
    public function getVendors ($catId, $subCatId = null): AnonymousResourceCollection
    {
        $vendorRelationTable = $subCatId ? 'vendor_subcategories' : 'vendor_categories';
        $targetColumn = $subCatId ? 'subcategory' : 'category';
        $targetId = $subCatId ?? $catId;

        $vendors = $this->activeVendor()->join($vendorRelationTable . ' as vc', 'vc.vendor', 'vendors.id')
            ->where('vc.' . $targetColumn, $targetId)->with(['_city' => function ($cityQuery) {
                $cityQuery->with('_country');
            }, '_subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->orderBy('priority')->paginate(10);

        return VendorResource::collection($vendors);
    }
    public function countOfVendorFavorites ($vendorId): int
    {
        $favoritesUser = $this->favoriteVendors()->where('favorite_id', $vendorId)->get();
        $countOfFavorites = count($favoritesUser);
        if ($countOfFavorites >= 1000 && $countOfFavorites < 1000000) {
            $countOfFavorites = floor($countOfFavorites / 1000) . ' K';
        } elseif ($countOfFavorites >= 1000000) {
            $countOfFavorites = floor($countOfFavorites / 1000000) . ' M';
        }
        return $countOfFavorites;
    }
    public function getUserRate ($type, $selectedId)
    {
        $currUserRate = $this->rates()
            ->where('type', $type)
            ->where('rate_id', $selectedId)
            ->where('user', auth()->id())
            ->first(['rate']);

        return $currUserRate['rate'] ?? 0;
    }
    public function getSubCategoriesWithProducts ($vendor_id): AnonymousResourceCollection
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
    public function getOfferedProducts (): AnonymousResourceCollection
    {
        $offeredProducts = $this->offers()->with(['_subcategory', '_components', '_types'])->paginate(10);
        return ProductResource::collection($offeredProducts);
    }
    public function getSearchOutput ($type, $key): AnonymousResourceCollection
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
    public function filterAccordingTo($method, $products, $desc): AnonymousResourceCollection
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


    public static function generateUsername($model, $name): array|string|null
    {
        $username = preg_replace('/[^A-Za-z0-9]/', '', $name);

        $admin = $model::withTrashed()->where('username', $username)->first();

        $i = 1;
        while ($admin) {
            $username .= $i;
            $admin = $model::withTrashed()->where('username', $username)->first();
            $i++;
        }
        return $username;
    }
}
