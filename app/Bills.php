<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bills extends Model
{
    use SoftDeletes;

    protected $table = 'bills';
    protected $primaryKey = 'id';

    public function customers()
    {
        return $this->belongsTo("App\Customers", 'id_customer', 'id');
    }

    public function bill_detail()
    {
        return $this->hasMany("App\Bill_detail", 'id_bill', 'id');
    }
}