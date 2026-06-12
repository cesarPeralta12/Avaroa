<?php
namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    protected $query;

    public function __construct($query = null)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query ?? Order::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Order No',
            'User',
            'Total',
            'Status',
            'Payment',
            'Address',
            'Type',
            'Created At',
        ];
    }
}
