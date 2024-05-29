<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddCity" tabindex="-1" aria-labelledby="myModalLabel1660"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.add')</h5>
                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <form id="citiesStore" class="form form-vertical" action="{{ route('cities.store') }} "
                                method="POST">
                                @csrf
                                <div class="row">
                                    {{-- add en name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_en">@lang('translate.enName') <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name_en"
                                                placeholder="@lang('translate.enName')" />
                                        </div>
                                    </div>
                                    {{-- add ar name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_ar">@lang('translate.arName') <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name_ar"
                                                placeholder="@lang('translate.arName')" />
                                        </div>
                                    </div>
                                    {{-- add country --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="country">@lang('translate.country') <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='map'></i></span>
                                            <select id="addSelectedCountry" class="form-control" name="country_id">
                                                <option selected disabled>@lang('translate.select')</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->$nameOnLang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        VirtualSelect.init({
                                            ele: '#addSelectedCountry',
                                            search: true
                                        });
                                    </script>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success me-1">@lang('translate.create')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">@lang('translate.cancel')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- form --}}
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
