<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * getPaternsTree denilen fonksiyon, kategrolerin parent_id leri ile ilişkili olan bütün kategorileri
     * bir ağaç düzenine sokar.
     */
    protected $appends =[
        'getParentsTree'
     ];

     public static function getParentsTree($category, $title){
        if($category->parent_id == 0)
        {
            return $title;
        }

        $parent = Category::find($category->parent_id);
        $title = $parent->title.' > '.$title;
        return CategoryController::getParentsTree($parent,$title);

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        /**
         * view sayfasına $data değişkeni üzerinden çektiğimiz verileri göndermek için aşağıdaki gibi göndendermeliyiz... 
         */
        $data = Category::all();
        return view('admin.category.index',[
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
        /**
         * view sayfasına $data değişkeni üzerinden çektiğimiz verileri göndermek için aşağıdaki gibi göndendermeliyiz... 
         */
        $data = Category::all();
        return view('admin.category.create',[
            'data' => $data
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
        $data = new Category();
        $data->parent_id = $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        /**
         * Burada kategorinin resmini upload ederken resmi hash olarak storage'daki public'in içindeki images'a kaydediyoruz.
         * Ben ilk yaptığımda images oluşturulmamıştı elimle oluşturdum...
         */
        if($request->file('image')){
            $data->image= $request->file('image')->store('public/images');
        }
        if (isset($request->status)) {
            $data->status = $request->status;
        }
         
        $data->save();
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $id)
    {
        $data = Category::find($id);
        return view('admin.category.show',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $data = Category::find($id);
        $database = Category::all();
        return view('admin.category.edit',[
            'data' => $data,
            'database' => $database
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = Category::find($request->id);

        $data->parent_id = $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        /**
         * Burada kategorinin resmini upload ederken resmi hash olarak storage'daki public'in içindeki images'a kaydediyoruz.
         * Ben ilk yaptığımda images oluşturulmamıştı elimle oluşturdum...
         */
        if($request->file('image')){
            $data->image= $request->file('image')->store('public/images');
        }
        if (isset($request->status)) {
            $data->status = $request->status;
        }
        
        $data->save();

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        //
        $data = Category::find($request->id);
        
        /**
         * Kategorileri silerken dikkatli olmamız gerekiyor.
         * Çünkü, bir kategori alt ve üst kategorilere sahip olabilir.
         * Silerken sorgu yapmamız gerekecek!
         */

        if(isset($data->image)){
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect('admin/category');
    }
    
    public static function destroyImage(Request $request, Category $category){
        
        $data = Category::find($request->id);
        if(isset($data->image)){
            Storage::delete($data->image);
        }
        return redirect('admin/category');

    }

}
