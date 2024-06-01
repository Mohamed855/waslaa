<button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#cancelModal">
    <i data-feather="x-octagon"></i>
    @lang('translate.cancel')
</button>
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">@lang('translate.cancel') @lang('translate.order')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmCancel')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route('updateOrderStatus', ['status' => 'canceled', 'id' => $selected->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        @lang('translate.cancelOrder')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
