<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddComplain" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="complainsStore" class="form form-vertical" action="{{ route('complains.store') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="vendor_id" value="{{ auth('vendor')->id() }}"/>
                                <div class="row">
                                    {{-- add title --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="title">@lang('translate.title') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="title" placeholder="@lang('translate.title')"/>
                                        </div>
                                    </div>
                                    {{-- add body --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="body">@lang('translate.body') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <textarea class="form-control" name="body" placeholder="@lang('translate.body')"></textarea>
                                        </div>
                                    </div>
                                    @if (! request()->routeIs('userComplains'))
                                        {{-- add user --}}
                                        <div class="col-12 mb-1">
                                            <label class="form-label" for="user">@lang('translate.user') <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather='users'></i></span>
                                                <select id="addSelectedUser" class="form-control" name="user_id">
                                                    <option selected disabled>@lang('translate.select')</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            VirtualSelect.init({
                                                ele: '#addSelectedUser',
                                                search: true
                                            });
                                        </script>
                                    @else
                                        <input type="hidden" name="user_id" value="{{ $selectedUserId }}"/>
                                    @endif
                                    {{-- add image --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="image">@lang('translate.image') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success me-1">@lang('translate.create')</button>
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
