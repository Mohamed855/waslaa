{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(request()->routeIs('components.index') || (request()->routeIs('vendorComponents') && auth('admin')->user()->is_primary))
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.name')</th>
                        @if (request()->routeIs(['components.index', 'vendorComponents']))
                            @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                <th>@lang('translate.active')</th>
                            @endif
                        @endif
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(request()->routeIs('components.index') || (request()->routeIs('vendorComponents') && auth('admin')->user()->is_primary))
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->$nameOnLang }}</td>
                            @if (request()->routeIs(['components.index', 'vendorComponents']))
                                @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                    <td>
                                        <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'component', 'id' => $single->id]) }}" method="post">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>
                                @endif
                            @endif
                            <td style="min-width: 320px">
                                @if (request()->routeIs(['components.index', 'vendorComponents']))
                                    <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeComponentBtn" data-bs-toggle="modal" data-bs-target="#EditComponent{{ $single->id }}" data-="{{ $single }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.edit')
                                    </button>
                                    @include('dashboard.components.partials.edit')
                                    @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                        @include('dashboard.partials.delete-modal', ['resource' => 'component', 'resources' => 'components'])
                                    @endif
                                @elseif (request()->routeIs('productComponents'))
                                    @include('dashboard.components.partials.product-remove-component')
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
        $('.typeComponentBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let component = JSON.parse($(this).attr('data-'));
            $('#enName').val(component.name_en);
            $('#arName').val(component.name_ar);
            let url = '{{ asset('') }}' + 'components/' + id
            $('#updateComponentForm' + id).attr('action', url);
        });
    });
</script>
