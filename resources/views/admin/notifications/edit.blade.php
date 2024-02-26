@extends('layouts.dashboard')
@section('title',  __('translate.edit') . ' ' . __('translate.notification') . ' [ ' . ucfirst($selected->$nameOnLang) . ' ]' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('notifications.update', $selected->id) }}"
                              class="form form-vertical" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row mb-2">
                                {{-- add en name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="name_en">@lang('translate.enName')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" class="form-control" name="name_en" value="{{ $selected->name_en }}"
                                               placeholder="@lang('translate.enName')"/>
                                    </div>
                                </div>

                                {{-- add ar name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="name_ar">@lang('translate.arName')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" class="form-control" name="name_ar" value="{{ $selected->name_ar }}"
                                               placeholder="@lang('translate.arName')"/>
                                    </div>
                                </div>

                                {{-- add en body --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="body_en">@lang('translate.enBody')</label>
                                    <div class="input-group input-group-merge">
                                        <textarea class="form-control" name="body_en" placeholder="@lang('translate.enBody')">{{ $selected->body_en }}</textarea>
                                    </div>
                                </div>

                                {{-- add ar body --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="body_ar">@lang('translate.arBody')</label>
                                    <div class="input-group input-group-merge">
                                        <textarea class="form-control" name="body_ar" placeholder="@lang('translate.arBody')">{{ $selected->body_ar }}</textarea>
                                    </div>
                                </div>

                                {{-- image --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="image">@lang('translate.image')</label>
                                    <div class="input-group input-group-merge">
                                        <input type="file" class="form-control" name="image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-1 d-flex">
                                    <button type="submit" class="btn btn-primary w-100"
                                            style="min-width: 180px">@lang('translate.save')</button>
                                </div>
                            </div>
                        </form>


                        @if($selected->image != null)
                            <form class="col-12 col-md-1 mt-1" action="{{-- route('', $selected->id) --}}"
                                  method="POST">
                                @csrf
                                <button class="btn btn-danger w-100" style="min-width: 180px" data-bs-toggle="modal">
                                    <i data-feather="x"></i>
                                    @lang('translate.removeImage')
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
