<?php

namespace App\Models;
use App\Models\Reservation;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'availability',
        'image_url',
    ];
    public function reservations()
{
    return $this->hasMany(Reservation::class);
}
public function images()
{
    return $this->hasMany(Image::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}

}
