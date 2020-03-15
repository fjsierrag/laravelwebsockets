<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function __construct(){}

    public function pagina1()
    {
        return view('paginas.pagina1');
    }

}
