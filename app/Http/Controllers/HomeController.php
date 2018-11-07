<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $id = Auth::id();
       $rol = DB::table('role_user')->select('role_id')->where('user_id',$id)->get();

      $rol_id = $rol[0]->role_id;
       if($rol_id == 1) {
          return redirect()->route('administrador.index');
       } else if($rol_id == 2) {
           redirect()->route('proveedor.index');
       } else if($rol_id == 3) {
           redirect()->route('administrador.index');
       } else {
           return view('home');
       }
        // return view('home');
    }
}
