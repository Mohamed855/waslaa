{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @if (auth('vendor')->check())
                            <th></th>
                        @endif
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.image')</th>
                        @if (auth('admin')->check() && ! request()->routeIs('vendorComplains'))
                            <th>@lang('translate.vendor')</th>
                        @endif
                        @if (! request()->routeIs('userComplains'))
                            <th>@lang('translate.user')</th>
                        @endif
                        <th style="min-width: 320px">@lang('translate.title')</th>
                        <th style="min-width: 320px">@lang('translate.body')</th>
                        @if (auth('vendor')->check())
                            <th>@lang('translate.actions')</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $single)
                        <tr>
                            @if (auth('vendor')->check())
                                <td style="width: 5px">
                                    <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                                </td>
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="avatar avatar-xl">
                                    <img alt="" src="{{ asset($single->image ? 'storage/images/complains/'. $single->image : 'storage/images/global/logo-dark.jpg') }}"/>
                                </div>
                            </td>
                            @if (auth('admin')->check() && ! request()->routeIs('vendorComplains'))
                                <td><a href="{{-- route('showVendor', $single->vendor->username) --}}">{{ $single->vendor['name'] }}</a></td>
                            @endif
                            @if (! request()->routeIs('userComplains'))
                                <td>
                                    @if ($single->user)
                                        <a href="{{ route('showUser', $single->user->username) }}">{{ $single->user->username }}</a>
                                    @endif
                                </td>
                            @endif
                            <td>{{ $single->title }}</td>
                            <td>{{ $single->body }}</td>
                            @if (auth('vendor')->check())
                                <td style="min-width: 320px">
                                    <button data-id="{{ $single->id }}" class="btn btn-primary ms-auto typeComplainBtn" data-bs-toggle="modal" data-bs-target="#EditComplain{{ $single->id }}" data-="{{ $single }}">
                                        <i data-feather="edit"></i>
                                        @lang('translate.edit')
                                    </button>
                                    @include('dashboard.complains.partials.edit')
                                    @include('dashboard.partials.delete-modal', ['resource' => 'complain', 'resources' => 'complains'])
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
    $(document).ready(function () {
        $('.typeComplainBtn').on('click', function () {
            let id = $(this).attr('data-id');
            let complain = JSON.parse($(this).attr('data-'));
            let userId = $('#userId' + complain.id);
            userId.val(complain.user_id);
            $('#editSelectedUser' + complain.id).on('change', function () {
                let selectedUserId = $(this).val();
                userId.val(selectedUserId);
            });
            $('#title').val(complain.title);
            $('#body').val(complain.body);
            let url = '{{ asset('') }}' + 'complains/' + id
            $('#updateComplainForm' + id).attr('action', url);
        });
    });
</script>
