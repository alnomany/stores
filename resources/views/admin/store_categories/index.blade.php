

@php

    if(Auth::user()->type == 4)

    {

        $vendor_id = Auth::user()->vendor_id;

    }else{

       $vendor_id = Auth::user()->id;        

    }

@endphp

@extends('admin.layout.default')

@section('content')

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="text-uppercase">{{ trans('labels.store_categories') }}</h5>

            <a href="{{ URL::to('admin/store_categories/add') }}" class="btn btn-secondary px-2 d-flex"><i

                    class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}</a>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="card border-0 my-3">

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered py-3 zero-configuration w-100">

                                <thead>

                                    <tr class="text-uppercase fw-500">

                                        <td></td>

                                        <td>{{ trans('labels.srno') }}</td>

                                        <td>{{ trans('labels.category') }}</td>

                                        <td>{{ trans('labels.status') }}</td>

                                        <td>{{trans('labels.created_date')}}</td>   

                                        <td>{{trans('labels.updated_date')}}</td>   

                                        <td>{{ trans('labels.action') }}</td>

                                        

                                    </tr>

                                </thead>

                                <tbody id="tabledetails" data-url="{{url('admin/store_categories/reorder_category')}}">

                                    @php $i=1; @endphp

                                    @foreach ($allcategories as $category)

                                        <tr class="fs-7 row1"  id="dataid{{$category->id}}" data-id="{{$category->id}}">

                                            <td><a tooltip="{{ trans('labels.move') }}"><i

                                                class="fa-light fa-up-down-left-right mx-2"></i></a></td>

                                            <td>@php echo $i++ @endphp</td>

                                            <td>{{ $category->name }}</td>

                                            <td>

                                                @if ($category->is_available == '1')

                                                    <a tooltip="{{trans('labels.active')}}" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/store_categories/change_status-' . $category->id . '/2') }}')" @endif

                                                        class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></a>

                                                @else

                                                    <a tooltip="{{trans('labels.inactive')}}" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/store_categories/change_status-' . $category->id . '/1') }}')" @endif

                                                        class="btn btn-sm btn-outline-danger"><i class="fas fa-close"></i></a>

                                                @endif

                                            </td>

                                            <td>{{ helper::date_format($category->created_at) }}<br>
                                            {{ helper::time_format($category->created_at,$vendor_id) }}

                                            </td>

                                            <td>{{ helper::date_format($category->updated_at) }}<br>
                                            {{ helper::time_format($category->updated_at,$vendor_id) }}
                                            </td>

                                            <td>

                                                <a href="{{ URL::to('admin/store_categories/edit-' . $category->id) }}" tooltip="{{trans('labels.edit')}}"

                                                    class="btn btn-outline-info btn-sm"> <i

                                                        class="fa-regular fa-pen-to-square"></i></a>

                                                <a tooltip="{{trans('labels.delete')}}" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/store_categories/delete-' . $category->id) }}')" @endif

                                                    class="btn btn-outline-danger btn-sm"> <i

                                                        class="fa-regular fa-trash"></i></a>

                                            </td>

                                            

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

@endsection

