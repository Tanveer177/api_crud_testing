<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'descriptions',
        'user_id',
    ];
        public function user_id(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
