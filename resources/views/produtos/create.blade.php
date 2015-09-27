@extends('app')

 @section('content')
 <div class="container">
	 <h1>Novo Produto</h1>
	
	@if ($errors->any())
	 <ul class="alert alert-warning">
		 @foreach($errors->all() as $error)
			 <li>{{ $error }}</li>
		 @endforeach
	 </ul>
	@endif
<!-- Form::open(['url'=>'produtos/store']) Nova implementação de configuração de rotas abaixo
 -->
	
	 	 {!! Form::open(['route'=>'product.store']) !!}

         <div class="form-group">
             {!! Form::label('category', 'Category:') !!}
             {!! Form::select('category_id', $categories,null, ['class'=>'form-control']) !!}
         </div>

		 <div class="form-group">
             {!! Form::label('name', 'Nome:') !!}
             {!! Form::text('name', null, ['class'=>'form-control']) !!}
		 </div>

         <div class="form-group">
             {!! Form::label('price', 'Price:') !!}
             {!! Form::text('price', null, ['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
             {!! Form::label('description', 'Descrição:') !!}
             {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
         </div>

	 <div class="form-group">
	 {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
 </div>

 {!! Form::close() !!}

 </div>
@endsection




