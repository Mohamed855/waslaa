{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(auth('admin')->user()->is_primary)
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.avatar')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.username')</th>
                        <th>@lang('translate.email')</th>
                        <th>@lang('translate.phone')</th>
                        @if (auth('admin')->user()->is_primary)
                            <th>@lang('translate.active')</th>
                            <th>@lang('translate.primary')</th>
                            <th>@lang('translate.actions')</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(auth('admin')->user()->is_primary)
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            {{-- avatar --}}
                            <td>
                                <a class="avatar avatar-xl">
                                    <img alt="" src="{{ asset($single->avatar ? 'storage/images/admins/' . $single->avatar : 'storage/images/global/profile.jpg') }}"/>
                                </a>
                            </td>
                            <td> {{ $single->name }} </td>
                            <td> {{ $single->username }} </td>
                            <td> {{ $single->email }} </td>
                            <td> {{ $single->phone }} </td>
                            @if (auth('admin')->user()->is_primary)
                                <td>
                                    @if ($single->email == 'admin@test.com' || $single->email == 'wasla@owner.com')
                                        -
                                    @else
                                        <form class="p-0 m-0" action="{{ route('activation.toggle', ['table' => 'admin', 'id' => $single->id]) }}" method="post">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($single->email == 'admin@test.com' || $single->email == 'wasla@owner.com')
                                        -
                                    @else
                                        <form class="p-0 m-0" action="{{ route('primary.toggle', $single->id) }}" method="post">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                    {{ $single->is_primary ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    @endif
                                </td>
                                <td style="min-width: 320px">
                                    @if ($single->email == 'admin@test.com' || $single->email == 'wasla@owner.com')
                                        -
                                    @else
                                        @if (! $single->is_primary)
                                            <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeAdminBtn" data-bs-toggle="modal" data-bs-target="#EditAdmin{{ $single->id }}" data-="{{ $single }}">
                                                <i data-feather="edit"></i>
                                                @lang('translate.edit')
                                            </button>
                                            @include('dashboard.admins.partials.edit')
                                            @include('dashboard.partials.delete-modal', ['resource' => 'admin', 'resources' => 'admins'])
                                        @else
                                            @lang('error.cannotEdit')
                                        @endif
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('dashboard.partials.paginate')
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.typeAdminBtn').on('click', function() {
            let id = $(this).attr('data-id');
            let admin = JSON.parse($(this).attr('data-'));
            $('#name').val(admin.name);
            $('#username').val(admin.username);
            $('#email').val(admin.email);
            $('#phone').val(admin.phone);
            let url = '{{ asset('') }}' + 'admins/' + id
            $('#updateAdminForm' + id).attr('action', url);
        });
    });
</script>
