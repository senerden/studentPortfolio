<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'outcome_id',
        'post_id',
    ];

}
