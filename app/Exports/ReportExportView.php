<?php

namespace App\Exports;

use App\Models\h_penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;


class ReportExportView implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
            // $data = DB::table('h_penjualans')
            //     ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
            //     ->get()
        return view('table');
    }
}
