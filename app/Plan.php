<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['trip_date'];

    public function orders()
    {
        return $this->hasMany('App\SaleOrder');
    }

    /**
     * 总订单金额
     */
    public function total_price()
    {
        $total = 0;
        foreach ($this->orders as $order) {
            $total += $order->price;
        }
        return $total;
    }

    /**
     * 总订单人数
     */
    public function total_people()
    {
        $total = 0;
        foreach ($this->orders as $order) {
            $total += $order->people_number;
        }
        return $total;
    }

    /**
     * 总订单数
     */
    public function total_saleorder_count()
    {
        return count($this->orders);
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
