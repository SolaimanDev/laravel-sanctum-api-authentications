@extends('layouts.app')

@section('content')
<div class="container">
	    <div class="row">
    	<div class="col-md-2">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                   <ul class="list-group">
					  <li class="list-group-item"> <a href="">Product List</a> </li>
					  <li class="list-group-item">Order List</li>
					  <li class="list-group-item">A third item</li>
					  <li class="list-group-item">A fourth item</li>
					  <li class="list-group-item">And a fifth one</li>
					</ul>
                  
                </div>
            </div>
        </div>
        <div class="col-md-10">
        	<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
        </div>
    </div>
</div>

            <div class="card">
                <div class="card-header">{{ __('Product Manages') }}</div>

                <div class="card-body">
                   
                  <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Descriptions</th>
					      <th scope="col">Price</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($products as $key=>$product)
					    <tr>
					      <th scope="row">{{++$key}}</th>
					      <td>{{$product->name}}</td>
					      <td>{{$product->description}}</td>
					      <td>{{$product->price}}</td>
					    </tr>
					    @endforeach

					  </tbody>

					</table>

                </div>
                {{ $products->links() }}
            </div>
        </div>
        
    </div>
</div>
@endsection
