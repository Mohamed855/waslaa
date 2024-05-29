<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('vendors.update', $selected->id) }}" class="form form-vertical" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row mb-2">
                {{-- name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="type"></i></span>
                        <input type="text" id="text" class="form-control" value="{{ $selected['name'] }}" name="name" placeholder="@lang('translate.name')"/>
                    </div>
                </div>
                {{-- crn --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="crn">@lang('translate.crn') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="hash"></i></span>
                        <input type="text" id="text" class="form-control" value="{{ $selected['crn'] }}" name="crn" placeholder="@lang('translate.crn')"/>
                    </div>
                </div>
                {{-- owner name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="owner_name">@lang('translate.ownerName') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="feather"></i></span>
                        <input type="text" class="form-control" value="{{ $selected['owner_name'] }}" name="owner_name" placeholder="@lang('translate.ownerName')"/>
                    </div>
                </div>
                {{-- username --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="username">@lang('translate.username') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="type"></i></span>
                        <input type="text" id="text" class="form-control" value="{{ $selected['username'] }}" name="username" placeholder="@lang('translate.username')"/>
                    </div>
                </div>
                {{-- phone --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='phone'></i></span>
                        <input type="text" id="Phone" class="form-control" name="phone" onkeypress="return isNumberKey(event)" value="{{ $selected['phone'] }}" placeholder="01×××××××××"/>
                    </div>
                </div>
                {{-- email --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='at-sign'></i></span>
                        <input type="email" id="email" class="form-control" name="email" value="{{ $selected['email'] }}" placeholder="email@example.com"/>
                    </div>
                </div>
                {{-- priority --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="priority">@lang('translate.priority') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                        <select class="form-control" name="priority">
                            <option value="1" {{ $selected->priority == 1 ? 'selected' : '' }}>@lang('translate.high')</option>
                            <option value="2" {{ $selected->priority == 2 ? 'selected' : '' }}>@lang('translate.medium')</option>
                            <option value="3" {{ $selected->priority == 3 ? 'selected' : '' }}>@lang('translate.low')</option>
                        </select>
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
                        <select id="selectedCity" class="form-control">
                            <option selected disabled>@lang('translate.select')</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ $selected->city_id == $city->id ? 'selected' : '' }}>{{ $city->$nameOnLang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script type="text/javascript">
                    VirtualSelect.init({
                        ele: '#selectedCity',
                        search: true
                    });
                </script>
                {{-- delivery time --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="delivery_time">@lang('translate.deliveryTime') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='clock'></i></span>
                        <input type="text" class="form-control" value="{{ $selected->delivery_time }}" name="delivery_time" placeholder="@lang('translate.deliveryTime')"/>
                    </div>
                </div>
                {{-- delivery cost --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="delivery_cost">@lang('translate.deliveryCost') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                        <input type="text" class="form-control" value="{{ $selected->delivery_cost }}" name="delivery_cost" placeholder="@lang('translate.deliveryCost')"/>
                    </div>
                </div>
                {{-- Lang --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="phone">@lang('translate.defaultLang') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='globe'></i></span>
                        <select class="form-control" name="lang">
                            <option {{ $selected['lang'] == 'en' ? 'selected' : '' }} value="en">@lang('translate.en')</option>
                            <option {{ $selected['lang'] == 'ar' ? 'selected' : '' }} value="ar">@lang('translate.ar')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-1 d-flex">
                    <button type="submit" class="btn btn-primary w-100" style="min-width: 180px">@lang('translate.save')</button>
                </div>
            </div>
        </form>
    </div>
</div>
