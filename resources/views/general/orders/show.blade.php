@extends('layouts.dashboard')
@section('title', ucfirst($selected->_user->username) . '\'s order')
@section('content')
    @if($selected->status == 'ordered' && $guard != 'admin')
        <section id="basic-horizontal-layouts">
            <div class="row">
                <div class="col-md-12 col-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{-- route('addToOrder', $selected->id) --}}"
                                  class="form form-vertical" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    {{-- categories --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.products')</label>
                                        <div class="input-group input-group-merge">
                                            <select class="form-control" name="products[]" style="min-height: 150px" multiple>
                                                @foreach($categories as $category)
                                                    <optgroup label="{{ $category->name }}">
                                                        @foreach($category->products as $product)
                                                            @if(! in_array($product->id, $selectedItems))
                                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                            @else
                                                                <option class="bg-light-success" disabled>{{ $product->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- creation time --}}
                                    <div class="col-12 mb-1">
                                        <label class="form-label" for="name">@lang('translate.creationTime')</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="clock"></i></span>
                                            <select class="form-control" name="creation_time">
                                                @for($t = 5; $t <= 90; $t += 5)
                                                    <option value="{{ $t }}" {{ $t == $selected->creation_time ? 'selected' : '' }}>{{ $t }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-1 d-flex">
                                        <button type="submit" class="btn btn-primary w-100"
                                                style="min-width: 180px">@lang('translate.update')</button>
                                    </div>
                                </div>
                            </form>
                            <div class="pt-1">
                                <button type="button" class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#completeModal' }}" style="min-width: 180px">
                                    <i data-feather="check"></i>
                                    @lang('translate.complete')
                                </button>
                                <div class="modal fade" id="{{ 'completeModal' }}" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="completeModalLabel">@lang('translate.complete') @lang('translate.order')</h5>
                                                <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i data-feather="x"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-start">
                                                @lang('translate.confirmComplete')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                                                <form class="d-inline" action="{{-- route('completeOrder', $selected->id) --}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">@lang('translate.complete')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="row mb-2">
            <div class="d-inline">
                <h4 class="d-inline">@lang('translate.products')</h4>
            </div>
        </div>

        {{-- tabel --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table text-center table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('translate.name')</th>
                            <th>@lang('translate.type')</th>
                            <th>@lang('translate.quantity')</th>
                            <th>@lang('translate.price')</th>
                            @if($selected->status == 'ordered' && $guard != 'admin')
                                <th>@lang('translate.actions')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($selected['products'] as $single)
                            <tr>

                                <td>{{ $single['name'] }}</td>
                                <td>{{ $single['type'] }}</td>
                                <td>{{ $single['quantity'] }}</td>
                                <td>{{ $single['price'] }}</td>

                                @if($selected->status == 'ordered' && $guard != 'admin')
                                    <td>
                                        <button type="button" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="{{ '#removeModal' . $single->id }}">
                                            <i data-feather="trash-2"></i>
                                            @lang('translate.remove')
                                        </button>
                                        <div class="modal fade" id="{{ 'removeModal' . $single->id }}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="removeModalLabel">@lang('translate.remove') @lang('translate.product')</h5>
                                                        <button type="button" class="btn btn-flat-light close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i data-feather="x"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        @lang('translate.confirmRemove')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                                                        <form class="d-inline" action="{{-- route('removeFromOrder', ['product_id' => $single->id, 'order_id' => $selected->id]) --}}" method="POST">
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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </section>
@endsection
