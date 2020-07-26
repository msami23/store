<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    protected $table ='carts';
    protected $fillable  =['user_id','product_id','quantity','price'];
    protected $primaryKey = ['user_id','product_id'];

    public $incrementing = false;
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);

    }
    public function product(){
        return $this->belongsTo(Product::class);

    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query->where('user_id', $this->user_id);
        $query->where('product_id', $this->product_id);
        return $query;

    }
}
