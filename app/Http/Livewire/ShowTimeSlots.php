<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowTimeSlots extends Component
{
    public $delevery_date;

    public $timeSlots = [];

    public function render()
    {
        return view('livewire.show-time-slots');
    }

    public function dateChange()
    {
        $this->timeSlots = TimeSlot::select('id','start_time','end_time','capacity')
            ->withCount(['prescriptions'=>function($q){
                $q->where('delevery_date',$this->delevery_date);
            }])
            ->get()->filter(function($item){
                return $item->prescriptions_count < $item->capacity;
            });
    }
}
