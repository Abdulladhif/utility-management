<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    use HasFactory;

    protected $fillable = ['meter_id', 'value', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}