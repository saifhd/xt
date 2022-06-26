<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_price',
        'drug',
        'total_amount',
        'prescription_id'
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
