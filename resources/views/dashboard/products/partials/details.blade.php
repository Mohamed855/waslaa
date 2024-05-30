<div class="card p-2">
    <div class="card-body">
        <h5 class="card-title">{{ ucfirst($selected->$nameOnLang) }}</h5>
        <p class="card-text">@lang('translate.createdAt') : {{ date_format($selected->created_at, 'd-m-Y') }}</p>
        <p class="card-text">@lang('translate.category') : {{ $selected->category?->$nameOnLang }}</p>
        <p class="card-text">@lang('translate.subcategory') : {{ $selected->subcategory?->$nameOnLang }}</p>
        <p class="card-text">@lang('translate.rate') : {{ $selected->rate }}</p>
        <p class="card-text">@lang('translate.favoriteBy') : {{ count($selected->favorites) }}</p>
        <p class="card-text" style="font-weight: bold">@lang('translate.prices')</p>
        @foreach ($selected->types as $type)
            <p class="card-text">{{ $type->$nameOnLang }} : {{ $type->pivot?->price }}</p>
        @endforeach
        @if ($selected->offer)
            <p class="card-text" style="font-weight: bold">@lang('translate.offer')</p>
            <p class="card-text">@lang('translate.type') : {{ $selected->offer_type }}</p>
            <p class="card-text">@lang('translate.value') : {{ $selected->offer_value }}</p>
        @endif
        <div class="row">
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('productComponents', $selected->id) }}" class="pe-1">@lang('translate.components')</a>
            </div>
            <div class="d-inline-block pt-1 col-6 col-md-3">
                <a href="{{ route('productTypes', $selected->id) }}" class="pe-1">@lang('translate.types')</a>
            </div>
        </div>
    </div>
    @if (auth('vendor')->check())
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                @include('dashboard.products.partials.edit')
            </div>
        </div>
    @endif
</div>
