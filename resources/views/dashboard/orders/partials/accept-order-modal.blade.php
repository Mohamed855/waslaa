<button type="button" class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $selected->id }}">
    <i data-feather="check"></i>
    @lang('translate.accept')
</button>
<div class="modal fade" id="acceptModal-{{ $selected->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptModalLabel">@lang('translate.accept') @lang('translate.order')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmAccept')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route('updateOrderStatus', ['status' => 'accepted', 'id' => $selected->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        @lang('translate.accept')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
