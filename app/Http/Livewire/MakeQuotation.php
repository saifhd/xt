<?php

namespace App\Http\Livewire;

use App\Models\Quotation;
use Livewire\Component;

class MakeQuotation extends Component
{
    public $drug;
    public $quantity;
    public $datas = [];
    public $prescription_id;

    protected $rules =[
        'drug' => 'required|string',
        'quantity' => 'required|numeric'
    ];

    public function mount($prescription)
    {
        $this->prescription_id = $prescription->id;
        $this->datas = Quotation::query()
            ->where('prescription_id',$prescription->id)
            ->get()
            ->map(function($item){
                $item->price = $item->unit_price;
                $item->amount = $item->total_amount;
                return $item;
            })
            ->toArray();
    }

    public function render()
    {
        // $this->id= $prescription->id;
        return view('livewire.make-quotation');
    }

    public function addItem()
    {
        $this->validate();
        $price = rand(1,99);
        $amount = $price * $this->quantity;

        $this->datas[] = [
            'quantity' => $this->quantity,
            'drug' => $this->drug,
            'price' => number_format((float)$price, 2, '.', ''),
            'amount' => number_format((float)$amount, 2, '.', '')
        ];
        $this->drug = '';
        $this->quantity = '';
    }


}
