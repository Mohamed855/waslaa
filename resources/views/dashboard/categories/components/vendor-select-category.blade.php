<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddCategory" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="categoriesStore" class="form form-vertical" action="{{ route('selectVendorCategory') }} " method="POST">
                                @csrf
                                <div class="row">
                                    {{-- add categories --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="categories[]">@lang('translate.categories') <span class="text-danger">*</span></label>
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
                                            <select id="selectedCategories" class="form-control" name="categories[]" multiple>
                                                <option selected disabled>@lang('translate.select')</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ auth('vendor')->user()->categories() && in_array($category->id, auth('vendor')->user()->categories()?->get()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <script type="text/javascript">
                                            VirtualSelect.init({
                                                ele: '#selectedCategories',
                                                search: true
                                            });
                                        </script>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success me-1">@lang('translate.select')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
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
