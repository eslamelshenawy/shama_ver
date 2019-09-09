<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
        protected $table = 'carts';

        public function fav_product()
    {
        return $this->belongsTo('App\product',"product_id");
    }

    public function product_details($id)
    {
        $topic=\App\product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")->where("id",$id)->get();
        return  $topic ;
    }
    
        public function favourit_product_status($id)
    {
        $topic=\App\FavouriteProduct::where("product_id",$id)->where("status","1")->first();
        return  @$topic->status;

    }

        public function favourit_product_status_user($id,$user_id)
    {
        $topic=\App\FavouriteProduct::where("product_id",$id)->where("user_id",$user_id)->where("status","1")->first();
        return  @$topic->status;

    }

}
