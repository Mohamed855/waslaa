{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.avatar')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.category')</th>
                        @if (auth('vendor')->check())
                            <th>@lang('translate.active')</th>
                        @endif
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="avatar avatar-xl">
                                    <img alt="" src="{{ asset('storage/images/subcategories/' . $single->avatar) }}"/>
                                </div>
                            </td>
                            <td>{{ $single->$nameOnLang }}</td>
                            <td>{{ $single->category?->$nameOnLang ?? __('translate.notSelected') }}</td>
                            @if (auth('vendor')->check())
                                <td>
                                    <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'subcategory', 'id' => $single->id]) }}" method="post">                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                            @endif
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeSubcategoryBtn" data-bs-toggle="modal" data-bs-target="#EditSubcategory{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @if (auth('vendor')->check())
                                    @include('dashboard.partials.delete-modal', ['resource' => 'subcategory', 'resources' => 'subcategories'])
                                @endif
                            </td>
                            @include('dashboard.subcategories.components.edit')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('dashboard.partials.paginate')
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.typeSubcategoryBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let subcategory = JSON.parse($(this).attr('data-'));
            let categoryId = $('#categoryId' + subcategory.id);
            categoryId.val(subcategory.category_id);
            $('#editSelectedCategory' + subcategory.id).on('change', function () {
                let selectedCategoryId = $(this).val();
                categoryId.val(selectedCategoryId);
            });
            $('#enName').val(subcategory.name_en);
            $('#arName').val(subcategory.name_ar);
            let url = '{{ asset('') }}' + 'subcategories/' + id
            $('#updateSubcategoryForm' + id).attr('action', url);
        });
    });
</script>
