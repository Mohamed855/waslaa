<div class="row mb-2">
    <div class="d-inline">
        <h4 class="d-inline">@lang('translate.addresses')</h4>
    </div>
</div>
{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('translate.id')</th>
                        <th>@lang('translate.type')</th>
                        <th>@lang('translate.city')</th>
                        <th>@lang('translate.address')</th>
                        <th>@lang('translate.building')</th>
                        <th>@lang('translate.floor')</th>
                        <th>@lang('translate.flat')</th>
                        <th>@lang('translate.specialMark')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selected['addresses'] as $single)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $single->main ? __('translate.main') : '-' }}</td>
                            <td>{{ $single->city?->$nameOnLang }}</td>
                            <td style="min-width: 320px">{{ $single->address }}</td>
                            <td>{{ $single->building }}</td>
                            <td>{{ $single->floor }}</td>
                            <td>{{ $single->flat }}</td>
                            <td>{{ $single->special_mark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
