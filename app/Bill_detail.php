<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill_detail extends Model
{
    use SoftDeletes;

    protected $table = 'bill_detail';
    protected $primaryKey = 'id';

    public function bills()
    {
        return $this->belongsTo("App\Bills", 'id_bill', 'id');
    }

    public function products()
    {
        return $this->belongsTo("App\Products", 'id_product', 'id');
    }
}