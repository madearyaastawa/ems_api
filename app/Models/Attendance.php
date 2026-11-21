<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $primaryKey = 'attendance_id';

    protected $fillable = [
        'ticket_id', 'checked_in_at'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}