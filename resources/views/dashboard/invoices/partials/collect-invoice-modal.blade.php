<button type="button" class="btn btn-dark ms-auto" data-bs-toggle="modal" data-bs-target="#collectModal-{{ $single->id }}">
    <i data-feather="check-square"></i>
    @lang('translate.collect')
</button>
<div class="modal fade" id="collectModal-{{ $single->id }}" tabindex="-1" role="dialog" aria-labelledby="collectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="collectModalLabel">@lang('translate.collect') @lang('translate.invoice')</h5>
                <button type="button" class="btn btn-flat-light collect" data-bs-dismiss="modal" aria-label="Collect">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmCollect')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route('updateInvoiceStatus', ['status' => 'collected', 'id' => $single->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark">
                        @lang('translate.collect')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
