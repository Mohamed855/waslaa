<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddManager" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="managersStore" class="form form-vertical" action="{{ route('managers.store') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- add name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="@lang('translate.name')" />
                                        </div>
                                    </div>
                                    {{-- add username --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="username">@lang('translate.username') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="@lang('translate.username')" />
                                        </div>
                                    </div>
                                    {{-- add email --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                            <input type="email" class="form-control" name="email" placeholder="email@example.com" />
                                        </div>
                                    </div>
                                    {{-- add phone --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='phone'></i></span>
                                            <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" placeholder="+201×××××××××" style="direction: ltr;"/>
                                        </div>
                                    </div>
                                    {{-- add password --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="password">@lang('translate.password') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='lock'></i></span>
                                            <input type="text" class="form-control" name="password" placeholder="@lang('translate.password')" />
                                        </div>
                                    </div>
                                    {{-- add avatar --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" class="form-control" name="avatar"/>
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
