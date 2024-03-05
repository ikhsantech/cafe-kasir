<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.home');
    }

        public function kategori(){
        return view('kategori.index');
    }

            public function jenis(){
        return view('jenis.index');
    }

                public function menu(){
        return view('menu.index');
    }

            public function tentang(){
        return view('dashboard.tentang');
    }




    
}
