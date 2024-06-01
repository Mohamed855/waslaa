<button type="button" class="btn btn-info ms-auto" data-bs-toggle="modal" data-bs-target="#closeModal-{{ $single->id }}">
    <i data-feather="minus-square"></i>
    @lang('translate.close')
</button>
<div class="modal fade" id="closeModal-{{ $single->id }}" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closeModalLabel">@lang('translate.close') @lang('translate.invoice')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmClose')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route('updateInvoiceStatus', ['status' => 'closed', 'id' => $single->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info">
                        @lang('translate.close')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
