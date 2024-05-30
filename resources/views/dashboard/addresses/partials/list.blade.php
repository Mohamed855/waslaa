{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(request()->routeIs('vendorAddresses') && auth('admin')->check() && auth('admin')->user()->is_primary)
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.type')</th>
                        <th>@lang('translate.city')</th>
                        <th>@lang('translate.address')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(request()->routeIs('vendorAddresses') && auth('admin')->check() && auth('admin')->user()->is_primary)
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->main ? __('translate.main') : '-' }}</td>
                            <td>{{ $single->city?->$nameOnLang }}</td>
                            <td style="min-width: 320px">{{ $single->address }}</td>
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

