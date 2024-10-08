<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                <tr>
                    @if(request()->routeIs('users.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                        <th></th>
                    @endif
                    <th>@lang('translate.id')</th>
                    <th>@lang('translate.avatar')</th>
                    <th>@lang('translate.name')</th>
                    <th>@lang('translate.username')</th>
                    <th>@lang('translate.phone')</th>
                    <th>@lang('translate.secPhone')</th>
                    <th>@lang('translate.gender')</th>
                    <th>@lang('translate.city')</th>
                    <th>@lang('translate.verified')</th>
                    @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                        <th>@lang('translate.active')</th>
                    @endif
                    <th>@lang('translate.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $single)
                    <tr>
                        @if(request()->routeIs('users.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                            <td style="width: 5px">
                                <input type="checkbox" class="cursor-pointer record-checkbox" value="{{ $single->id }}">
                            </td>
                        @endif
                        <td>{{ $loop->iteration }}</td>
                        {{-- avatar --}}
                        <td>
                            @include('dashboard.partials.image-modal', ['id' => $single->id, 'name' => $single->username, 'image' => asset($single->avatar ? 'storage/images/users/' . $single->avatar : 'storage/images/global/profile.jpg')])
                        </td>
                        <td> {{ $single->name }} </td>
                        <td> {{ $single->username }} </td>
                        <td> {{ $single->phone }} </td>
                        <td> {{ $single->sec_phone ?? '-' }} </td>
                        <td> @lang('translate.' . $single->gender) </td>
                        <td>
                            {{ $single->city->$nameOnLang }}
                        </td>
                        <td>
                            @if ($single->verified)
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                                    <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                                    <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"></path><path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"></path>
                                </svg>
                            @endif
                        </td>
                        @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                            <td>
                                <form class="p-0 m-0"
                                    action="{{ route('toggleActive', ['table' => 'user', 'id' => $single->id]) }}"
                                    method="post">
                                    @csrf
                                    <label class="switch">
                                        <input type="checkbox" name="activated" onclick="this.form.submit()"
                                                {{ $single->active ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                        @endif
                        <td style="min-width: 320px">
                            <a href="{{ route('showUser', $single->username) }}">
                                <button class="btn btn-warning ms-auto">
                                    <i data-feather="eye"></i>
                                    @lang('translate.show')
                                </button>
                            </a>
                            @if (request()->routeIs('users.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                                @include('dashboard.partials.delete-modal', ['resource' => 'user', 'resources' => 'users'])
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.partials.paginate')
    </div>
</div>
