<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;



class Annonce extends Model
{
    use HasFactory, softDeletes;
    protected $table ='annonces';

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'image',
        'status',
        'user_id',
        'category_id',

    ];

        public function category(): BelongsTo
    { 
        return $this->belongsTo(Category::class,'category_id'); 
    }
    public function User(): BelongsTo
    { 
        return $this->belongsTo(User::class,'user_id'); 
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
