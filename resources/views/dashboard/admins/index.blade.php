@extends('layouts.dashboard')
@section('title', __('translate.admins'))
@section('content')
    <section>
        <div class="row d-flex">
            <div class="col-xl-12 mb-2">
                <a href="{{ route('admins.create') }}">
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
                            <th>@lang('translate.email')</th>
                            <th>@lang('translate.phone')</th>
                            @if (auth('admin')->user()->is_primary)
                                <th>@lang('translate.active')</th>
                                <th>@lang('translate.primary')</th>
                                <th>@lang('translate.actions')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $single)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- avatar --}}
                                <td>
                                    <a class="avatar avatar-xl">
                                        <img alt="" src="{{ asset($single->avatar ? 'storage/images/admins/' . $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->name }} </td>
                                <td> {{ $single->username }} </td>
                                <td> {{ $single->email }} </td>
                                <td> {{ $single->phone }} </td>
                                @if (auth('admin')->user()->is_primary)
                                    <td>
                                        <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'admin', 'id' => $single->id]) }}" method="post">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="p-0 m-0" action="{{ route('primary.toggle', $single->id) }}" method="post">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->is_primary ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td style="min-width: 320px">
                                        @if (! $single->is_primary)
                                            <a href="{{ route('admins.edit', $single->id) }}">
                                                <button class="btn btn-primary ms-auto">
                                                    <i data-feather="edit"></i>
                                                    @lang('translate.edit')
                                                </button>
                                            </a>
                                            @include('dashboard.partials.delete-modal', ['resource' => 'admin', 'resources' => 'admins'])
                                        @else
                                            @lang('error.cannotEdit')
                                        @endif
                                    </td>
                                @endif
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
