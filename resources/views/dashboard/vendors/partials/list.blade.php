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
                    <th>@lang('translate.CRN')</th>
                    <th>@lang('translate.email')</th>
                    <th>@lang('translate.phone')</th>
                    <th>@lang('translate.city')</th>
                    <th>@lang('translate.followers')</th>
                    <th>@lang('translate.status')</th>
                    <th>@lang('translate.priority')</th>
                    <th>@lang('translate.rate')</th>
                    <th>@lang('translate.addedBy')</th>
                    <th>@lang('translate.active')</th>
                    <th>@lang('translate.actions')</th>
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
                            @include('dashboard.partials.image-modal', ['id' => $single->id, 'name' => $single->username, 'image' => asset($single->avatar ? 'storage/images/vendors/' . $single->avatar : 'storage/images/global/profile.jpg')])
                        </td>
                        <td> {{ $single->name }} </td>
                        <td> {{ $single->username }} </td>
                        <td> {{ $single->crn }} </td>
                        <td> {{ $single->email }} </td>
                        <td> {{ $single->phone }} </td>
                        <td> {{ $single->city->$nameOnLang }} </td>
                        <td> {{ count($single->favorites) }} </td>
                        <td> {{ $single->status }} </td>
                        <td>
                            @if ($single->priority == 1)
                                @lang('translate.high')
                            @elseif ($single->priority == 2)
                                @lang('translate.medium')
                            @else
                                @lang('translate.low')
                            @endif
                        </td>
                        <td> {{ $single->rate }} </td>
                        <td> {{ ucfirst($single->admin->username) }} </td>
                        <td>
                            <form class="p-0 m-0" action="{{ route('toggleActive', ['table' => 'vendor', 'id' => $single->id]) }}" method="post">
                                @csrf
                                <label class="switch">
                                    <input type="checkbox" name="activated" onclick="this.form.submit()"
                                            {{ $single->active ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </form>
                        </td>
                        <td style="min-width: 370px">
                            <a href="{{ route('showVendor', $single->username) }}">
                                <button class="btn btn-warning ms-auto">
                                    <i data-feather="eye"></i>
                                    @lang('translate.show')
                                </button>
                            </a>
                            @if (auth('admin')->check() && auth('admin')->user()->is_primary)
                                @include('dashboard.partials.delete-modal', ['resource' => 'vendor', 'resources' => 'vendors'])
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
