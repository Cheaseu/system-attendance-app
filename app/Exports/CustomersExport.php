<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $query = DB::table('attendances');

        // Search by fullname, location, or money
        if (!empty($this->search)) {

            $search = $this->search;

            $query->where(function ($q) use ($search) {

                $q->where('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('money', 'LIKE', "%{$search}%");

            });
        }

        return $query
            ->orderBy('id', 'desc')
            ->get([
                'id',
                'fullname',
                'money',
                'symbol',
                'location',
                'created_at',
            ]);
    }

    public function headings(): array
    {
        return [
            'Number',
            'Name',
            'Gift',
            'Currency',
            'Location',
            'Time',
        ];
    }
}