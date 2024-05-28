<div class="row mb-2">
    <div class="d-inline">
        <h4 class="d-inline">@lang('translate.orders')</h4>
    </div>
</div>
{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        @if (auth('admin')->check())
                            <th>@lang('translate.vendor')</th>
                        @endif
                        <th>@lang('translate.phone')</th>
                        <th>@lang('translate.address')</th>
                        <th>@lang('translate.deliveryMethod')</th>
                        <th>@lang('translate.payMethod')</th>
                        <th>@lang('translate.status')</th>
                        <th>@lang('translate.total')</th>
                        <th>@lang('translate.orderedAt')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $orders = auth('admin')->check() ? $selected['orders'] : $selected['currVendorOrders'];
                    @endphp
                    @foreach ($orders as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (auth('admin')->check())
                                <td><a href="{{ route('vendors.show', $single->vendor['id']) }}">{{ $single->vendor['name'] }}</a></td>
                            @endif
                            <td>{{ $single->deliveryPhone }}</td>
                            <td style="min-width: 320px">{{ $single->address }}</td>
                            <td>{{ __('translate.' . $single->deliveryMethod) }}</td>
                            <td>{{ __('translate.' . $single->payMethod) }}</td>
                            <td>{{ __('translate.' . $single->status) }}</td>
                            <td>{{ $single->totalCost }} @lang('translate.pound')</td>
                            <td>{{ date_format($single->created_at, 'd-m-Y h:i a') }}</td>
                            <td style="min-width: 320px">
                                <a href="{{ route('orders.show', $single->id) }}">
                                    <button class="btn btn-info ms-auto">
                                        <i data-feather="eye"></i>
                                        @lang('translate.show')
                                    </button>
                                </a>
                                <button type="button" class="btn btn-warning ms-auto" onclick="notifyVendor()" data-bs-toggle="modal">
                                    <i data-feather="bell"></i>
                                    @lang('translate.notify')
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
