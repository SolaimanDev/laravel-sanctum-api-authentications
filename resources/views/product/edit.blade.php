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
                <div class="card-header">{{ __(' Create Product') }}</div>
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <strong>Whoops!</strong> There were some problems with your input.<br><br>
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
                <div class="card-body">                   
                  <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                  	@csrf
                  	    @method('PUT')
					  <div class="form-group row">
					    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					    <div class="col-sm-10">
					      <input type="text" name="name" value="{{$product->name}}" class="form-control" id="inputEmail3">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputEmail3" class="col-sm-2 col-form-label">Descriptions</label>
					    <div class="col-sm-10">
					      <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3">{{$product->description}}</textarea>
					    </div>
					  </div>

					 
					  <div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
					    <div class="col-sm-10">
					      <input type="text" name="price" value="{{$product->price}}" class="form-control" id="inputPassword3">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
					    <div class="col-sm-10">
					      <input type="file" name="image" class="form-control" id="inputPassword3">
					    </div>
					  </div>				  
					  <div class="form-group row">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					  </div>
					</form>
                </div>              
            </div>
        </div>
        
    </div>
</div>
@endsection
