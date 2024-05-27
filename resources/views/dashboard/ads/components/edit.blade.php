<div class="modal fade modal-secondary text-start" id="EditAd{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="updateForm{{ $single->id }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="row">
                                    {{-- edit name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="name" class="form-control" value="{{ $single->name }}" name="name" placeholder="@lang('translate.name')"/>
                                        </div>
                                    </div>
                                    {{-- edit image --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="image">@lang('translate.image')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">@lang('translate.save')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
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
