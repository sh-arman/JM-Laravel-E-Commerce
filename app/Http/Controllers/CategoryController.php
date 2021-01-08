<?php
namespace App\Http\Controllers;

use Session;
use App\Category;
use File;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $main_category = Category::orderBy('title','desc')->where('parent_id', NULL)->get();
        $category = Category::orderBy('title','desc')->get();
        return view('admin.category.category')->with('main_category', $main_category)
                                              ->with('category', $category);
    }

    public function create(){
        return view('admin.category.create');
    }


    public function store(Request $request){
        $this->validate($request,[
          'title'=> 'required|max:155',
        ]);

        if($request->hasFile('image')) {
          $image = $request->image;
          $image_new_name = time().$image->getClientOriginalName();
          $image->move('upload/category/',$image_new_name);

          Category::create([
            'title'=> $request['title'],
            'parent_id'=> $request['parent_id'],
            'image'=> 'upload/category/'.$image_new_name,
            'description'=> $request['description']
          ]);
        }else{
          Category::create([
            'title'=> $request['title'],
            'parent_id'=> $request['parent_id'],
            'description'=> $request['description']
            ]);
        }


        Session::flash('success','Category Succesfully Created');
        return back();
    }


    public function edit($id){
        $main_category = Category::orderBy('title','desc')->where('parent_id', NULL)->get();
        $category = Category::findOrFail($id);
        return view('admin.category.edit')->with('main_category', $main_category)
                                          ->with('category', $category);
    }


    public function update(Request $request, $id){
      $this->validate($request,[
        'title'=> 'required|max:155',
      ]);

      $category = Category::findOrFail($id);

      if($request->hasFile('image')){
        if(!is_null('image')){
          $image_new_path = public_path().'/'.$category->image;
          // unlink($image_new_path);
          File::delete( $image_new_path );
        }
        $image = $request->image;
        $image_new_name = time().'-'.$image->getClientOriginalName();
        $image->move('upload/category/', $image_new_name);
        $category->image = 'upload/category/'. $image_new_name;
      }

      $category->title = $request->title;
      $category->parent_id = $request->parent_id;
      $category->description = $request->description;
      $category->save();
      Session::flash('success','Category Succesfully Updated');
      return redirect()->route('admin.category');

    }


    public function delete($id){
        $category = Category::findOrFail($id);

        if($category->parent_id == NULL){
          // delete sub Categories
          $sub_categories = Category::orderBy('title','desc')->where('parent_id' , $category->id)->get();
          foreach ($sub_categories as $sub) {
            if(!is_null('image')){
              $image_new_path = public_path().'/'.$sub->image;
              File::delete( $image_new_path );
            }
            $sub->delete();
          }
        }
        if(!is_null('image')){
          $image_new_path = public_path().'/'.$category->image;
          File::delete( $image_new_path );
        }
        $category->delete();
        Session::flash('error','Category Succesfully Deleted');
        return back();
    }
}
