<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'status',
        'created_at',
        'updated_at',
    ];


    public function fromUser() {
        return $this->hasOne('App\Models\User', 'id', 'from_user_id');
    }
    public function toUser() {
        return $this->hasOne('App\Models\User', 'id', 'to_user_id');
    }
}
