<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['trip_date'];

    /**
     * 总订单金额
     */
    public function total_price()
    {
        return 100;
    }

    /**
     * 总订单人数
     */
    public function total_people()
    {
        return 100;
    }

    /**
     * 总订单数
     */
    public function total_saleorder_count()
    {
        return 3;
    }

    public function get_status()
    {
        if ($this->status == 'draft') {
            return '组团中';
        } elseif ($this->status == 'done') {
            return '已完成';
        }
    }
}
