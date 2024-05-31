<div class="modal fade modal-secondary text-start" id="EditNotification{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.edit')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="updateNotificationForm{{ $single->id }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="row">
                                    {{-- edit en name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_en">@lang('translate.enName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="enName" class="form-control" value="{{ $single->name_en }}" name="name_en" placeholder="@lang('translate.enName')"/>
                                        </div>
                                    </div>
                                    {{-- edit ar name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_ar">@lang('translate.arName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="arName" class="form-control" value="{{ $single->name_ar }}" name="name_ar" placeholder="@lang('translate.arName')"/>
                                        </div>
                                    </div>
                                    {{-- edit en body --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="body_en">@lang('translate.enBody') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea class="form-control" id="enBody" name="body_en" placeholder="@lang('translate.enBody')">{{ $single->body_en }}</textarea>
                                        </div>
                                    </div>
                                    {{-- edit ar body --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="body_ar">@lang('translate.arBody') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea class="form-control" id="arBody" name="body_ar" placeholder="@lang('translate.arBody')">{{ $single->body_ar }}</textarea>
                                        </div>
                                    </div>
                                    {{-- edit image --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="image">@lang('translate.image')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" id="image" class="form-control" name="image" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">@lang('translate.save')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
                                    </div>
                                </div>
                            </form>
                            @if ($single->image != null)
                                <div class="col-12">
                                    <form class="col-1 mt-1" action="{{ route('removeImage', ['id' => $single->id, 'table' => 'notification']) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" style="min-width: 145px" data-bs-toggle="modal">
                                            <i data-feather="x"></i>
                                            @lang('translate.removeImage')
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
