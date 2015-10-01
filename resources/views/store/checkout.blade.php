@extends('store.store')


@if(isset($categories))

@section('categories')
    @include('store.partial.categories')
@stop

@endif

@section('content')

    <div class="container">

        @if($cart == 'empty')

            <h3>Carrinho de Compra Vazio!</h3>

        @else

        <h3>Pedido realizado com sucesso!</h3>

        <p>O Pedido #{{$order->id}}, foi realizado com sucesso!</p>

        @endif

    </div>

@stop