<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="UpdatePrices{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.update') @lang('translate.prices')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="pricesStore{{ $single->id }}" class="form form-vertical" action="{{ route('updatePrices', $single->id) }} " method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($single->types as $type)
                                        <div class="row">
                                            <div class="col-4 p-1">{{ $type->$nameOnLang }}</div>
                                            <div class="col-8 p-1">
                                                <input type="number" class="form-control" name="price{{ $type->id }}" value="{{ $type->pivot?->price }}" onkeypress="return isNumberKey(event)" placeholder="@lang('translate.priceOf') {{ $type->$nameOnLang }}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">@lang('translate.save')</button>
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
