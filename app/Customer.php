<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use SoftDeletes;

    protected $table = 'customers';
    protected $primaryKey = 'id';

    public function bills()
    {
        return $this->hasMany("App\Bills", 'id_customer', 'id');
    }
}