<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajerController extends Controller
{
    public function index()
    {
        $ruangan = DB::select('select r.nama, r.status, r.idruangan, u.name from ruangan r, users u where r.cs_id=u.id');
        return view('dashboardManajer',['ruangan' => $ruangan]);
    }

    public function editprofil($id)
    {
        // $manajer = DB::select('select m.nama, m.status, u.name from ruangan r, users u where r.cs_id=u.id');
        $manajer = User::find($id);
        return view('manajer.editprofil', compact('manajer'));
    }

    public function updateprofil(Request $request, $id)
    {
        // $manajer = DB::select('select m.nama, m.status, u.name from ruangan r, users u where r.cs_id=u.id');
        $manajer = User::find($id);
        $manajer->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email
        ]);
        // return view('manajer.editprofil', compact('manajer'));
        return redirect('/manajer');
    }

}
