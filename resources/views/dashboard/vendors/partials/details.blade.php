<div class="card p-2">
    <div class="card-body">
        <h5 class="card-title">{{ ucfirst($selected['name']) . ' (' . $selected->username . ')' }}</h5>
        <p class="card-text">@lang('translate.createdAt') : {{ date_format($selected['created_at'], 'd-m-Y') }}</p>
        <p class="card-text">@lang('translate.city') : {{ $selected['city'][$nameOnLang] }}</p>
        <p class="card-text">@lang('translate.followers') : {{ count($selected['favorites']) }}</p>
        <div class="row">
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorUsers', $selected->username) }}" class="pe-1">@lang('translate.users')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorManagers', $selected->username) }}" class="pe-1">@lang('translate.managers')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorInvoices', $selected->username) }}" class="pe-1">@lang('translate.invoices')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorOrders', $selected->username) }}" class="pe-1">@lang('translate.orders')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorCategories', $selected->username) }}" class="pe-1">@lang('translate.categories')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorSubcategories', $selected->username) }}" class="pe-1">@lang('translate.subcategories')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorProducts', $selected->username) }}" class="pe-1">@lang('translate.products')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorComponents', $selected->username) }}" class="pe-1">@lang('translate.components')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorTypes', $selected->username) }}" class="pe-1">@lang('translate.types')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorComplains', $selected->username) }}" class="pe-1">@lang('translate.complains')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('vendorBranches', $selected->username) }}" class="pe-1">@lang('translate.branches')</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12 m-auto">
            @include('dashboard.vendors.partials.edit')
        </div>
    </div>
</div>
