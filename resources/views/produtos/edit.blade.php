@extends('app')

 @section('content')
 <div class="container">
 <h1>Editar Produto: {{$produto->name}}</h1>

 @if ($errors->any())
	 <ul class="alert alert-warning">
	 @foreach($errors->all() as $error)
	 <li>{{ $error }}</li>
 @endforeach
 </ul>
 @endif

 {!! Form::open(['route'=>['product.update', $produto->id], 'method'=>'put']) !!}

  <div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category_id', $categories, $produto->category->id,['class'=>'form-control']) !!}
   </div>


 <!-- Nome Form Input -->

 <div class="form-group">
	 {!! Form::label('nome', 'Nome:') !!}
	 {!! Form::text('nome', $produto->name, ['class'=>'form-control']) !!}
 </div>

 <!-- Descricao Form Input -->

 <div class="form-group">
	 {!! Form::label('descricao', 'Descrição:') !!}
	 {!! Form::textarea('descricao', $produto->description, ['class'=>'form-control']) !!}
 </div>

  <div class="col-sm-4">
    <div class="checkbox">
      <div class="checkbox">
        <label>
         @if($produto->featured == 1)
            <input type="checkbox" name="featured" id="featured" value="1" checked> Featured
         @else
            <input type="checkbox" name="featured" id="featured" value="1"> Featured
         @endif
        </label>
       </div>
     </div>
     <div class="checkbox">
       <div class="checkbox">
        <label>
         @if($produto->recommended == 1)
            <input type="checkbox" name="recommended" id="recommended" value="1" checked> Recommended
         @else
            <input type="checkbox" name="recommended" id="recommended" value="1"> Recommended
         @endif
        </label>
       </div>
    </div>
  </div>



 <div class="form-group">
 	{!! Form::submit('Salvar Produto', ['class'=>'btn btn-primary']) !!}
 </div>


 	{!! Form::close() !!}

 </div>
@endsection