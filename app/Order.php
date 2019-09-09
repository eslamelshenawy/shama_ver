<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        public function product_details()
    {
        return $this->belongsTo('App\product',"product_id");
    }

    //Relation to Users
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
        //Relation to Users
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetails');
    }
    
    
        //Relation to rate
    public function rate()
    {
        return $this->hasOne('App\Rate');
    }
    


}
