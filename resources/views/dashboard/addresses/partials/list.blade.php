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
                        @if (request()->routeIs('userAddresses'))
                            <th>@lang('translate.building')</th>
                            <th>@lang('translate.floor')</th>
                            <th>@lang('translate.flat')</th>
                            <th>@lang('translate.specialMark')</th>
                        @elseif (request()->routeIs('vendorAddresses'))
                            <th>@lang('translate.actions')</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->main ? __('translate.main') : '-' }}</td>
                            <td>{{ $single->city?->$nameOnLang }}</td>
                            <td style="min-width: 320px">{{ $single->address }}</td>
                            @if (request()->routeIs('userAddresses'))
                                <td>{{ $single->building }}</td>
                                <td>{{ $single->floor }}</td>
                                <td>{{ $single->flat }}</td>
                                <td>{{ $single->special_mark }}</td>
                            @elseif (request()->routeIs('vendorAddresses'))
                                <td style="min-width: 320px">
                                    <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeAddressBtn" data-bs-toggle="modal" data-bs-target="#EditAddress{{ $single->id }}" data-="{{ $single }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.edit')
                                    </button>
                                    @include('dashboard.addresses.partials.edit')
                                    @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                                        @include('dashboard.partials.delete-modal', ['resource' => 'address', 'resources' => 'addresses'])
                                    @endif
                                </td>
                            @endif
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

