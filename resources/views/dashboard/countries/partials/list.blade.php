{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.name')</th>
                        @if (auth('admin')->user()->is_primary)
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
                            @if (auth('admin')->user()->is_primary)
                                <td>
                                    <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'country', 'id' => $single->id]) }}" method="post">
                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                            @endif
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeCountryBtn" data-bs-toggle="modal" data-bs-target="#EditCountry{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('dashboard.countries.partials.edit')
                                @if (auth('admin')->user()->is_primary)
                                    @include('dashboard.partials.delete-modal', ['resource' => 'country', 'resources' => 'countries'])
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
        $('.typeCountryBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let country = JSON.parse($(this).attr('data-'));
            $('#enName').val(country.name_en);
            $('#arName').val(country.name_ar);
            let url = '{{ asset('') }}' + 'countries/' + id
            $('#updateCountryForm' + id).attr('action', url);
        });
    });
</script>
