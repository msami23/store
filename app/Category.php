<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id')
        ->WithDefault([
            'name'=> 'No Parent',
        ]);
    }
    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

}
