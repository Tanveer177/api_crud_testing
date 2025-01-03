<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_name',
        'user_id',
        'categroy_id',
        'details',
    ];
    public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
    }
     public function categroy(){
    return $this->hasOne(Category::class, 'id', 'categroy_id');
    }

}
