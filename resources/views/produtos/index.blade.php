<html>
 <head>
 	<title>Produtos</title>
 </head>

 <body>



@extends('app') 

 @section('content')
 <div class="container">
	 <h1>Produtos</h1>
	 	<h3><a href="{{route('product.create')}}"  class="btn-sm btn-success">Adicionar</a> </h3>
		 <table class="table table-striped table-bordered table-hover">
		<thead>
		 <tr>
		 	<th>ID</th>
		 	<th>Nome</th>
		 	<th>Descricao</th>
            <th>Category</th>
            <th>Featured</th>
             <th>Recommended</th>
		 	<th>Ação</th>
		 </tr>
		</thead>
		<tbody>
		
		@foreach($produtos as $produto)

            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->name }}</td>
                <td width="20">{{ substr($produto->description,0,10 ) }} ...</td>
                <td>{{ $produto->category->name }}</td>
                <td>
                    @if($produto->featured == 1)
                       {{'Sim'}}
                    @else
                        {{'Não'}}
                    @endif
                </td>
                <td>
                    @if($produto->recommeded == 1)
                        {{'Sim'}}
                    @else
                        {{'Não'}}
                    @endif
                </td>
                <td>
                    <a href="{{route('product.edit',['id'=>$produto->id])}}" class="btn-sm btn-success">Editar</a>
                    <a href="{{route('product.images',['id'=>$produto->id])}}" class="btn-sm btn-info">Images</a>
                    <a href="{{route('product.destroy',['id'=>$produto->id])}}" class="btn-sm btn-danger">Remover</a>

                </td>
            </tr>

		@endforeach

		</tbody>
		</table>

 </div>
 @endsection

 </body>

<html>