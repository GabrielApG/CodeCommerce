<?php
 namespace CodeCommerce;

 class Cart
 {
     //carrinho cheio de itens

     // add item no carrinho add
     // remover item carrinho remove
     //pegar todos os itens do carrinho all
     //pegar o total do valor getValor
     //id do item, nome iten e valor


     private $itens;

     public function __construct(){

         $this->itens = [];
     }

     public function add($id, $name, $price)
     {
        // id do produto   dentro tem a quantidade preço e produto
         $this->itens += [
             $id => [   // Se tiver quantidade ele soma,senão tiver quantidade ela será 1
                 'qtd' => isset($this->itens[$id]['qtd']) ? $this->itens[$id]['qtd']++:1,
                 'price' => $price,
                 'name' => $name
             ]
         ];

         return $this->itens;
     }

     public function remove($id)
     {
         unset($this->itens[$id]);
     }

     public function all()
     {
         return $this->itens;
     }

     public function getTotal()
     {
         $total = 0;
         foreach($this->itens as $itens){
             $total += $itens['qtd'] + $itens['price'];
         }

         return $total;
     }


 }