<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('translate.id')</th>
                    <th>@lang('translate.avatar')</th>
                    <th>@lang('translate.name')</th>
                    @if (auth('vendor')->check())
                        <th>@lang('translate.offer')</th>
                        <th>@lang('translate.prices')</th>
                    @endif
                    <th>@lang('translate.rate')</th>
                    <th>@lang('translate.category')</th>
                    <th>@lang('translate.subcategory')</th>
                    <th>@lang('translate.active')</th>
                    <th>@lang('translate.actions')</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- avatar --}}
                            <td>
                                <a class="avatar avatar-xl">
                                    <img alt="" src="{{ asset($single->avatar ? 'storage/images/products/' . $single->avatar : 'storage/images/global/default.jpg') }}"/>
                                </a>
                            </td>
                            <td> {{ $single->$nameOnLang }} </td>
                            @if (auth('vendor')->check())
                                <td style="min-width: 180px">
                                    @if ($single->offer)
                                        <button data-id="{{ $single->id }}" class="btn btn-link updateOffer ms-auto" data-bs-toggle="modal" data-bs-target="#UpdateOffer{{ $single->id }}" data-="{{ $single }}">
                                            <i data-feather="edit"></i>
                                            @lang('translate.update')
                                        </button>
                                        @include('dashboard.products.components.update-offer')
                                    @else
                                        <button data-id="{{ $single->id }}" class="btn btn-link text-success addOffer ms-auto" data-bs-toggle="modal" data-bs-target="#AddOffer{{ $single->id }}" data-="{{ $single }}">
                                            <i data-feather="plus-circle"></i>
                                            @lang('translate.add')
                                        </button>
                                        @include('dashboard.products.components.add-offer')
                                    @endif
                                </td>
                                <td style="min-width: 180px">
                                    <button class="btn btn-link ms-auto" data-bs-toggle="modal" data-bs-target="#UpdatePrices{{  $single->id }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.update')
                                    </button>
                                    @include('dashboard.products.components.update-prices')
                                </td>
                            @endif
                            <td><i data-feather="star" style="color: #E5B80B"></i> {{ $single->rate }}</td>
                            <td> {{ $single->subcategory?->category?->$nameOnLang }} </td>
                            <td> {{ $single->subcategory?->$nameOnLang }} </td>
                            <td>
                                <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'product', 'id' => $single->id]) }}" method="post">
                                    @csrf
                                    <label class="switch">
                                        <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                {{ $single->active ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                            <td style="min-width: 320px">
                                @if (auth('vendor')->check())
                                    <a href="{{ route('products.edit', $single->id) }}">
                                        <button class="btn btn-primary ms-auto">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </button>
                                    </a>
                                @endif
                                @include('dashboard.partials.delete-modal', ['resource' => 'product', 'resources' => 'products'])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.partials.paginate')
    </div>
</div>
@if (auth('vendor')->check())
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.addOffer').on('click', function () {
                let id = $(this).attr('data-id');
                let product = JSON.parse($(this).attr('data-'));
                let type = $('#addType' + product.id);
                type.val(product.offer_type);
                $('#addSelectedType' + product.id).on('change', function () {
                    let selectedType = $(this).val();
                    type.val(selectedType);
                });
                $('#addOfferValue').val(product.offer_value);
                let url = '{{ asset('') }}' + 'product/' + id + '/create-offer'
                $('#addOfferForm' + id).attr('action', url);
            });
            $('.updateOffer').on('click', function () {
                let id = $(this).attr('data-id');
                let product = JSON.parse($(this).attr('data-'));
                let type = $('#editType' + product.id);
                type.val(product.offer_type);
                $('#editSelectedType' + product.id).on('change', function () {
                    let selectedType = $(this).val();
                    type.val(selectedType);
                });
                $('#editOfferValue').val(product.offer_value);
                let updateUrl = '{{ asset('') }}' + 'product/' + id + '/update-offer'
                let removeUrl = '{{ asset('') }}' + 'product/' + id + '/remove-offer'
                $('#updateOfferForm' + id).attr('action', updateUrl);
                $('#removeOfferForm' + id).attr('action', removeUrl);
            });
        });
    </script>
@endif
