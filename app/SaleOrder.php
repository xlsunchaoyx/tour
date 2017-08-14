<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = ['code','product_id','price','channel','user_name','user_phone','people_number','trip_date','remark'];
}
