{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(auth('admin')->user()->is_primary)
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.country')</th>
                        @if (auth('admin')->user()->is_primary)
                            <th>@lang('translate.active')</th>
                        @endif
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(auth('admin')->user()->is_primary)
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->$nameOnLang }}</td>
                            <td>{{ $single->country?->$nameOnLang ?? __('translate.notSelected') }}</td>
                            @if (auth('admin')->user()->is_primary)
                                <td>
                                    <form class="p-0 m-0" action="{{ route('toggleActive', ['table' => 'city', 'id' => $single->id]) }}" method="post">                                        @csrf
                                        <label class="switch">
                                            <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </form>
                                </td>
                            @endif
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeCityBtn" data-bs-toggle="modal" data-bs-target="#EditCity{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('dashboard.cities.partials.edit')
                                @if (auth('admin')->user()->is_primary)
                                    @include('dashboard.partials.delete-modal', ['resource' => 'city', 'resources' => 'cities'])
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
        $('.typeCityBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let city = JSON.parse($(this).attr('data-'));
            let countryId = $('#countryId' + city.id);
            countryId.val(city.country_id);
            $('#editSelectedCountry' + city.id).on('change', function () {
                let selectedCountryId = $(this).val();
                countryId.val(selectedCountryId);
            });
            $('#enName').val(city.name_en);
            $('#arName').val(city.name_ar);
            let url = '{{ asset('') }}' + 'cities/' + id
            $('#updateCityForm' + id).attr('action', url);
        });
    });
</script>
