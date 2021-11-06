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
            <div class="card">
                <div class="card-header">{{ __(' Show Product') }}</div>
				
                <div class="card-body">                   
                 <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Name:</strong>
	                {{ $product->name }}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Details:</strong>
	                {{ $product->description }}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Image:</strong>
	                <img src="/image/{{ $product->image }}" width="500px">
	            </div>
	        </div>
	    </div>
                </div>              
            </div>
        </div>
        
    </div>
</div>
@endsection
