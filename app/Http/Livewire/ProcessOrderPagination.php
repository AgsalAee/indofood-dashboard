<?php

namespace App\Http\Livewire;

use App\Models\ProcessOrder;
use Livewire\Component;
use Livewire\WithPagination;

class ProcessOrderPagination extends Component
{
    use WithPagination;

    public $from_date = "";
    public $to_date = "";

    public $orderColumn = "po_id";
    public $sortOrder = "asc";

    public function render()
    {
        $pos = ProcessOrder::orderby($this->orderColumn, $this->sortOrder)->select('*');
        if (!empty($this->from_date) && !empty($this->to_date)) {
            $pos->whereBetween('finish_date', [$this->from_date, $this->to_date]);
        }
        $pos = $pos->paginate(10);

        return view('livewire.process-order-pagination', ['pos' => $pos,]);
    }
}
