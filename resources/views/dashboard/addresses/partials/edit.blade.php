<div class="modal fade modal-secondary text-start" id="EditAddress{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.edit')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="updateAddressForm{{ $single->id }}" class="form form-vertical" method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="type" value="vendor">
                                <input type="hidden" name="user_id" value="{{ $selectedVendorId }}">
                                <input id="cityId{{ $single->id }}" type="hidden" name="city_id" value=""/>
                                <div class="row">
                                    {{-- edit city --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="city">@lang('translate.city') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-map-pin">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                            </span>
                                            <select id="editSelectedCity{{ $single->id }}" class="form-control editSelectedCity">
                                                <option selected disabled>@lang('translate.select')</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $single->city_id == $city->id ? 'selected' : '' }}>{{ $city->$nameOnLang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        VirtualSelect.init({
                                            ele: '.editSelectedCity',
                                            search: true
                                        });
                                    </script>
                                    {{-- edit address --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="address">@lang('translate.address') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="address" class="form-control" value="{{ $single->address }}" name="address" placeholder="@lang('translate.address')"/>
                                        </div>
                                    </div>
                                    {{-- edit main --}}
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="cursor-pointer" name="main" value="1" {{ $single->main ? 'checked' : '' }} />
                                        <label class="form-label fs-5" for="main">@lang('translate.main')</label>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">@lang('translate.save')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
