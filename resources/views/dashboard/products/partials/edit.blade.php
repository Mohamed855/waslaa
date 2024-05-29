<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('products.update', $selected->id) }}"
            class="form form-vertical" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row mb-2">
                {{-- en name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="name_en">@lang('translate.enName') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="type"></i></span>
                        <input type="text" class="form-control" name="name_en" value="{{ $selected->name_en }}" placeholder="@lang('translate.enName')"/>
                    </div>
                </div>
                {{-- ar name --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="name_ar">@lang('translate.arName') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="type"></i></span>
                        <input type="text" class="form-control" name="name_ar" value="{{ $selected->name_ar }}" placeholder="@lang('translate.arName')"/>
                    </div>
                </div>
                {{-- category --}}
                <div class="col-md-6 col-sm-12 mb-1">
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
                        <select id="selectedCategory" class="form-control" name="category_id">
                            <option selected disabled>@lang('translate.select')</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $selected->subcategory?->category_id ? 'selected' : '' }}>{{ $category->$nameOnLang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- subcategory --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="subcategory">@lang('translate.subcategory') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='book-open'></i></span>
                        <select id="selectedSubcategory" class="form-control" name="subcategory_id">
                            <option selected disabled>@lang('translate.select')</option>
                        </select>
                    </div>
                </div>
                {{-- components --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="component[]">@lang('translate.components') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='command'></i></span>
                        <select id="selectedComponents" class="form-control" name="component[]" multiple>
                            <option selected disabled>@lang('translate.select')</option>
                            @foreach ($components as $component)
                                <option value="{{ $component->id }}" {{ $selected->components && in_array($component->id, $selected->components?->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $component->$nameOnLang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- types --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="type[]">@lang('translate.types') <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='radio'></i></span>
                        <select id="selectedTypes" class="form-control" name="type[]" multiple>
                            <option selected disabled>@lang('translate.select')</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $selected->types && in_array($type->id, $selected->types?->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $type->$nameOnLang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- avatar --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                    <div class="input-group input-group-merge">
                        <input type="file" class="form-control" name="avatar"/>
                    </div>
                </div>
                <script type="text/javascript">
                    VirtualSelect.init({
                        ele: '#selectedCategory',
                        search: true
                    });
                    VirtualSelect.init({
                        ele: '#selectedComponents',
                        search: true
                    });
                    VirtualSelect.init({
                        ele: '#selectedTypes',
                        search: true
                    });
                </script>
            </div>
            <div class="row">
                <div class="col-12 col-md-1 d-flex">
                    <button type="submit" class="btn btn-primary w-100"
                            style="min-width: 180px">@lang('translate.save')</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        retrieveSubcategories({{ $selected->subcategory?->category_id }}, {{ $selected->subcategory_id }});
        $('#selectedCategory').on('change', function() {
            const categoryId = $(this).val();
            retrieveSubcategories(categoryId, {{ $selected->subcategory_id }});
        });
    });

    function retrieveSubcategories(categoryId, selectedSubcategoryId) {
        $.ajax({
            url: '{{ asset('') }}' + 'api/subcategories/' + categoryId,
            method: 'GET',
            success: function(response) {
                const selectSubcategory = $('#selectedSubcategory');
                selectSubcategory.empty();
                selectSubcategory.append($('<option>', {
                    value: '',
                    text: 'Select',
                    disabled: true,
                    selected: true
                }));
                response.forEach(subcategory => {
                    selectSubcategory.append($('<option>', {
                        value: subcategory.id,
                        text: subcategory.{{ $nameOnLang }},
                        selected: subcategory.id == selectedSubcategoryId ? true : false
                    }));
                });
            }
        });
    }
</script>
