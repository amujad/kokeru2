<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
            $ruangan = DB::select('select r.nama, r.status, u.name from ruangan r, users u where r.cs_id=u.id');
            return view('home',['ruangan' => $ruangan]);
    }
}
