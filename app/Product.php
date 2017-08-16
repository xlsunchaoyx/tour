<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * 线路产品
 */
class Product extends Model
{
    protected $fillable = ['name','price',];

    public function get_status()
    {
        if ($this->status == 'draft') {
            return '草稿';
        } elseif ($this->status == 'on') {
            return '上架';
        } else {
            return '下架';
        }
    }
}
