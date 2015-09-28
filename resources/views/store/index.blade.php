@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            <!-- Exibe a partial product onde listara todos os produtos-->
            <!-- Isto fala que os product � o pFeatured-->
            @include('store.partial.product', ['products' => $pFeatured])

        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            <!-- Atribuindo o products o recommended para que liste o recommended-->
            @include('store.partial.product', ['products' => $pRecommended])

        </div><!--recommended-->

    </div>

@stop