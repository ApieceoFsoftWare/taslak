<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Advertisement::all();
        return view('admin.advertisement.index',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /**
         * İlanın kendi bilgileri, kategrori bilgileri ve hangi kullanıcıya ait olduğu bilgileri bize gerektiğinde bütün
         * bilgileri view sayfasına göndermemiz gerekiyor ki ilgili yerlerde kullanalım.
         */
        $data = Advertisement::all();
        $data_categories = Category::all();
        $data_users = User::all();
        return view('admin.advertisement.create',[
            'data'=>$data,
            'data_categories' => $data_categories,
            'data_users' => $data_users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Advertisement();
        $data->category_id = $request->category_id;
        $data->user_id = 0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        
        if($request->file('image')){
            $data->image= $request->file('image')->store('public/images');
        }
        $data->topic = $request->topic;
        $data->detail = $request->detail;
        $data->desired_features = $request->desired_features;
        $data->progress_status = $request->progress_status;
        $data->scoring = $request->scoring;
        $data->number_of_people = $request->number_of_people;
        $data->number_of_people_admitted = $request->number_of_people_admitted;
        $data->deadline = $request->deadline;
        if (isset($request->status)) {
            $data->status = $request->status;
        }
        $data->save();
        return redirect('admin/advertisement/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement, $id)
    {
        $data = Advertisement::find($id);
        return view('admin.advertisement.show',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @param  \App\Models\Category  $category
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement, Category $category, $id)
    {
        /**
         * İlanın kendi bilgileri, kategrori bilgileri ve hangi kullanıcıya ait olduğu bilgileri bize gerektiğinde bütün
         * bilgileri view sayfasına göndermemiz gerekiyor ki ilgili yerlerde kullanalım.
         */

        $data = Advertisement::find($id);
        $data_categories = Category::all();
        $data_users = User::all();
        return view('admin.advertisement.edit',[
            'data' => $data,
            'data_categories' => $data_categories,
            'data_users' => $data_users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @param  \App\Models\Category  $category
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $data = Advertisement::find($request->id);

        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        if($request->file('image')){
            $data->image= $request->file('image')->store('public/images');
        }
        $data->topic = $request->topic;
        $data->detail = $request->detail;
        $data->desired_features = $request->desired_features;
        $data->progress_status = $request->progress_status;
        $data->scoring = $request->scoring;
        $data->number_of_people = $request->number_of_people;
        $data->number_of_people_admitted = $request->number_of_people_admitted;
        $data->deadline = $request->deadline;
        if (isset($request->status)) {
            $data->status = $request->status;
        }
        
        $data->save();

        return redirect('admin/advertisement/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $Advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Advertisement $Advertisement, )
    {
        //  
        $data = Advertisement::find($request->id);
        if(isset($data->image)){
            Storage::delete($data->image); 
        }
        $data->delete();
        return redirect('admin/advertisement');

    }
    public static function destroyImage(Request $request, Advertisement $advertisement){
        
        $data = Advertisement::find($request->id);
        if(isset($data->image)){
            Storage::delete($data->image);
            //DB::statement("UPDATE `advertisements` SET `image` = NULL WHERE `advertisements`.`id` = ".$data->id.";");
            DB::table('advertisements')->where('id', $data->id)->update([
                'image' => null
            ]);
        }

        return redirect('admin/advertisement');

    }
}
