<?php

namespace App\Helpers;

use App\Http\Resources\Ad\AdResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Filter\ProductFilterResource;
use App\Http\Resources\Filter\SearchOutputResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppHelper
{
    use QueriesTrait, ResponseTrait;

    public function getADs (): AnonymousResourceCollection
    {
        $ads = $this->activeAd()->get();
        return AdResource::collection($ads);
    }
    public function getCategories (): AnonymousResourceCollection
    {
        $categories = $this->activeCategory()->get();
        return CategoryResource::collection($categories);
    }
    public function getSubCategories ($catId): AnonymousResourceCollection
    {
        $subCategories = $this->activeSubcategory()->where('category_id', $catId)->get();
        return SubCategoryResource::collection($subCategories);
    }
    public function getVendors ($catId, $subCatId = null)
    {
        $vendors = $this->activeVendor()->whereHas('categories', function ($query) use ($catId) {
            $query->where('category_id', $catId);
        });

        if ($subCatId) {
            $vendors = $vendors->whereHas('subcategories', function ($query) use ($subCatId) {
                $query->where('subcategory_id', $subCatId);
            });
        }

        $vendors = $vendors->with(['subcategories' => function ($subcategoriesQuery) {
            $subcategoriesQuery->where('active', 1);
        }])->orderBy('priority')->paginate(10);

        return $this->returnData('vendors', Helper::getPaginatedData(VendorResource::collection($vendors)));
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
            ->where('user_id', auth()->id())
            ->first(['rate']);

        return $currUserRate['rate'] ?? 0;
    }
    public function getVendorSubCategories ($vendorId)
    {
        $subCategories = $this->activeSubcategory()->where('vendor_id', $vendorId)->paginate(10);
        return $this->returnData('vendor subcategories', Helper::getPaginatedData(SubCategoryResource::collection($subCategories)));
    }
    public function getSubCategoryProducts ($subcategoryId)
    {
        $products = $this->activeProduct()->where('subcategory_id', $subcategoryId)->with(['components', 'types'])->paginate(10);
        return $this->returnData('subcategory products', Helper::getPaginatedData(ProductResource::collection($products)));
    }
    public function getOfferedProducts ()
    {
        $offeredProducts = $this->offers()->with(['subcategory', 'activeComponents', 'activeTypes'])->paginate(10);
        return $this->returnData('offered products', Helper::getPaginatedData(ProductResource::collection($offeredProducts)));
    }
    public function getSearchOutput ($type, $key)
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
        foreach ($output as $result) {
            $result['avatar'] = url('') . ($result['avatar'] ? '/storage/images/' . $type . '/' . $result['avatar'] : '/storage/images/global/default.jpg');
        }
        return $this->returnData('search output', Helper::getPaginatedData(SearchOutputResource::collection($output)));
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
