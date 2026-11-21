<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $primaryKey = 'registration_id';

    protected $fillable = [
        'event_id', 'user_id', 'status'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class, 'registration_id');
    }
}