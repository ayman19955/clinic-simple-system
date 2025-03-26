<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // A payment belongs to an appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
