<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddOffer{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.add') @lang('translate.offer')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="addOfferForm{{ $single->id }}" class="form form-vertical" action="{{ route('createOffer', $single->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <input id="addType{{ $single->id }}" type="hidden" name="offer_type" value=""/>
                                <div class="row">
                                    {{-- add type --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="offer_type">@lang('translate.type') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='type'></i></span>
                                            <select id="addSelectedType{{ $single->id }}" class="form-control addSelectedType" name="offer_type">
                                                <option selected disabled>@lang('translate.select')</option>
                                                <option value="discount">@lang('translate.discount')</option>
                                                <option value="free">@lang('translate.percentage')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        VirtualSelect.init({
                                            ele: '.addSelectedType'
                                        });
                                    </script>
                                    {{-- add value --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="offer_value">@lang('translate.value') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='phone'></i></span>
                                            <input id="addOfferValue" type="number" class="form-control" name="offer_value" min="0" max="100" onkeypress="return isNumberKey(event)" placeholder="@lang('translate.value')"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success me-1">@lang('translate.save')</button>
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
