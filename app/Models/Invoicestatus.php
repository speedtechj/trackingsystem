<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoicestatus extends Model
{
    protected $table = 'invoicestatuses';

    public function trackstatus()
    {
        return $this->belongsTo(Trackstatus::class);
    }
}