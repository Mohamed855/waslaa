@extends('layouts.dashboard')
@section('title', __('translate.notifications'))
@section('content')
    <section>
        <div class="row d-flex">
            <div class="col-xl-12 mb-2">
                <a href="{{ route('notifications.create') }}">
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
                            <th>@lang('translate.image')</th>
                            <th>@lang('translate.name')</th>
                            <th>@lang('translate.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $single)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- image --}}
                                <td>
                                    <a class="avatar avatar-xl">
                                        <img alt="" src="{{ asset($single->image ? 'storage/images/notifications/' . $single->image : 'storage/images/global/logo-dark.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->$nameOnLang }} </td>
                                <td style="min-width: 320px">
                                    <a href="{{ route('notifications.edit', $single->id) }}">
                                        <button class="btn btn-primary ms-auto">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </button>
                                    </a>
                                    @if ((auth('admin')->check() && auth('admin')->user()->is_primary) || auth('vendor')->check())
                                        @include('dashboard.partials.delete-modal', ['resource' => 'notification', 'resources' => 'notifications'])
                                    @endif
                                    <button type="button" class="btn btn-warning ms-auto" onclick="notifyUser()" data-bs-toggle="modal">
                                        <i data-feather="bell"></i>
                                        @lang('translate.notify')
                                    </button>
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
