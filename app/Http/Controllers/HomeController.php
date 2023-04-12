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

    public static function mainCategoryList()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public function index()
    {
        if (Home::find(1) !== null || Config::find(1) !== null) {
            # code...
            $data = Home::find(1);
            $data_config = Config::find(1);
            $data_category = Category::all();
            
            return view('home.index',[
                'data'=> $data,
                'data_config' => $data_config,
                'data_category' => $data_category
            ]);
        } 
        else 
        {
            # code...
            $data_category = Category::all();

            return view('home.index', [
                'data_category' => $data_category
            ]);
        }
    }
    
    // public function categoryadvertisements($id){
    //     $category = Category::find($id);
    //     $advertisement = DB::table('advertisements')->where('category_id', $id)->get();

    //     return view('home.categoryadvertisements',[
    //         'category' => $category,
    //         'advertisement' => $advertisement
    //     ]);
    // }

    public function advertisements($id=null, $slug=null){

        if ($id == null && $slug == null) {
            # code...
            $advertisements = Advertisement::all();
        }
        else{
            $advertisements = DB::table('advertisements')->where('category_id', $id)->get();
        }
        $data_category = Category::all(); 
        $data_config = Config::find(1);
        

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
