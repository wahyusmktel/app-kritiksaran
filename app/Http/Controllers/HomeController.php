<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UnitTujuan;

class HomeController extends Controller
{
    public function index()
    {
        $unitTujuan = UnitTujuan::all();
        return view('home', compact('unitTujuan'));
    }
}
