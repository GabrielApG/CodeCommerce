<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];


	public function itens(){

        //Acessar todos os item do itens
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user(){

        //Para recuperar o usuário
        return $this->belongsTo('CodeCommerce\User');
    }
}
