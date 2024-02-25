@extends('layouts.dashboard')
@section('title', __('translate.users'))
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table text-center table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('translate.avatar')</th>
                            <th>@lang('translate.name')</th>
                            <th>@lang('translate.username')</th>
                            <th>@lang('translate.phone')</th>
                            <th>@lang('translate.secPhone')</th>
                            <th>@lang('translate.gender')</th>
                            <th>@lang('translate.city')</th>
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
                                             src="{{ asset($single->avatar ? 'storage/images/users/' . $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->name }} </td>
                                <td> {{ $single->username }} </td>
                                <td> {{ $single->phone }} </td>
                                <td> {{ $single->sec_phone ?? '-' }} </td>
                                <td> @lang('translate.' . $single->gender) </td>

                                <td>
                                    {{ $single->_city->$nameOnLang }}
                                </td>

                                <td>
                                    <form class="p-0 m-0"
                                          action="{{ route('activation.toggle', ['table' => 'user', 'id' => $single->id]) }}"
                                          method="post">
                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                                <td style="min-width: 320px">
                                    <a href="{{ route('users.show', $single->id) }}">
                                        <button class="btn btn-info ms-auto">
                                            <i data-feather="eye"></i>
                                            @lang('translate.show')
                                        </button>
                                    </a>
                                    @if(auth('admin')->user()->is_primary)
                                        @include('includes.delete-modal', ['resource' => 'user', 'resources' => 'users'])
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
