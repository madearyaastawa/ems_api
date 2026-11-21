<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'registration_id', 'ticket_code', 'qr_code'
    ];

    public function registration(){
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    public function attendance(){
        return $this->belongsTo(Attendance::class, 'ticket_id');
    }
}
