<div class="card p-2">
    <div class="card-body">
        <h5 class="card-title">{{ ucfirst($selected->name) . ' (' . $selected->username . ')' }}</h5>
        <p class="card-text">@lang('translate.joinedAt'): {{ date_format($selected->created_at, 'd-m-Y') }}</p>
        <h5 class="card-title">@lang('translate.details')</h5>
        <p class="card-text">@lang('translate.phone'): {{ $selected->phone }}</p>
        <p class="card-text">@lang('translate.secPhone'): {{ $selected->sec_phone ?? '-' }}</p>
        <p class="card-text">@lang('translate.gender'): {{ $selected->gender }}</p>
        <p class="card-text">@lang('translate.city'): {{ $selected->city->$nameOnLang }}</p>
        @if (auth('admin')->check())
            <p class="card-text">@lang('translate.following'): {{ count($selected->favoriteVendors) }}</p>
            <p class="card-text">@lang('translate.userIn'): {{ count($selected->vendors) }}</p>
            <p class="card-text">@lang('translate.complains'): {{ count($selected->complains) }}</p>
        @endif
        <div class="row">
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('userOrders', $selected->username) }}" class="pe-1">@lang('translate.orders')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('userComplains', $selected->username) }}" class="pe-1">@lang('translate.complains')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('userAddresses', $selected->username) }}" class="pe-1">@lang('translate.addresses')</a>
            </div>
        </div>
    </div>
</div>
