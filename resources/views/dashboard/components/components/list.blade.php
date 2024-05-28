{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.name')</th>
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
                            <td>{{ $single->$nameOnLang }}</td>
                            @if (auth('vendor')->check())
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
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeComponentBtn" data-bs-toggle="modal" data-bs-target="#EditComponent{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @if (auth('admin')->check() || auth('vendor')->check())
                                    @include('dashboard.partials.delete-modal', ['resource' => 'component', 'resources' => 'components'])
                                @endif
                            </td>
                            @include('dashboard.components.components.edit')
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
