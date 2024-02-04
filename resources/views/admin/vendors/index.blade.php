@extends('layouts.admin')
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
                            <th>@lang('translate.avatar')</th>
                            <th>@lang('translate.name')</th>
                            <th>@lang('translate.email')</th>
                            <th>@lang('translate.phone')</th>
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
                                {{-- avatar --}}
                                <td>
                                    <a class="avatar avatar-xl">
                                        <img alt=""
                                             src="{{ asset($single->avatar ? 'storage/images/vendors/' . $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->name }} </td>
                                <td> {{ $single->email }} </td>
                                <td> {{ $single->phone }} </td>
                                <td> {{ $single->status }} </td>
                                <td>
                                    @if($single->priority == 1)
                                        @lang('translate.high')
                                    @elseif($single->priority == 2)
                                        @lang('translate.medium')
                                    @else$single->priority == 1)
                                        @lang('translate.low')
                                    @endif
                                </td>
                                <td> {{ $single->rate }} </td>
                                @php
                                    $admin = \App\Models\Admin::query()->withTrashed()->find($single->added_by);
                                @endphp
                                <td> {{ ucfirst(explode(' ', $admin->name)[0]) }} </td>
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
                                <td style="min-width: 260px">
                                    @if(!$single->is_primary)
                                        <a href="{{ route('vendors.edit', $single->id) }}">
                                            <button class="btn btn-primary ms-auto">
                                                <i data-feather="edit"></i>
                                                @lang('translate.edit')
                                            </button>
                                        </a>
                                        @include('includes.delete-modal', ['resource' => 'vendor', 'resources' => 'vendors'])
                                    @else
                                        @lang('error.cannotEdit')
                                    @endif
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
