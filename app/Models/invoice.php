<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $guarded = [];
    public function invoiceDetail(){
        return $this->belongsTo(invoice::class, "invoice_detail");
    }
}
