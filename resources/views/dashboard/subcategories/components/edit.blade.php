<div class="modal fade modal-secondary text-start" id="EditSubcategory{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="updateForm{{ $single->id }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <input type="hidden" name="vendor" value="{{ auth('vendor')->check() ? auth('vendor')->id() : '' }}"/>
                                <input id="categoryId{{ $single->id }}" type="hidden" name="category_id" value=""/>
                                <div class="row">
                                    {{-- edit en name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_en">@lang('translate.enName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="enName" class="form-control" value="{{ $single->name_en }}" name="name_en" placeholder="@lang('translate.enName')"/>
                                        </div>
                                    </div>
                                    {{-- edit ar name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name_ar">@lang('translate.arName') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="arName" class="form-control" value="{{ $single->name_ar }}" name="name_ar" placeholder="@lang('translate.arName')"/>
                                        </div>
                                    </div>
                                    {{-- edit category --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="category">@lang('translate.category') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                                <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-layers">
                                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                                    <polyline points="2 17 12 22 22 17"></polyline>
                                                    <polyline points="2 12 12 17 22 12"></polyline>
                                                </svg>
                                            </span>
                                            <select id="editSelectedCategory{{ $single->id }}" class="form-control editSelectedCategory">
                                                <option selected disabled>@lang('translate.select')</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $single->category_id == $category->id ? 'selected' : '' }}>{{ $category->$nameOnLang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- edit avatar --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" class="form-control" name="avatar"/>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        VirtualSelect.init({
                                            ele: '.editSelectedCategory',
                                            search: true
                                        });
                                    </script>
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
