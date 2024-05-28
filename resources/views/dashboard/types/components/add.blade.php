<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddType" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.add')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="typesStore" class="form form-vertical" action="{{ route('types.store') }} " method="POST">
                                @csrf
                                <input type="hidden" name="vendor_id" value="{{ $vendorId }}"/>
                                <div class="row">
                                    {{-- add en name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_en">@lang('translate.enName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name_en" placeholder="@lang('translate.enName')"/>
                                        </div>
                                    </div>
                                    {{-- add ar name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_ar">@lang('translate.arName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name_ar" placeholder="@lang('translate.arName')"/>
                                        </div>
                                    </div>
                                    {{-- add en abbrev --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="abbrev_en">@lang('translate.enAbbrev') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="zap"></i></span>
                                            <input type="text" class="form-control" name="abbrev_en" maxlength="3" placeholder="@lang('translate.enAbbrev')"/>
                                        </div>
                                    </div>
                                    {{-- add ar abbrev --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="abbrev_ar">@lang('translate.arAbbrev') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="zap"></i></span>
                                            <input type="text" class="form-control" name="abbrev_ar" maxlength="3" placeholder="@lang('translate.arAbbrev')"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success me-1">@lang('translate.create')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
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
