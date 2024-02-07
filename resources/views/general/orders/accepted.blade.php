@extends('layouts.dashboard')
@section('title', __('translate.orders') . ' [ ' . __('translate.accepted') . ' ]')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table text-center table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('translate.user')</th>
                            <th>@lang('translate.vendor')</th>
                            <th>@lang('translate.address')</th>
                            <th>@lang('translate.phone')</th>
                            <th>@lang('translate.payMethod')</th>
                            <th>@lang('translate.deliveryMethod')</th>
                            <th>@lang('translate.total')</th>
                            <th>@lang('translate.orderedAt')</th>
                            <th>@lang('translate.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $single)
                            <tr>
                                <td>
                                    @php
                                        $user = \App\Models\User::query()->withTrashed()->find($single->user, ['name'])
                                    @endphp
                                    {{ $user['name'] }}
                                </td>
                                <td>{{ $single->vendor['name'] }}</td>
                                <td style="min-width: 320px">{{ $single->address }}</td>
                                <td>{{ $single->deliveryPhone }}</td>
                                <td>{{ __('translate.' . $single->payMethod) }}</td>
                                <td>{{ __('translate.' . $single->deliveryMethod) }}</td>
                                <td>{{ $single->totalCost }} @lang('translate.pound')</td>
                                <td>{{ date_format($single->created_at, 'd-m-Y h:i a') }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $single->id) }}">
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
                @include('includes.paginate')
            </div>
        </div>
    </section>
@endsection
