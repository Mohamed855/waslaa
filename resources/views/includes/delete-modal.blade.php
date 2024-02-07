<button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#deleteModal' . $single->id }}">
    <i data-feather="trash-2"></i>
    @lang('translate.delete')
</button>
<div class="modal fade" id="{{ 'deleteModal' . $single->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">@lang('translate.delete') @lang('translate.' . $resource)</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmDelete')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form class="d-inline" action="{{ route($resources . '.destroy', $single->id) }}" method="POST">
                    @csrf @method('Delete')
                    <button type="submit" class="btn btn-danger">
                        @lang('translate.delete')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
