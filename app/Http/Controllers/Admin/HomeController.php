<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Home::find(1);

        return view('admin.home.index', [
            'data' => $data
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Home::find($id);
        return view('admin.home.edit',[
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        $data = Home::find(1);
        
        // Banner Bölümünün Kaydı
        $data->main_title = $request->main_title;
        $data->main_sub_title = $request->main_sub_title;
        $data->main_summary = $request->main_summary;
        if($request->file('banner_image')){
            $data->banner_image = $request->file('banner_image')->store('public/images');
        }
        // ----------------------------------Sub Banner Kaydı ------------------------------------- \\
        
        //Sub Banner Kaydı 1
        if($request->file('sub_banner_img1')){
            $data->sub_banner_img1 = $request->file('sub_banner_img1')->store('public/images');
        }
        $data->sub_banner_img1_title = $request->sub_banner_img1_title;
        $data->sub_banner_img1_sub_title = $request->sub_banner_img1_sub_title;
        $data->sub_banner_img1_btn_title = $request->sub_banner_img1_btn_title;
        
        //Sub Banner Kaydı 2
        if($request->file('sub_banner_img2')){
            $data->sub_banner_img2 = $request->file('sub_banner_img2')->store('public/images');
        }
        $data->sub_banner_img2_title = $request->sub_banner_img2_title;
        $data->sub_banner_img2_sub_title = $request->sub_banner_img2_sub_title;
        $data->sub_banner_img2_btn_title = $request->sub_banner_img2_btn_title;
        
        //Sub Banner Kaydı 3
        if($request->file('sub_banner_img3')){
            $data->sub_banner_img3 = $request->file('sub_banner_img3')->store('public/images');
        }
        $data->sub_banner_img3_title = $request->sub_banner_img3_title;
        $data->sub_banner_img3_sub_title = $request->sub_banner_img3_sub_title;
        $data->sub_banner_img3_btn_title = $request->sub_banner_img3_btn_title;

        // ---------------------------------------------------------------------------------- \\
        
        //İkinci bölümün kaydı
        $data->second_title1 = $request->second_title1;
        $data->second_title2 = $request->second_title2;
        $data->second_title3 = $request->second_title3;
        $data->second_title4 = $request->second_title4;

        // ---------------------------------------------------------------------------------- \\

        // Üçüncü Bölümün Kaydı

        $data->third_title1 = $request->third_title1;
        $data->third_explanation1 = $request->third_explanation1;
        if($request->file('third_image1')){
            $data->third_image1 = $request->file('third_image1')->store('public/images');
        }

        $data->third_title2 = $request->third_title2;
        $data->third_explanation2 = $request->third_explanation2;
        if($request->file('third_image2')){
            $data->third_image1 = $request->file('third_image2')->store('public/images');
        }
        $data->third_title3 = $request->third_title3;
        $data->third_explanation3 = $request->third_explanation3;
        if($request->file('third_image3')){
            $data->third_image1 = $request->file('third_image3')->store('public/images');
        }
        $data->third_title4 = $request->third_title4;
        $data->third_explanation4 = $request->third_explanation4;
        if($request->file('third_image4')){
            $data->third_image1 = $request->file('third_image4')->store('public/images');
        }
        // ---------------------------------------------------------------------------------- \\
        $data->save();
        return redirect(route('admin.home.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
