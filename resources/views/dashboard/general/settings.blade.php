@extends('layouts.dashboard')
@section('title', __('translate.settings'))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('updateSettings') }}" class="form form-vertical"
                            enctype="multipart/form-data">
                            @csrf
                            @foreach ($settings as $setting)
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="{{ $setting->option }}">{{ $setting->option }}</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" id="text" class="form-control"
                                            value="{{ $setting->value }}" name="{{ $setting->option }}"
                                            placeholder="{{ $setting->option }}" />
                                    </div>
                                </div>
                            @endforeach
                            @if (count($settings) > 0)
                                <div class="row">
                                    <div class="col-12 col-md-1 d-flex">
                                        <button type="submit" class="btn btn-primary w-100"
                                            style="min-width: 180px">@lang('translate.save')</button>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12">
                                        @lang('translate.noSettings')
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
