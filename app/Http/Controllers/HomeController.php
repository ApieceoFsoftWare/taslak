<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(){

        $data = Home::find(1);
        
        return view('home.index',[
            'data'=> $data
        ]);
    }
}
