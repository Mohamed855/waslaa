@extends('layouts.dashboard')
@section('title', __('translate.vendors'))
@section('content')
    <section>
        <div class="row d-flex">
            <div class="col-xl-12 mb-2">
                <a href="{{ route('vendors.create') }}">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table text-center table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('translate.id')</th>
                            <th>@lang('translate.avatar')</th>
                            <th>@lang('translate.name')</th>
                            <th>@lang('translate.username')</th>
                            <th>@lang('translate.CRN')</th>
                            <th>@lang('translate.email')</th>
                            <th>@lang('translate.phone')</th>
                            <th>@lang('translate.city')</th>
                            <th>@lang('translate.followers')</th>
                            <th>@lang('translate.status')</th>
                            <th>@lang('translate.priority')</th>
                            <th>@lang('translate.rate')</th>
                            <th>@lang('translate.addedBy')</th>
                            <th>@lang('translate.active')</th>
                            <th>@lang('translate.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $single)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- avatar --}}
                                <td>
                                    <a class="avatar avatar-xl">
                                        <img alt=""
                                             src="{{ asset($single->avatar ? 'storage/images/vendors/' . $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->name }} </td>
                                <td> {{ $single->username }} </td>
                                <td> {{ $single->crn }} </td>
                                <td> {{ $single->email }} </td>
                                <td> {{ $single->phone }} </td>
                                <td> {{ $single->city->$nameOnLang }} </td>
                                <td> {{ count($single->favorites) }} </td>
                                <td> {{ $single->status }} </td>
                                <td>
                                    @if ($single->priority == 1)
                                        @lang('translate.high')
                                    @elseif ($single->priority == 2)
                                        @lang('translate.medium')
                                    @else
                                        @lang('translate.low')
                                    @endif
                                </td>
                                <td> {{ $single->rate }} </td>
                                <td> {{ ucfirst($single->admin->username) }} </td>
                                <td>
                                    <form class="p-0 m-0"
                                          action="{{ route('activation.toggle', ['table' => 'vendor', 'id' => $single->id]) }}"
                                          method="post">
                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                                <td style="min-width: 370px">
                                    @if (!$single->is_primary)
                                        <a href="{{ route('vendors.show', $single->id) }}">
                                            <button class="btn btn-info ms-auto">
                                                <i data-feather="eye"></i>
                                                @lang('translate.show')
                                            </button>
                                        </a>
                                        @include('dashboard.partials.delete-modal', ['resource' => 'vendor', 'resources' => 'vendors'])
                                    @else
                                        @lang('error.cannotEdit')
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
    </section>
@endsection
