<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        @if (auth('admin')->check() && ! request()->routeIs(['invoiceOrders', 'vendorOrders']))
                            <th>@lang('translate.vendor')</th>
                        @endif
                        <th>@lang('translate.phone')</th>
                        @if (! request()->routeIs('userOrders'))
                            <th>@lang('translate.user')</th>
                        @endif
                        <th>@lang('translate.address')</th>
                        <th>@lang('translate.deliveryMethod')</th>
                        <th>@lang('translate.payMethod')</th>
                        @if (request()->routeIs(['userOrders', 'vendorOrders', 'invoiceOrders']))
                            <th>@lang('translate.status')</th>
                        @endif
                        <th>@lang('translate.total')</th>
                        <th>@lang('translate.orderedAt')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (auth('admin')->check() && ! request()->routeIs(['invoiceOrders', 'vendorOrders']))
                                <td><a href="{{-- route('showVendor', $single->vendor->username) --}}">{{ $single->vendor['name'] }}</a></td>
                            @endif
                            <td>{{ $single->deliveryPhone }}</td>
                            @if (! request()->routeIs('userOrders'))
                                <td><a href="{{ route('showUser', $single->user->username) }}">{{ $single->user->username }}</a></td>
                            @endif
                            <td style="min-width: 320px">{{ $single->address }}</td>
                            <td>{{ __('translate.' . $single->deliveryMethod) }}</td>
                            <td>{{ __('translate.' . $single->payMethod) }}</td>
                            @if (request()->routeIs(['userOrders', 'vendorOrders', 'invoiceOrders']))
                                <td>{{ __('translate.' . $single->status) }}</td>
                            @endif
                            <td>{{ $single->totalCost }} @lang('translate.pound')</td>
                            <td>{{ date_format($single->created_at, 'd-m-Y h:i a') }}</td>
                            <td style="min-width: 320px">
                                <a href="{{ route('orders.show', $single->id) }}">
                                    <button class="btn btn-warning ms-auto">
                                        <i data-feather="eye"></i>
                                        @lang('translate.show')
                                    </button>
                                </a>
                                @if (! request()->routeIs('invoiceOrders'))
                                    @if ((isset($status) && $status == 'ordered') || $single->status == 'ordered')
                                        <button type="button" class="btn btn-warning ms-auto" onclick="notifyVendor()" data-bs-toggle="modal">
                                            <i data-feather="bell"></i>
                                            @lang('translate.notify')
                                        </button>
                                        @if (auth('vendor')->check())
                                            <div class="mt-1">
                                                <form class="d-inline" action="{{ route('updateOrderStatus', ['status' => 'accepted', 'id' => $single->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">
                                                        <i data-feather="check"></i>
                                                        @lang('translate.accept')
                                                    </button>
                                                </form>
                                                <form class="d-inline" action="{{ route('updateOrderStatus', ['status' => 'canceled', 'id' => $single->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <i data-feather="x-octagon"></i>
                                                        @lang('translate.cancel')
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.partials.paginate')
    </div>
</div>
