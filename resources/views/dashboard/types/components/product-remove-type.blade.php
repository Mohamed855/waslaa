<button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#removeModal' . $single->id }}">
    <i data-feather="trash-2"></i>
    @lang('translate.remove')
</button>
<div class="modal fade" id="{{ 'removeModal' . $single->id }}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLabel">@lang('translate.remove') @lang('translate.type')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmRemove')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route('removeProductType', ['id' => $single->id, 'productId' => $productId]) }}" method="POST">
                    @csrf @method('Delete')
                    <button type="submit" class="btn btn-danger">
                        @lang('translate.remove')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
