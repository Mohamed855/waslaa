
<div class="row mb-2">
    <div class="d-inline">
        <h4 class="d-inline">@lang('translate.managers')</h4>
    </div>
</div>


<!-- Modal -->
<div class="modal fade modal-secondary text-start" id="AddManager" tabindex="-1"
     aria-labelledby="myModalLabel1660"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1660">@lang('translate.add')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}

                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">

                            <form id="managersStore" class="form form-vertical"
                                  action="{{ route('managers.store') }} "
                                  method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <input type="hidden" name="added_by" value="{{ $selected['id'] }}">

                                    {{-- add name --}}
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="name">@lang('translate.name')</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="name" placeholder="@lang('translate.name')"/>
                                        </div>
                                    </div>
                                    {{-- add email --}}
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="email">@lang('translate.email')</label>
                                            <input type="email"
                                                   class="form-control"
                                                   name="email" placeholder="email@example.com"/>
                                        </div>
                                    </div>
                                    {{-- add phone --}}
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="phone">@lang('translate.phone')</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="phone" placeholder="@lang('translate.phone')"/>
                                        </div>
                                    </div>
                                    {{-- add password --}}
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="password">@lang('translate.password')</label>
                                            <input type="password"
                                                   class="form-control"
                                                   name="password" placeholder="@lang('translate.password')"/>
                                        </div>
                                    </div>
                                    {{-- add avatar --}}
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                   for="avatar">@lang('translate.avatar')</label>
                                            <input type="file"
                                                   class="form-control"
                                                   name="avatar" placeholder="@lang('translate.avatar')"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-success me-1">@lang('translate.create')</button>
                                        <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal"
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

{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('translate.avatar')</th>
                    <th>@lang('translate.name')</th>
                    <th>@lang('translate.username')</th>
                    <th>@lang('translate.email')</th>
                    <th>@lang('translate.phone')</th>
                    <th>@lang('translate.active')</th>
                    <th>@lang('translate.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($selected['managers'] as $single)
                    <tr>
                        <td>
                            <div class="avatar avatar-xl">
                                <img alt="" src="{{ asset($single->avatar ? 'storage/images/managers/'. $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                            </div>
                        </td>

                        <td>{{ $single->name }}</td>

                        <td>{{ $single->username }}</td>

                        <td>{{ $single->email }}</td>

                        <td>{{ $single->phone }}</td>

                        <td>
                            <form class="p-0 m-0"
                                  action="{{ route('activation.toggle', ['table' => 'manager', 'id' => $single->id]) }}"
                                  method="post">
                                @csrf
                                <label class="switch">
                                    <input type="checkbox" name="activated" onclick="this.form.submit()"
                                        {{ $single->active ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </form>
                        </td>

                        <td style="min-width: 320px">
                            <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeBtn"
                                    data-bs-toggle="modal" data-bs-target="#EditManager" data-="{{ $single }}">
                                <i data-feather="edit"></i>
                                @lang('translate.edit')
                            </button>
                            @include('dashboard.partials.delete-modal', ['resource' => 'manager', 'resources' => 'managers'])
                        </td>

                        <div class="modal fade modal-secondary text-start" id="EditManager" tabindex="-1"
                             aria-labelledby="myModalLabel1660" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1660">@lang('translate.edit')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <section id="basic-vertical-layouts">
                                            <div class="row">
                                                <div class="col-md-12 col-12">

                                                    <form id="updateForm" class="form form-vertical"
                                                          method="POST" enctype="multipart/form-data">
                                                        @csrf @method('PUT')
                                                        <div class="row">
                                                            <input type="hidden" id="selectedProduct" name="product"
                                                                   value="">

                                                            {{-- edit name --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="name">@lang('translate.name')</label>
                                                                    <input type="text" id="managerName"
                                                                           class="form-control"
                                                                           value="{{ $single->name }}"
                                                                           name="name"
                                                                           placeholder="@lang('translate.name')"/>
                                                                </div>
                                                            </div>

                                                            {{-- edit username --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="username">@lang('translate.username')</label>
                                                                    <input type="text" id="managerUsername"
                                                                           class="form-control"
                                                                           value="{{ $single->username }}"
                                                                           name="username"
                                                                           placeholder="@lang('translate.username')"/>
                                                                </div>
                                                            </div>

                                                            {{-- edit email --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="email">@lang('translate.email')</label>
                                                                    <input type="email" id="managerEmail"
                                                                           class="form-control"
                                                                           value="{{ $single->email }}"
                                                                           name="email"
                                                                           placeholder="email@example.com"/>
                                                                </div>
                                                            </div>

                                                            {{-- edit phone --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="phone">@lang('translate.phone')</label>
                                                                    <input type="text" id="managerPhone"
                                                                           class="form-control"
                                                                           value="{{ $single->phone }}"
                                                                           name="phone"
                                                                           placeholder="@lang('translate.phone')"/>
                                                                </div>
                                                            </div>

                                                            {{-- edit password --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="password">@lang('translate.password') (@lang('translate.enterPasswordToChange'))</label>
                                                                    <input type="password"
                                                                           class="form-control"
                                                                           name="password" placeholder="@lang('translate.password')"/>
                                                                </div>
                                                            </div>

                                                            {{-- edit avatar --}}
                                                            <div class="col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                           for="avatar">@lang('translate.avatar')</label>
                                                                    <input type="file" id="avatar"
                                                                           class="form-control"
                                                                           name="avatar"
                                                                           placeholder="@lang('translate.avatar')"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button type="submit"
                                                                        class="btn btn-primary me-1">@lang('translate.save')</button>
                                                                <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">@lang('translate.cancel')</button>
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
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="7">
                            <button class="btn btn-link ms-auto" data-bs-toggle="modal" data-bs-target="#AddManager">
                                <i data-feather="user-plus"></i>
                                @lang('translate.add') @lang('translate.manager')
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.typeBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let manager = JSON.parse($(this).attr('data-'));

            $('#managerName').val(manager.name);
            $('#managerUsername').val(manager.username);
            $('#managerEmail').val(manager.email);
            $('#managerPhone').val(manager.phone);

            url = '{{ asset('') }}' + 'managers/' + id

            $('#updateForm').attr('action', url);
        });
    });
</script>

