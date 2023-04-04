<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $primaryKey = 'customer_id';
    public function invoices()
    {
    return $this->hasMany(invoice::class);
    }

}
