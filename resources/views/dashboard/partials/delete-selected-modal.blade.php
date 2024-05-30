<button type="button" id="deleteSelected" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#deleteSelectedModal' }}" style="min-width: 90px"  disabled>
    <i data-feather="trash-2"></i>
    @lang('translate.deleteSelected')
</button>
<div class="modal fade" id="{{ 'deleteSelectedModal' }}" tabindex="-1" role="dialog" aria-labelledby="deleteSelectedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSelectedModalLabel">@lang('translate.deleteSelected')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body text-start">
                @lang('translate.confirmDeleteSelected')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                <form id="deleteForm" action="{{ route('deleteSelection') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="selected_ids" id="selectedIds">
                    <input type="hidden" name="table" value="{{ $resource }}">
                    <button type="submit" class="btn btn-danger">
                        @lang('translate.delete')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
