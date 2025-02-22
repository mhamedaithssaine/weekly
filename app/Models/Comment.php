<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



class Comment extends Model
{
    use HasFactory, softDeletes;
    protected $table='comments';
    protected $fillable =[
        'contenu',
        'user_id',
        'annonce_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class,);
    }
}
