@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-3">
@include('includes.sidebar')

        </div>
   
     <div class="col-md-8">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Amount</th>
            <th>Order Date</th>
            <th>Status</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $key=>$order)
        <tr>
            <td>{{ ++$key }}</td>
            
            <td>{{ $order->amount }}</td>
            <td>{{ $order->date }}</td>
            @if($order->status==1)
            <td>Pending</td>
            @elseif($order->status==2)
            <td>Proccessing</td>
            @elseif($order->status==3)
            <td>Cancel</td>   
            @endif
            <td>
                <div class="btn-group">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Status
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/order-change/'.'1',$order->id)}}">Proccessing</a>
                    <a class="dropdown-item" href="">Cancel</a>
                    <a class="dropdown-item" href="">Shipped</a>
                  </div>
                </div>
            </td>
        </tr>
        @endforeach
    	</table>
     </div> 
    {!! $orders->links() !!}
   </div>     
@endsection
