<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'imagable_type',
        'imagable_id'
    ];

    public function imagable()
    {
        return $this->morphTo();
    }
}
