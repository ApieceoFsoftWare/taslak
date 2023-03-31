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
        
        if($request->file('list_image') && $request->file('list_image') !== null){
            $data->list_image= $request->file('list_image')->store('public/images');
        }
        else
        {
            $data->list_image = ' ';
        }
        if($request->file('detail_image') && $request->file('detail_image') !== null){
            $data->detail_image= $request->file('detail_image')->store('public/images');
        }
        else
        {
            $data->detail_image = ' ';
        }
        $data->topic = $request->topic;
        $data->detail = $request->detail;
        $data->desired_features = $request->desired_features;
        
        if ($request->progress_status == 1 ||
            $request->progress_status == 2 ||
            $request->progress_status == 3 ||
            $request->progress_status == 4 ||
            $request->progress_status == 5
        ){
            
            $data->progress_status = $request->progress_status;
        }        
        
        //$data->scoring = $request->scoring;
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
        
        if($request->file('list_image') && $request->file('list_image') !== null){
            $data->list_image= $request->file('list_image')->store('public/images');
        }
        else
        {
            $data->list_image = asset('assets/images/Default_List_img.jpg');
        }
        if($request->file('detail_image') && $request->file('detail_image') !== null){
            $data->detail_image= $request->file('detail_image')->store('public/images');
        }
        else
        {
            $data->detail_image = asset('assets/images/Default_Detail_img.jpg');;
        }

        $data->topic = $request->topic;

        $data->detail = $request->detail;
        
        $data->desired_features = $request->desired_features;
        
        if ($request->progress_status == 1 ||
            $request->progress_status == 2 ||
            $request->progress_status == 3 ||
            $request->progress_status == 4 ||
            $request->progress_status == 5
        ){
            
            $data->progress_status = $request->progress_status;
        }    
        //$data->scoring = $request->scoring;
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

        $data->delete();
        
        return redirect('admin/advertisement');

    }
    public static function destroyDetailImage(Request $request, Advertisement $advertisement, $pid){
        
        $data = Advertisement::find($request->id);
        if(Storage::exists($data->detail_image) && $data->detail_image){
            Storage::delete($data->detail_image);
            //DB::statement("UPDATE `advertisements` SET `image` = NULL WHERE `advertisements`.`id` = ".$data->id.";");
            DB::table('advertisements')->where('id', $data->id)->update([
                'detail_image' => ''
            ]);
        }

        return redirect()->route('admin.image.index', ['pid'=>$pid]);

    }
    public static function destroyListImage(Request $request, Advertisement $advertisement, $pid){
        
        $data = Advertisement::find($request->id);
        if(Storage::exists($data->list_image && $data->list_image)){
            Storage::delete($data->list_image);
            //DB::statement("UPDATE `advertisements` SET `image` = NULL WHERE `advertisements`.`id` = ".$data->id.";");
            DB::table('advertisements')->where('id', $data->id)->update([
                'list_image' => ''
            ]);
        }
        

        return redirect()->route('admin.image.index', ['pid'=>$pid]);

    }
}
