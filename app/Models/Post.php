<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'activity_id',
        'cover_image',
       
    ];

    public function activity () {

        return $this -> belongsTo(Activity::class);
    }

    public function outcomes () {

        return $this ->belongsToMany(Outcome::class);
    }

    public function images () {

        return $this -> belongsToMany(Image::class);
    }
}
