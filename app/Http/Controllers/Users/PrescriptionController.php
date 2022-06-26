<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StorePrescriptionStoreRequest;
use App\Models\Prescription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::query()
            ->with(['timeSlot:id,start_time,end_time','user:id,name'])
            ->orderByDesc('id')
            ->paginate(15)->through(function($item){
                $item->start_time = Carbon::parse($item->timeSlot->start_time)->format('g:i A');
                $item->end_time = Carbon::parse($item->timeSlot->end_time)->format('g:i A');
                return $item;
            });

        return view('users.prescriptions.index',[
            'prescriptions' =>$prescriptions
        ]);
    }

    public function create()
    {
        return view('users.prescriptions.create');
    }

    public function store(StorePrescriptionStoreRequest $request)
    {
        $Prescription = Prescription::create([
            'user_id' => auth()->user()->id,
            'note' => $request->note,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'address_line_3' => $request->address_line_3,
            'time_slot_id' => $request->delevery_time,
            'delevery_date' => $request->delevery_date
        ]);

        foreach($request->prescription as $Prescription_image){
            $path = $Prescription_image->store('/prescriptions','public');
            $Prescription->images()->create([
                'image_path' => $path
            ]);
        }

        return redirect()->back()->with('success','Successfully Prescription Uploaded');
    }

    public function show($id)
    {
        $prescription = Prescription::query()
            ->with('images')
            ->withCount('quotations')
            ->where('id',$id)
            ->first();
            
        return view('users.prescriptions.show',[
            'prescription' => $prescription
        ]);
    }

    public function changeStatus($id, Request $request)
    {
        Prescription::query()
            ->where('id',$id)
            ->update([
                'status' => $request->status
            ]);

        return redirect()->back()->with('success','Successfully status updated');
    }

}
