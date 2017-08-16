<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = ['code','product_id','price','channel','user_name','user_phone','people_number','trip_date','remark'];

    /**
     * 产品
     */
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

}
