<div class="row mb-2">
    <div class="d-inline">
        <h4 class="d-inline">@lang('translate.orders')</h4>
    </div>
</div>

{{-- tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table text-center table-bopened" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('translate.name')</th>
                    <th>@lang('translate.type')</th>
                    <th>@lang('translate.quantity')</th>
                    <th>@lang('translate.price')</th>
                    @if($selected->status == 'opened' && $guard != 'admin')
                        <th>@lang('translate.actions')</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($selected['orders'] as $single)
                    <tr>
                        <td>{{ $single['name'] }}</td>
                        <td>{{ $single['type'] }}</td>
                        <td>{{ $single['quantity'] }}</td>
                        <td>{{ $single['price'] }}</td>

                        @if($selected->status == 'opened' && $guard != 'admin')
                            <td>
                                <button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#removeModal' . $single->id }}">
                                    <i data-feather="trash-2"></i>
                                    @lang('translate.remove')
                                </button>
                                <div class="modal fade" id="{{ 'removeModal' . $single->id }}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="removeModalLabel">@lang('translate.remove') @lang('translate.order')</h5>
                                                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i data-feather="x"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-start">
                                                @lang('translate.confirmRemove')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                                                <form class="d-inline" action="{{-- route('removeFromOrder', ['order_id' => $single->id, 'invoice_id' => $selected->id]) --}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        @lang('translate.remove')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
