<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommended'
                           ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images(){

        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags(){

        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagListAttribute(){

        $tags  = $this->tags->lists('name');

        return implode(',', $tags);
    }

    public function scopeFeatured($query){

        return $query->where('featured','=',1);
    }

    public function scopeRecommended($query){

        return $query->where('recommended','=',1);
    }

    public function scopeOfCategory($query, $type){ // Passando o Of da para passar o type para a fun��o

        return $query->where('category_id','=',$type);
    }
}
