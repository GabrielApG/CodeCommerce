@extends('store.store')

@section('content')

    <div class="container">

        <h3 class="text-center">Meus pedidos</h3>
        <br><br>

        <table class="table table-hover">
            <tbody>
            <tr>
                <th class="text-center">#Id</th>
                <th class="text-center">Itens</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Status</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td class="text-center">{{$order->id}}</td>
                <td class="text-center">
                    <ul>
                        @foreach($order->itens as $item)
                           <li>{{$item->product->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">{{$order->total}}</td>
                <td class="text-center">{{$order->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>




    </div>

@stop