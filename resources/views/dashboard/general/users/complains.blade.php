<div class="row mb-2">
    <div class="d-inline">
        <h4 class="d-inline">@lang('translate.complains')</h4>
    </div>
</div>

{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('translate.image')</th>
                    <th>@lang('translate.vendor')</th>
                    <th>@lang('translate.title')</th>
                    <th>@lang('translate.body')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($selected['complains'] as $single)
                    <tr>
                        <td>
                            <div class="avatar avatar-xl">
                                <img alt="" src="{{ asset($single->image ? 'storage/images/complains/'. $single->image : 'storage/images/global/logo-dark.jpg') }}"/>
                            </div>
                        </td>

                        <td>{{ $single->title }}</td>

                        <td>{{ $single->body }}</td>

                        <td>{{ $single->vendor->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

