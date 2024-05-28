<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="UpdateOffer{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.update') @lang('translate.offer')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="offerUpdate" class="form form-vertical" action="{{ route('updateOffer', $single->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- add name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="@lang('translate.name')"/>
                                        </div>
                                    </div>
                                    {{-- add image --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="image">@lang('translate.image') <span class="text-danger">*</span></label>
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
                            @if ($single->offer)
                                <div class="col-12">
                                    <form class="col-1 mt-1" action="{{ route('removeOffer', $single->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" style="min-width: 160px" data-bs-toggle="modal">
                                            <i data-feather="x"></i>
                                            @lang('translate.removeOffer')
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        {{-- form --}}
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
