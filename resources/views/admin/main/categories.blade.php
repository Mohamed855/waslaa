@extends('layouts.admin')
@section('title', __('translate.categories'))
@php
    $nameOnLang = \App\Helpers\Helper::getColumnOnLang('name');
@endphp
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddAd">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade modal-secondary text-start" id="AddAd" tabindex="-1" aria-labelledby="myModalLabel1660"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1660">@lang('translate.add')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- form --}}

                            <section id="basic-vertical-layouts">
                                <div class="row">
                                    <div class="col-md-12 col-12">

                                        <form id="categoriesStore" class="form form-vertical" action="{{ route('categories.store') }} "
                                              method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                                {{-- add en name --}}
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="name_en">@lang('translate.enName')</label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               name="name_en" placeholder="@lang('translate.enName')" />
                                                    </div>
                                                </div>

                                                {{-- add ar name --}}
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="name_ar">@lang('translate.arName')</label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               name="name_ar" placeholder="@lang('translate.arName')" />
                                                    </div>
                                                </div>

                                                {{-- add avatar --}}
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                                        <input type="file" id="avatar"
                                                               class="form-control"
                                                               name="avatar" placeholder="@lang('translate.avatar')" />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                            class="btn btn-success me-1">@lang('translate.create')</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">@lang('translate.cancel')</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    {{-- form --}}
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- tabel --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table text-center table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>@lang('translate.avatar')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.active')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $single)
                        <tr>
                            <td>
                                <div class="avatar avatar-xl">
                                    <img alt="" src="{{ asset('storage/images/categories/' . $single->avatar) }}"/>
                                </div>
                            </td>

                            <td>{{ $single->$nameOnLang }}</td>

                            <td>
                                <form class="p-0 m-0"
                                      action="{{ route('activation.toggle', ['table' => 'category', 'id' => $single->id]) }}"
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
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeBtn"
                                        data-bs-toggle="modal" data-bs-target="#EditAd" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('includes.delete-modal', ['resource' => 'category', 'resources' => 'categories'])
                            </td>

                            <div class="modal fade modal-secondary text-start" id="EditAd" tabindex="-1"
                                 aria-labelledby="myModalLabel1660" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel1660">@lang('translate.edit')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <section id="basic-vertical-layouts">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">

                                                        <form id="updateForm" class="form form-vertical"
                                                              method="POST" enctype="multipart/form-data">
                                                            @csrf @method('PUT')
                                                            <div class="row">

                                                                {{-- edit en name --}}
                                                                <div class="col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="name_en">@lang('translate.enName')</label>
                                                                        <input type="text" id="name_en"
                                                                               class="form-control" value="{{ $single->name_en }}"
                                                                               name="name_en" placeholder="@lang('translate.enName')" />
                                                                    </div>
                                                                </div>

                                                                {{-- edit ar name --}}
                                                                <div class="col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="name_ar">@lang('translate.arName')</label>
                                                                        <input type="text" id="name_ar"
                                                                               class="form-control" value="{{ $single->name_ar }}"
                                                                               name="name_ar" placeholder="@lang('translate.arName')" />
                                                                    </div>
                                                                </div>

                                                                {{-- edit avatar --}}
                                                                <div class="col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                                                        <input type="file" id="avatar"
                                                                               class="form-control"
                                                                               name="avatar" placeholder="@lang('translate.avatar')" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <button type="submit"
                                                                            class="btn btn-primary me-1">@lang('translate.save')</button>
                                                                    <button type="button" class="btn btn-outline-secondary"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">@lang('translate.cancel')</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('includes.paginate')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.typeBtn').on('click', function() {
                let id = $(this).attr('data-id');
                let category = JSON.parse($(this).attr('data-'));

                $('#name_en').val(category.name_en);
                $('#name_ar').val(category.name_ar);
                url = '{{ asset('') }}' + 'admin/categories/'+ id
                $('#updateForm').attr('action', url);
            });
        });
    </script>
@endsection

