<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'organizer_id', 'category_id', 'title', 'event_datetime', 'quota', 'status'
    ];

    public function organizer(){
        return $this->belongsTo(User::class, 'organizer_id', 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function registrations(){
        return $this->hasMany(Registration::class, 'event_id');
    }
}