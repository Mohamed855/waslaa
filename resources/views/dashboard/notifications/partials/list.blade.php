{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if(auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.image')</th>
                        <th>@lang('translate.name')</th>
                        <th>@lang('translate.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if(auth('vendor')->check() || (auth('admin')->check() && auth('admin')->user()->is_primary))
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            {{-- image --}}
                            <td>
                                <a class="avatar avatar-xl">
                                    <img alt="" src="{{ asset($single->image ? 'storage/images/notifications/' . $single->image : 'storage/images/global/logo-dark.jpg') }}"/>
                                </a>
                            </td>
                            <td> {{ $single->$nameOnLang }} </td>
                            <td style="min-width: 320px">
                                <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeNotificationBtn" data-bs-toggle="modal" data-bs-target="#EditNotification{{ $single->id }}" data-="{{ $single }}">
                                    <i data-feather="edit"></i>
                                    @lang('translate.edit')
                                </button>
                                @include('dashboard.notifications.partials.edit')
                                @if ((auth('admin')->check() && auth('admin')->user()->is_primary) || auth('vendor')->check())
                                    @include('dashboard.partials.delete-modal', ['resource' => 'notification', 'resources' => 'notifications'])
                                @endif
                                <button type="button" class="btn btn-warning ms-auto" onclick="notifyUser()" data-bs-toggle="modal">
                                    <i data-feather="bell"></i>
                                    @lang('translate.notify')
                                </button>
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
        $('.typeNotificationBtn').on('click', function() {
            let id = $(this).attr('data-id');
            let notification = JSON.parse($(this).attr('data-'));
            $('#enName').val(notification.name_en);
            $('#arName').val(notification.name_ar);
            $('#enBody').val(notification.body_en);
            $('#arBody').val(notification.body_ar);
            let url = '{{ asset('') }}' + 'notifications/' + id
            $('#updateNotificationForm' + id).attr('action', url);
        });
    });
</script>
