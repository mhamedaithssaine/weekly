<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $fillable =[
        'centenu',
        'user_id',
        'annonce_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class,'annonec_id');
    }
}
