@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-8 margin-tb">
            <div class="pull-left">
                <h2>Product management </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </div>
    <div class="row">
         <div class="col-md-4">
            @include('includes.sidebar')
         </div>
         <div class="col-md-8">
            <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>

                <th width="280px">Action</th>
            </tr>
            @foreach ($products as $key=>$product)
            <tr>
                <td>{{ ++$key }}</td>
                <td><img src="{{asset('/uploads')}}/{{$product->image}}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
         
                        <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
          
                        <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
         
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        	</table>
            {!! $products->links() !!}
         </div>
     </div> 
    
   </div>     
@endsection
