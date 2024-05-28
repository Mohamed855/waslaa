{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.type')</th>
                        <th>@lang('translate.city')</th>
                        <th>@lang('translate.address')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selected['addresses'] as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->main ? __('translate.main') : '-' }}</td>
                            <td>{{ $single->city?->$nameOnLang }}</td>
                            <td style="min-width: 320px">{{ $single->address }}</td>
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeAddressBtn" data-bs-toggle="modal" data-bs-target="#EditAddress{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('dashboard.partials.delete-modal', ['resource' => 'address', 'resources' => 'addresses'])
                            </td>
                            @include('dashboard.vendors.partials.addresses-components.edit')
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            <button class="btn btn-link ms-auto" data-bs-toggle="modal" data-bs-target="#AddAddress">
                                <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                @lang('translate.add') @lang('translate.address')
                            </button>
                            @include('dashboard.vendors.partials.addresses-components.add')
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.typeAddressBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let address = JSON.parse($(this).attr('data-'));
            let cityId = $('#cityId' + address.id);
            cityId.val(address.city_id);
            $('#editSelectedCity' + address.id).on('change', function () {
                let selectedCityId = $(this).val();
                cityId.val(selectedCityId);
            });
            $('#address').val(address.address);
            let url = '{{ asset('') }}' + 'addresses/' + id
            $('#updateAddressForm' + id).attr('action', url);
        });
    });
</script>

