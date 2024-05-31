<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        @if (auth('admin')->check() && ! request()->routeIs('vendorInvoices'))
                            <th>@lang('translate.vendor')</th>
                        @endif
                        <th>@lang('translate.start')</th>
                        @if (request()->routeIs('vendorInvoices') || (isset($status) && $status !== 'opened'))
                            <th>@lang('translate.end')</th>
                        @endif
                        <th>@lang('translate.orders')</th>
                        @if (request()->routeIs('vendorInvoices'))
                            <th>@lang('translate.status')</th>
                        @endif
                        <th>@lang('translate.total')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (auth('admin')->check() && ! request()->routeIs('vendorInvoices'))
                                <td><a href="{{ route('showVendor', $single->vendor->username) }}">{{ $single->vendor?->name }}</a></td>
                            @endif
                            <td>{{ $single->start ? date_format($single->start, 'd-m-Y') : '' }}</td>
                            @if (request()->routeIs('vendorInvoices') || (isset($status) && $status !== 'opened'))
                            <td>{{ $single->end ? date_format($single->end, 'd-m-Y') : '-' }}</td>
                            @endif
                            <td>{{ $single->orders ? count($single->orders) : 0 }}</td>
                            @if (request()->routeIs('vendorInvoices'))
                                <td>{{ __('translate.' . $single->status) }}</td>
                            @endif
                            <td>{{ $single->total_price }} @lang('translate.pound')</td>
                            <td style="min-width: {{ (auth('admin')->check() && $single->status !== 'collected') ? '400px' : '320px' }}">
                                <a href="{{ route('invoices.show', $single->id) }}">
                                    <button class="btn btn-warning ms-auto">
                                        <i data-feather="eye"></i>
                                        @lang('translate.show')
                                    </button>
                                </a>
                                @if (auth('admin')->check() && $single->status !== 'collected')
                                    @if ($single->status == 'opened')
                                        <form class="d-inline" action="{{ route('updateInvoiceStatus', ['status' => 'closed', 'id' => $single->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info">
                                                <i data-feather="minus-square"></i>
                                                @lang('translate.close')
                                            </button>
                                        </form>
                                    @endif
                                    @if (auth('admin')->user()->is_primary)
                                        <form class="d-inline" action="{{ route('updateInvoiceStatus', ['status' => 'collected', 'id' => $single->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">
                                                <i data-feather="check-square"></i>
                                                @lang('translate.collect')
                                            </button>
                                        </form>
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
