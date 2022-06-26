<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'note',
        'time_slot_id',
        'delevery_date',
        'user_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            if(auth()->user()->user_level == User::USER){
                $builder->where('user_id',auth()->user()->id);
            }
        });
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
