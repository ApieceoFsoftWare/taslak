<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Models\Image;
use \App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        $data = Image::Where('advertisement_id', $pid)->get();
        $data_advertisement = Advertisement::find($pid);
        return view('admin.image.index',[
            'data' => $data,
            'data_advertisement' => $data_advertisement
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pid)
    {
        // İlgili ilanın galerisine resim eklemek için alttaki kodları kullandık! 
        
        $data = new Image();
        $data->advertisement_id = $pid;
        $data->title = $request->title;
        if($request->file('image')){
            $data->image= $request->file('image')->store('public/images');
        }
        $data->save();
        return redirect()->route('admin.image.index', ['pid'=>$pid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid, $id)
    {
        //
        $data = Image::find($id);
        if(Storage::exists($data->image) && $data->image){
            Storage::delete($data->image);
            //DB::statement("UPDATE `advertisements` SET `image` = NULL WHERE `advertisements`.`id` = ".$data->id.";");
            /*
            DB::table('advertisements')->where('id', $data->id)->update([
                'image' => null
            ]); 
            */
            
        }
        $data->delete();

        return redirect()->route('admin.image.index', ['pid'=>$pid]);
    }
}
