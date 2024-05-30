@if (isset($attributes))
    <div class="col-lg-4 col-6">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <p class="card-text font-small-3 mb-0">{{ $attributes['title'] }}</p>
                    <h4 class="font-weight-bolder mb-0">{{ $attributes['count'] }}</h4>
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
