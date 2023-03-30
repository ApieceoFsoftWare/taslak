<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use App\Models\Config;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(){

        $data = Home::find(1);
        $data_config = Config::find(1);
        $data_category = Category::all();
        
        return view('home.index',[
            'data'=> $data,
            'data_config' => $data_config,
            'data_category' => $data_category
        ]);
    }

    public function advertisements(){

        $advertisements = Advertisement::all();
        $data_config = Config::find(1);
        $data_category = Category::all();

        return view('home.advertisements',[
            'advertisements' => $advertisements,
            'data_config' => $data_config,
            'data_category' => $data_category
        ]);
    }

    public function advertisement($id){

        $advertisement = Advertisement::find($id);
        $data_config = Config::find(1);
        $data_category = Category::all();

        return view('home.advertisement',[
            'advertisement' => $advertisement,
            'data_config' => $data_config,
            'data_category' => $data_category
        ]);
    }

}
