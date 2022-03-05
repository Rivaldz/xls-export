<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Exports\ReportExportView;
use App\Exports\ReportExportPasienView;
use Excel;

class ShoppingReport extends Controller
{
    public function create(Request $request){
        if (request()->start_date && request()->end_date && request()->jenis_pasien) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $jenisPasien = request()->jenis_pasien;
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->where('jenis_pasien',[$jenisPasien])
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->orderBy('tanggal','desc')
                        ->get();
        }
        else if (request()->jenis_pasien) {
            # code...
            $jenisPasien = request()->jenis_pasien;
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->where('jenis_pasien',[$jenisPasien])
                        ->orderBy('tanggal','desc')
                        ->get();
        }

        else if (request()->start_date && request()->end_date) {
            # code...
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->orderBy('tanggal','desc')
                        ->get();
        }
         else {
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->orderBy('tanggal','desc')
                        ->get();
        }
        return view('welcome',compact('data'));
    }

    public function jp(){
        if (request()->jenis_pasien === "#") {
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->orderBy('tanggal','desc')
                        ->get();
        }else{
            $jenis_pasien = request()->jenis_pasien;
            $data = DB::table('h_penjualans')
                        ->join('d_penjualans', 'd_penjualans.id_h_penjualan', '=', 'h_penjualans.id')
                        ->where('jenis_pasien',[$jenis_pasien])
                        ->get();
            
        }
        return view('welcome') -> with('data', $data);
    }

    public function downloadExcel(){
    // return Excel::download('New file', function($excel) {

    //         $excel->sheet('New sheet', function($sheet) {
        
    //             $sheet->loadView('table');
        
    //         });
        
    //     });
        return Excel::download(new ReportExportView(),'report.xlsx');
    }
}
