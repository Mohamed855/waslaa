@extends('layouts.dashboard')
@section('title', __('translate.products'))
@section('content')
    <section>
        <div class="row d-flex">
            <div class="col-xl-12 mb-2">
                <a href="{{ route('products.create') }}">
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
                            <th>@lang('translate.offer')</th>
                            <th>@lang('translate.rate')</th>
                            <th>@lang('translate.category')</th>
                            <th>@lang('translate.subcategory')</th>
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
                                        <img alt="" src="{{ asset($single->avatar ? 'storage/images/products/' . $single->avatar : 'storage/images/global/default.jpg') }}"/>
                                    </a>
                                </td>
                                <td> {{ $single->$nameOnLang }} </td>
                                <td> {{ $single->offer . '|' . $single->offer_type . '|' . $single->offer_value }} </td>
                                <td><i data-feather="star" style="color: #E5B80B"></i> {{ $single->rate }}</td>
                                <td> {{ $single->subcategory?->category?->$nameOnLang }} </td>
                                <td> {{ $single->subcategory?->$nameOnLang }} </td>
                                <td>
                                    <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'product', 'id' => $single->id]) }}" method="post">
                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                                <td style="min-width: 320px">
                                    @if(!$single->is_primary)
                                        <a href="{{ route('products.edit', $single->id) }}">
                                            <button class="btn btn-primary ms-auto">
                                                <i data-feather="edit"></i>
                                                @lang('translate.edit')
                                            </button>
                                        </a>
                                        @include('dashboard.partials.delete-modal', ['resource' => 'product', 'resources' => 'products'])
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
