<div class="modal fade modal-secondary text-start" id="EditComplain{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="updateComplainForm{{ $single->id }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <input id="userId{{ $single->id }}" type="hidden" name="user_id" value=""/>
                                <div class="row">
                                    {{-- edit title --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="title">@lang('translate.title') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="title" class="form-control" value="{{ $single->title }}" name="title" placeholder="@lang('translate.title')"/>
                                        </div>
                                    </div>
                                    {{-- edit body --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="body">@lang('translate.body') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea class="form-control" id="body" name="body" placeholder="@lang('translate.body')">{{ $single->body }}</textarea>
                                        </div>
                                    </div>
                                    @if (auth('vendor')->check() && request()->routeIs('complains.index'))
                                        {{-- edit user --}}
                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="user">@lang('translate.user') <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather='map'></i></span>
                                                <select id="editSelectedUser{{ $single->id }}" class="form-control editSelectedUser">
                                                    <option selected disabled>@lang('translate.select')</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ $single->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            VirtualSelect.init({
                                                ele: '.editSelectedUser',
                                                search: true
                                            });
                                        </script>
                                    @else
                                        <input type="hidden" id="editSelectedUser{{ $single->id }}" value="{{ $selectedUserId }}"/>
                                    @endif
                                    {{-- edit image --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="image">@lang('translate.image')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
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
