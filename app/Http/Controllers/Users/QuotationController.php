<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\QuotationCreatedMail;
use App\Models\Prescription;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    //
    public function store(Request $request)
    {
        Quotation::query()
            ->where('prescription_id',$request->prescription_id)
            ->delete();
        foreach($request->drugs as $index=>$drug){
            Quotation::create([
                'quantity' => $request->quantity[$index],
                'unit_price' => $request->price[$index],
                'drug' => $drug,
                'total_amount' => $request->quantity[$index] * $request->price[$index],
                'prescription_id' => $request->prescription_id
            ]);
        }

        $prescription_user = Prescription::find($request->prescription_id)->user;
        $url = route('prescriptions.show',$request->prescription_id);
        Mail::to($prescription_user->email)->send(new QuotationCreatedMail($url));

        return redirect()->back()->with('success','Quetation Created Success');
    }
}
