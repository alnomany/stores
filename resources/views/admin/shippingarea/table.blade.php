@php
      if(Auth::user()->type == 4)
        {
            $vendor_id = Auth::user()->vendor_id;
        }else{
            $vendor_id = Auth::user()->id;
        }
@endphp
<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="text-uppercase fw-500">
            <td></td>
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.area_name') }}</td>
            <td>{{ trans('labels.amount') }}</td>
            <td>{{trans('labels.created_date')}}</td>   
            <td>{{trans('labels.updated_date')}}</td> 
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody id="tabledetails" data-url="{{url('admin/shipping-area/reorder_shippingarea')}}">
        @php $i=1; @endphp
        @foreach ($getshippingarealist as $shippingarea)
            <tr class="fs-7 row1" id="dataid{{$shippingarea->id}}" data-id="{{$shippingarea->id}}">
                <td><a tooltip="{{ trans('labels.move') }}"><i
                    class="fa-light fa-up-down-left-right mx-2"></i></a></td>
                <td>@php echo $i++ @endphp</td>
                <td>{{ $shippingarea->name }}</td>
                <td>{{ helper::currency_formate($shippingarea->price, $vendor_id) }}</td>
                <td>{{ helper::date_format($shippingarea->created_at) }}<br>
                {{ helper::time_format($shippingarea->created_at,$vendor_id) }}
                   
                </td>
                <td>{{ helper::date_format($shippingarea->updated_at) }}<br>
                {{ helper::time_format($shippingarea->updated_at,$vendor_id) }}
                </td>
                <td>
                    <a href="{{ URL::to('admin/shipping-area/show-' . $shippingarea->id) }}" tooltip="{{trans('labels.edit')}}"
                        class="btn btn-outline-info btn-sm {{Auth::user()->type == 4 ? (helper::check_access('role_shipping_area', Auth::user()->role_id, $vendor_id, 'edit') == 1  ? '':'d-none'): ''}}"> <i class="fa-regular fa-pen-to-square"></i></a>
                    <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else  onclick="deletedata('{{ URL::to('admin/shipping-area/delete-' . $shippingarea->id) }}')" @endif tooltip="{{trans('labels.delete')}}"
                        class="btn btn-outline-danger btn-sm {{Auth::user()->type == 4 ? (helper::check_access('role_shipping_area', Auth::user()->role_id, $vendor_id, 'delete') == 1  ? '':'d-none'): ''}}"> <i class="fa-regular fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
