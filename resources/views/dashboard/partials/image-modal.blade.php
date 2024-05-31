
<div class="avatar avatar-xl" data-bs-toggle="modal" data-bs-target="#imageModal{{ $single->id }}">
    <img alt="" src="{{ $image }}"/>
</div>
<div class="modal fade" id="imageModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">{{ $name }}</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ $image }}" alt="" id="modalImage" class="img-fluid rounded g-modal-image w-auto" style="max-height: 80vh">
            </div>
        </div>
    </div>
</div>
