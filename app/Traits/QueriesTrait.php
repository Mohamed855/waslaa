<?php

namespace App\Traits;

use App\Models\Address;
use App\Models\Component;
use App\Models\Invoice;
use App\Models\InvoiceOrder;
use App\Models\Notification;
use App\Models\OrderProduct;
use App\Models\ProductComponent;
use App\Models\ProductType;
use App\Models\Rate;
use App\Models\Type;
use App\Models\VendorCategory;
use App\Models\VendorSubcategory;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Ad;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\Manager;
use App\Models\Order;
use App\Models\Product;
use App\Models\SiteOption;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Vendor;

trait QueriesTrait {
    public function ad(): Builder { return Ad::query(); }

    public function notification(): Builder { return Notification::query(); }

    public function address(): Builder { return Address::query(); }

    public function admin(): Builder { return Admin::query(); }

    public function cart(): Builder { return Cart::query(); }

    public function category(): Builder { return Category::query(); }

    public function city(): Builder { return City::query(); }

    public function component(): Builder { return Component::query(); }

    public function country(): Builder { return Country::query(); }

    public function favoriteVendors(): Builder { return Favorite::query()->where('type', 'vendor'); }

    public function favoriteProducts(): Builder { return Favorite::query()->where('type', 'product'); }

    public function manager(): Builder { return Manager::query(); }

    public function order(): Builder { return Order::query(); }

    public function orderProduct(): Builder { return OrderProduct::query(); }

    public function invoice(): Builder { return Invoice::query(); }

    public function invoiceOrders(): Builder { return InvoiceOrder::query(); }

    public function product(): Builder { return Product::query(); }

    public function offers(): Builder { return $this->activeProduct()->where('offer', 1); }

    public function productComponent(): Builder { return ProductComponent::query(); }

    public function productType(): Builder { return ProductType::query(); }

    public function rates(): Builder { return Rate::query(); }

    public function siteOption(): Builder { return SiteOption::query(); }

    public function subcategory(): Builder { return Subcategory::query(); }

    public function type(): Builder { return Type::query(); }

    public function user(): Builder { return User::query(); }

    public function vendor(): Builder { return Vendor::query(); }

    public function vendorCategory(): Builder { return VendorCategory::query(); }

    public function vendorSubcategory(): Builder { return VendorSubcategory::query(); }

    // Active Queries

    public function activeAd(): Builder { return $this->ad()->where('active', 1); }

    public function activeAdmin(): Builder { return $this->admin()->where('active', 1); }

    public function activeCategory(): Builder { return $this->category()->where('active', 1); }

    public function activeCity(): Builder { return $this->city()->where('active', 1); }

    public function activeComponent(): Builder { return $this->component()->where('active', 1); }

    public function activeCountry(): Builder { return $this->country()->where('active', 1); }

    public function activeManager(): Builder { return $this->manager()->where('active', 1); }

    public function activeProduct(): Builder { return $this->product()->where('active', 1); }

    public function activeSubcategory(): Builder { return $this->subcategory()->where('active', 1); }

    public function activeType(): Builder { return $this->type()->where('active', 1); }

    public function activeUser(): Builder { return $this->user()->where('active', 1); }

    public function activeVendor(): Builder { return $this->vendor()->where('active', 1); }
}
