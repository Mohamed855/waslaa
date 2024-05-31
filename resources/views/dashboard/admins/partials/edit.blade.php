<div class="modal fade modal-secondary text-start" id="EditAdmin{{ $single->id }}" tabindex="-1" aria-labelledby="myModalLabel1660" aria-hidden="true">
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
                            <form id="updateAdminForm{{ $single->id }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="row">
                                    {{-- edit name --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="name" class="form-control" value="{{ $single->name }}" name="name" placeholder="@lang('translate.name')" />
                                        </div>
                                    </div>
                                    {{-- edit username --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="username">@lang('translate.username') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="type"></i></span>
                                            <input type="text" id="username" class="form-control" value="{{ $single->username }}" name="username" placeholder="@lang('translate.username')" />
                                        </div>
                                    </div>
                                    {{-- edit email --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                            <input type="email" id="email" class="form-control" value="{{ $single->email }}" name="email" placeholder="@lang('translate.email')" />
                                        </div>
                                    </div>
                                    {{-- edit phone --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="phone"></i></span>
                                            <input type="text" id="phone" class="form-control" value="{{ $single->phone }}" name="phone" onkeypress="return isNumberKey(event)" placeholder="+201×××××××××" style="direction: ltr;"/>
                                        </div>
                                    </div>
                                    {{-- edit password --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="password">@lang('translate.password') (@lang('translate.enterPasswordToChange'))</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather='lock'></i></span>
                                            <input type="text" class="form-control" name="password" placeholder="@lang('translate.password')" />
                                        </div>
                                    </div>
                                    {{-- edit avatar --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                        <div class="input-group input-group-merge">
                                            <input type="file" id="avatar" class="form-control" name="avatar" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">@lang('translate.save')</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('translate.cancel')</button>
                                    </div>
                                </div>
                            </form>
                            @if ($single->avatar != null)
                                <div class="col-12">
                                    <form class="col-1 mt-1" action="{{ route('removeImage', ['id' => $single->id, 'table' => 'admin']) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" style="min-width: 145px" data-bs-toggle="modal">
                                            <i data-feather="x"></i>
                                            @lang('translate.removeImage')
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
