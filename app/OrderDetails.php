<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    
            public function product_details()
    {
        return $this->belongsTo('App\product',"product_id");
    }

    //Relation to Users
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

}
