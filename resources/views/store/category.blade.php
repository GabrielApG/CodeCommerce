@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{$category->name}}</h2>

            <!-- Exibe a partial product onde listara todos os produtos-->
            <!-- Isto fala que os product � o pFeatured-->
            @include('store.partial.product', ['products' => $products])

        </div><!--features_items-->

    </div>

@stop