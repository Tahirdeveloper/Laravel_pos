<?php

namespace App\Models;
use App\Models\invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $primaryKey = 'customer_id';
    public function invoice()
    {
    return $this->hasMany(invoice::class,'customer_id');
    }

}
