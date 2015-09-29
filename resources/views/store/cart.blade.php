@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Descrição</td>
                            <td class="price">Valor</td>
                            <td class="qtd">Quantidade</td>
                            <td class="total">Total</td>
                            <td></td>
                    </tr>
                    </thead>
                    @forelse($cart->all() as $k=>$item)
                    <tbody>
                        <tr>
                            <td class="cart_product" width="150">   <!-- Passa o id do produto-->
                                <a href="{{route('store.product', ['id'=>$k])}}">
                                    Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{route('store.product',['id'=>$k])}}">{{ $item['name'] }}</a></h4>

                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{$item['price']}}
                            </td>
                            <td class="cart_quantity">
                                   {{$item['qtd']}}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$item['price'] * $item['qtd']}}</p>
                            </td>
                            <td class="cart_delete">    <!-- o $k � o delete-->
                                <a href="{{route('cart.destroy', ['id'=>$k])}}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                        <tr colspan="6">
                            <td class="cart_product">   <!-- Passa o id do produto-->
                               <p>Nenhum item encontrado</p>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="cart_menu">

                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 100px">
                                    TOTAL: R$ {{$cart->getTotal() }}
                                </span>

                                <a href="#" class="btn btn-success">Fechar a Compra</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@stop