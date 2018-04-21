<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Picture
 */
class Picture extends Model
{
    protected $table = 'picture';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'path',
        'url'
    ];

    protected $guarded = [];

        
}