{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
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
                    @foreach ($data as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a class="avatar avatar-xl">
                                    <img alt="" src="{{ asset($single->avatar ? 'storage/images/managers/' . $single->avatar : 'storage/images/global/profile.jpg') }}" />
                                </a>
                            </td>
                            <td> {{ $single->name }} </td>
                            <td> {{ $single->username }} </td>
                            <td style="direction: ltr;"> {{ $single->email }} </td>
                            <td style="direction: ltr;"> {{ $single->phone }} </td>
                            <td>
                                <form class="p-0 m-0"
                                    action="{{ route('activation.toggle', ['table' => 'manager', 'id' => $single->id]) }}"
                                    method="post">
                                    @csrf
                                    <label class="switch">
                                        <input type="checkbox" name="activated" onclick="this.form.submit()" {{ $single->active ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeManagerBtn" data-bs-toggle="modal" data-bs-target="#EditManager{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('dashboard.managers.partials.edit')
                                @if (auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                    @include('dashboard.partials.delete-modal', ['resource' => 'manager', 'resources' => 'managers'])
                                @endif
                            </td>
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
        $('.typeManagerBtn').on('click', function() {
            let id = $(this).attr('data-id');
            let manager = JSON.parse($(this).attr('data-'));
            $('#name').val(manager.name);
            $('#username').val(manager.username);
            $('#email').val(manager.email);
            $('#phone').val(manager.phone);
            let url = '{{ asset('') }}' + 'managers/' + id
            $('#updateManagerForm' + id).attr('action', url);
        });
    });
</script>
