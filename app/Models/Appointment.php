<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $guarded =[];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // An appointment belongs to a practitioner
    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class);
    }

    // An appointment has one treatment
    public function treatment()
    {
        return $this->hasMany(Treatment::class);
    }

    // An appointment has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
