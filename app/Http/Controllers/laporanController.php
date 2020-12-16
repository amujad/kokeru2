<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
class laporanController extends Controller
{
    public function index()
    {
        $listTanggal = laporan::select('tanggal')->groupBy('tanggal')->orderBy('tanggal','desc')->get();
        if(laporan::where('tanggal',date('Y-m-d'))->exists()){
            $laporan = laporan::where('tanggal',date('Y-m-d'))->get();
            $dateLaporan = date('Y-m-d');
        }
        else{
            $laporan = laporan::where('tanggal',Carbon::yesterday()->toDateString())->get();
            $dateLaporan = Carbon::yesterday()->toDateString();
        }
        return view('laporan.index',compact('listTanggal','laporan','dateLaporan'));
    }

    public function laporTgl($tanggal)
    {
        $listTanggal = laporan::select('tanggal')->groupBy('tanggal')->orderBy('tanggal','desc')->get();
        $laporan = laporan::where('tanggal',$tanggal)->get();
        $dateLaporan = $tanggal;
        return view('laporan.index',compact('listTanggal','laporan','dateLaporan'));
    }

    public function cetakPdf($tanggal)
    {
        $laporan = laporan::where('tanggal',$tanggal)->get();
        $dateLaporan = $tanggal;
        $pdf = PDF::loadview('Laporan.cetak_pdf', compact('laporan','dateLaporan'));
        return $pdf->download('laporan'.$dateLaporan.'.pdf');

    }

    public function resetRuang()
    {   
        $ruangan = DB::select('select r.nama, r.status, u.name, r.bukti1 from ruangan r, users u where r.cs_id=u.id');
        if(laporan::where('tanggal',date('Y-m-d'))->exists()){
            foreach($ruangan as $ruang){
                $log = laporan::where('tanggal',date('Y-m-d'))->where('ruang',$ruang->nama)->first();
                $log->PenanggungJawab = $ruang->name;
                $log->status = $ruang->status;
                if($ruang->status == "Sudah"){
                    $log->bukti = $ruang->bukti1;
                }
                else{
                    $log->bukti = "Tidak Ada";
                }
                $log->save();
            }
        }
        else{
            foreach($ruangan as $ruang){
                if($ruang->status == "Sudah"){
                    $bukti = $ruang->bukti1;
                }
                else{
                    $bukti = "Tidak Ada";
                }
                $insert = laporan::create([
                    'ruang' => $ruang->nama,
                    'PenanggungJawab' => $ruang->name,
                    'status' => $ruang->status,
                    'tanggal' => date('Y-m-d'),
                    'bukti' => $bukti
                ]);
            }
        }
        DB::update('update ruangan set status = "Belum" where idruangan = idruangan');
        return redirect()->back();  
    }

}
