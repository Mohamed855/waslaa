{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(request()->routeIs('categories.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.avatar')</th>
                        <th>@lang('translate.name')</th>
                        @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                            <th>@lang('translate.active')</th>
                        @endif
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(request()->routeIs('categories.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @include('dashboard.partials.image-modal', ['id' => $single->id, 'name' => $single->$nameOnLang, 'image' => asset($single->avatar ? 'storage/images/categories/'. $single->avatar : 'storage/images/global/logo-dark.jpg')])
                            </td>
                            <td>{{ $single->$nameOnLang }}</td>
                            @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                                <td>
                                    <form class="p-0 m-0" action="{{ route('toggleActive', ['table' => 'category', 'id' => $single->id]) }}" method="post">
                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                            @endif
                            <td style="min-width: 320px">
                                @if (auth('admin')->check() && request()->routeIs('categories.index'))
                                    <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeCategoryBtn" data-bs-toggle="modal" data-bs-target="#EditCategory{{ $single->id }}" data-="{{ $single }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.edit')
                                    </button>
                                    @include('dashboard.categories.partials.edit')
                                    @if(auth('admin')->user()->is_primary)
                                        @include('dashboard.partials.delete-modal', ['resource' => 'category', 'resources' => 'categories'])
                                    @endif
                                @elseif (auth('vendor')->check() || request()->routeIs('vendorCategories'))
                                    @include('dashboard.categories.partials.vendor-remove-category')
                                @endif
                            </td>
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
        $('.typeCategoryBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let category = JSON.parse($(this).attr('data-'));
            $('#enName').val(category.name_en);
            $('#arName').val(category.name_ar);
            let url = '{{ asset('') }}' + 'categories/' + id
            $('#updateCategoryForm' + id).attr('action', url);
        });
    });
</script>
