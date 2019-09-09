<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    public function images()
    {
        return $this->hasMany('App\Photo');
    }


    public function standardgold()
    {
        return $this->hasMany('App\StandardGold');
    }

      public function prices()
    {
        return $this->hasMany('App\Price');
    }

      public function size()
    {
        return $this->hasMany('App\Size');
    }
    public function favourite_product()
    {
        return $this->hasOne('App\FavouriteProduct');
    }
    public function topic()
    {
        return $this->hasOne('App\Topic');
    }

    public function topic_name($id,$lang)
    {

        $topic=\App\Topic::where("id",$id)->first();
        if($topic == null ){
            
        }else{
            
       if($lang == "en"){
           
            return  $topic->title_en;
        }else{
            return  $topic->title_il;
        }
        
        }
    }
    public function topic_size($id,$lang)
    {

        $topic=\App\Topic::where("id",$id)->first();
        // dump($topic);
        if($lang == "en"){
            return  $topic->size;
        }else{
            return  $topic->size;
        }
    }

    public function promo_code()
    {
        return $this->hasOne('App\PromoCode');
    }
    public function promo_code_amount($id)
    {
        $topic=\App\PromoCode::where("product_id",$id)->get();
        return  @$topic[0]->amount;

    }
    public function favourite_product_status($id)
    {
        $topic=\App\FavouriteProduct::where("product_id",$id)->where("status","1")->get();
        return  @$topic[0]->status;

    }

    public function favourit_product_status_user($id,$user_id)
    {
        $topic=\App\FavouriteProduct::where("product_id",$id)->where("user_id",$user_id)->where("status","1")->get();
        return  @$topic[0]->status;

    }

    public function rate()
    {
        return $this->hasMany('App\Rate');
    }

}
