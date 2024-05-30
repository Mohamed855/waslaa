@if (isset($attributes))
    <div class="col-lg-4 col-sm-6 col-12">
        <p class="navigation-header">
            <span style='font-size: 16px;'>{{ $attributes['title'] }}</span>
        </p>
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <p class="card-text font-small-3 mb-0">@lang('translate.total')</p>
                    <h4 class="font-weight-bolder mb-0">{{ $attributes['total-count'] }}</h4>
                </div>
                <div class="text-center">
                    <p class="card-text font-small-3 mb-0">@lang('translate.active')</p>
                    <h4 class="font-weight-bolder mb-0">{{ $attributes['active-count'] }}</h4>
                </div>
                <div class="avatar bg-{{ $attributes['color'] }} p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="{{ $attributes['icon'] }}"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
