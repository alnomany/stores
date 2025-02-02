@extends('admin.layout.default')
@php
    if(Auth::user()->type == 4)
    {
        $vendor_id = Auth::user()->vendor_id;
    }else{
        $vendor_id = Auth::user()->id;
    }
@endphp
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-uppercase">{{ trans('labels.edit') }}</h5>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ URL::to('admin/shipping-area') }}">{{ trans('labels.shipping_area') }}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{ trans('labels.edit') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/shipping-area/update-' . $shippingareadata->id) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.area_name') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $shippingareadata->name }}"
                                        placeholder="{{ trans('labels.area_name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.amount') }}<span class="text-danger">
                                            * </span></label>
                                    <input type="text" class="form-control numbers_only" name="price"
                                        value="{{ $shippingareadata->price }}"
                                        placeholder="{{ trans('labels.amount') }}" required>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/shipping-area') }}"
                                    class="btn btn-outline-danger">{{ trans('labels.cancel') }}</a>
                                <button class="btn btn-secondary {{Auth::user()->type == 4 ? (helper::check_access('role_shipping_area', Auth::user()->role_id, $vendor_id, 'edit') == 1  ? '':'d-none'): ''}}"
                                    @if (env('Environment') == 'sendbox') type="button"
                                onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection