<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function cursos()
    {
        return view('site.cursos');
    }

    public function contato()
    {
        return view('site.contato');
    }

    public function departamentos()
    {
        return view('site.departamentos');
    }
}
