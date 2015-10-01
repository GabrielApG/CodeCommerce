@extends('app')

@section('content')
    <div class='container'>
        <h1>Categories</h1>

        <a href="{{route('categories.create')}}" class="btn btn-success">Nova Categoria</a>
        <br><br>
         <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.destroy',['id'=>$category->id]) }}" class="btn-sm btn-danger">Deletar</a> <!-- Observar se a rota esta com apelido -->
                    <a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn-sm btn-success">Editar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection