<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="UpdateOffer{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.' . ( $single->offer ? 'update' : 'add')) @lang('translate.offer')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="updateOfferForm{{ $single->id }}" class="form form-vertical" method="POST">
                                @csrf
                                <input id="updateType{{ $single->id }}" type="hidden" name="offer_type" value=""/>
                                <div class="row">
                                    {{-- update type --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="offer_type">@lang('translate.type') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='type'></i></span>
                                            <select id="updateSelectedType{{ $single->id }}" class="form-control updateSelectedType">
                                                <option selected disabled>@lang('translate.select')</option>
                                                <option value="discount" {{ $single->offer_type == 'discount' ? 'selected' : '' }}>@lang('translate.discount')</option>
                                                <option value="percentage" {{ $single->offer_type == 'percentage' ? 'selected' : '' }}>@lang('translate.percentage')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        VirtualSelect.init({
                                            ele: '.updateSelectedType'
                                        });
                                    </script>
                                    {{-- update value --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="offer_value">@lang('translate.value') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='phone'></i></span>
                                            <input id="updateOfferValue" type="number" class="form-control" name="offer_value" min="0" max="100" onkeypress="return isNumberKey(event)" placeholder="@lang('translate.value')"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-{{ $single->offer ? 'primary' : 'success' }} me-1">@lang('translate.save')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
                                    </div>
                                </div>
                            </form>
                            @if ($single->offer)
                                <div class="col-12">
                                    <form id="removeOfferForm{{ $single->id }}" class="col-1 mt-1" method="POST">
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
