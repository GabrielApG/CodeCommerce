<html>
 <head>
 	<title>Produtos</title>
 </head>

 <body>



@extends('app') 

 @section('content')
 <div class="container">
	 <h1>Images of {{$product->name}}</h1>

     <h3><a href="{{route('product.images.create',['id'=>$product->id])}}"  class="btn-sm btn-success">New Image</a> </h3>
		 <table class="table table-striped table-bordered table-hover">
		<thead>
		 <tr>
		 	<th>ID</th>
		 	<th>Image</th>
		 	<th>Extensiom</th>
		 	<th>Ação</th>
		 </tr>
		</thead>
		<tbody>
		
		@foreach($product->images as $image)

            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80" alt="">
                </td>
                <td>{{ $image->extension}}</td>
                <td>
                    {{--<a href="{{route('products.edit',['id'=>$image->product->id])}}" class="btn-sm btn-success">Editar</a>--}}
                    <a href="{{route('product.images.destroy',['id'=>$image->id])}}" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>

		@endforeach

		</tbody>
		</table>

     <a href="{{route('product')}}" class="btn btn-default">Voltar</a>

 </div>
 @endsection

 </body>

<html>