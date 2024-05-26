@extends('layouts.dashboard')
@section('title', __('translate.invoices') . ' [ ' . __('translate.opened') . ' ]')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table text-center table-bopened" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('translate.vendor')</th>
                            <th>@lang('translate.start')</th>
                            <th>@lang('translate.orders')</th>
                            <th>@lang('translate.total')</th>
                            <th>@lang('translate.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $single)
                            <tr>
                                <td>{{ $single->vendor->name }}</td>
                                <td>{{ date_format($single->start, 'd-m-Y') }}</td>
                                <td>{{ count($single->orders) }}</td>
                                <td>{{ $single->total_price }} @lang('translate.pound')</td>
                                <td style="min-width: 320px">
                                    <a href="{{ route('invoices.show', $single->id) }}">
                                        <button class="btn btn-info ms-auto">
                                            <i data-feather="eye"></i>
                                            @lang('translate.show')
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include('dashboard.partials.paginate')
            </div>
        </div>
    </section>
@endsection
