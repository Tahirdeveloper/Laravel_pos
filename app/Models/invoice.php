<?php

namespace App\Models;

use App\Models\order;
use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $primarykey = "invoice_no";
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }

}
