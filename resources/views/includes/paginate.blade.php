@if(count($data) > 10)
    <div class="d-flex justify-content-center py-1">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item {{ $data->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <span class="page-link">{{ $data->currentPage() }} - {{ $data->lastPage() }}</span>
                </li>
                <li class="page-item {{ $data->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif
