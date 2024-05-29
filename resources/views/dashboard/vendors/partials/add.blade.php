<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('vendors.store') }}" class="form form-vertical" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2">
                <input type="hidden" name="added_by" value="{{ auth('admin')->id() }}">
                {{-- name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="type"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="@lang('translate.name')"/>
                    </div>
                </div>
                {{-- crn --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="crn">@lang('translate.crn') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="hash"></i></span>
                        <input type="text" class="form-control" name="crn" placeholder="@lang('translate.crn')"/>
                    </div>
                </div>
                {{-- owner name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="owner_name">@lang('translate.ownerName') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="feather"></i></span>
                        <input type="text" class="form-control" name="owner_name" placeholder="@lang('translate.ownerName')"/>
                    </div>
                </div>
                {{-- phone --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='phone'></i></span>
                        <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" placeholder="01×××××××××"/>
                    </div>
                </div>
                {{-- email --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='at-sign'></i></span>
                        <input type="email" class="form-control" name="email" placeholder="email@example.com"/>
                    </div>
                </div>
                {{-- password --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="password">@lang('translate.password') <span class="text-danger">*</span></label>
                    <div class="position-relative">
                        <input type="password" id="password" class="form-control" name="password" placeholder="@lang('translate.password')"/>
                        <button class="btn btn-link position-absolute text-muted password-addon top-0 end-0" type="button" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" data-feather="eye"></i>
                        </button>
                    </div>
                </div>
                {{-- select city --}}
                <div class="col-md-6 col-sm-12 mb-1">
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
                        <select id="addSelectedCity" class="form-control" name="city_id">
                            <option selected disabled>@lang('translate.select')</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->$nameOnLang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script type="text/javascript">
                    VirtualSelect.init({
                        ele: '#addSelectedCity',
                        search: true
                    });
                </script>
                {{-- delivery time --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="delivery_time">@lang('translate.deliveryTime') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='clock'></i></span>
                        <input type="text" class="form-control" name="delivery_time" placeholder="@lang('translate.deliveryTime')"/>
                    </div>
                </div>
                {{-- delivery cost --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="delivery_cost">@lang('translate.deliveryCost') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                        <input type="text" class="form-control" name="delivery_cost" placeholder="@lang('translate.deliveryCost')"/>
                    </div>
                </div>
                {{-- avatar --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="avatar">@lang('translate.avatar') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="file" class="form-control" name="avatar"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2 d-flex">
                    <button type="submit" class="btn btn-success w-100"
                            style="min-width: 120px">@lang('translate.create')</button>
                </div>
            </div>
        </form>
    </div>
</div>
