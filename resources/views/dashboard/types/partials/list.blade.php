{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.abbrev')</th>
                        @if (request()->routeIs('productTypes'))
                            <th>@lang('translate.price')</th>
                        @endif
                        @if (request()->routeIs(['types.index', 'vendorTypes']))
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->$nameOnLang }}</td>
                            <td>{{ $single->$abbrevOnLang }}</td>
                            @if (request()->routeIs('productTypes'))
                                <td>{{ $single->pivot?->price }}</td>
                            @endif
                            @if (request()->routeIs(['types.index', 'vendorTypes']))
                                @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                    <td>
                                        <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'type', 'id' => $single->id]) }}" method="post">
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
                                @if (request()->routeIs(['types.index', 'vendorTypes']))
                                    <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typetypeComponentBtn" data-bs-toggle="modal" data-bs-target="#EditType{{ $single->id }}" data-="{{ $single }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.edit')
                                    </button>
                                    @include('dashboard.types.partials.edit')
                                    @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                        @include('dashboard.partials.delete-modal', ['resource' => 'type', 'resources' => 'types'])
                                    @endif
                                @elseif (request()->routeIs('productTypes'))
                                    @include('dashboard.types.partials.product-remove-type')
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
        $('.typetypeComponentBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let type = JSON.parse($(this).attr('data-'));
            $('#enName').val(type.name_en);
            $('#arName').val(type.name_ar);
            $('#enAbbrev').val(type.abbrev_en);
            $('#arAbbrev').val(type.abbrev_ar);
            let url = '{{ asset('') }}' + 'types/' + id
            $('#updateTypeForm' + id).attr('action', url);
        });
    });
</script>
