<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormUploadBukti;
class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cs_id = Auth::user()->id;
        $ruangan = FormUploadBukti::where('cs_id', Auth::user()->id)->get() ;
        return view('Tugas.index', compact('ruangan'));
    }

    public function viewBukti($id){
        $ruang = FormUploadBukti::where('idruangan',$id)->first();
        return view('Tugas.viewBukti',compact('ruang'));
    }
    public function mViewBukti($id){
        $ruang = FormUploadBukti::where('idruangan',$id)->first();
        return view('mViewBukti',compact('ruang'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,svg|max:3048'
        ]);

        if($request->hasfile('filename')){
            $count = 1;
            $date = date('Ymd');
            $ruang = FormUploadBukti::where('idruangan',$request->id)->first();
            $ruangNama = $ruang->nama;
            $ruang->status = 'Sudah';
            foreach($request->file('filename') as $image){
                $name="bukti$count-$ruangNama-$date.".$image->extension();
                $name = $image->storeAs('public/bukti', $name);
                $data[] = $name;
                $count += 1;
            }
           
        }
        $ruang->bukti1 = json_encode($data);
        $ruang->save();
        return back()->with('success','Bukti telah diterima dan Status telah diubah');
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ruangan = FormUploadBukti::where('idruangan',$id)->get();

        return response()->json([
            'ruang' => $ruangan
        ]);
    }

}
