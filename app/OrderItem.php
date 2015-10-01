<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $fillable = [
        'product_id',
        'price',
        'qtd'
    ];



    //Forçar
    //Ele sempre vai acessar este item
    protected $table = 'order_itens';

    public function order(){

        return $this->belongsTo('CodeCommerce\Order');
    }

    public function product(){

            return $this->belongsTo('CodeCommerce\Product');
    }

}
