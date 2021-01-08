<?php
namespace App\Http\Controllers;

use Session;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
  public function index()
  {
      $brand = Brand::orderBy('created_at','desc')->get();
      return view('admin.brand.brand')->with('brand', $brand);
  }

  public function create()
  {
      return view('admin.brand.create');
  }

  public function store(Request $request)
  {
      $this->validate($request,[
        'title'=> 'required|max:155',
      ]);
      $image = $request->image;
      $image_new_name = time().$image->getClientOriginalName();
      $image->move('upload/brand/',$image_new_name);
      Brand::create([
        'title'=> $request['title'],
        'image'=> 'upload/brand/' . $image_new_name,
        'description'=> $request['description']
      ]);
      Session::flash('success','Brand Succesfully Created');
      return back();
  }

  public function edit($id)
  {
      $brand = Brand::findOrFail($id);
      return view('admin.brand.edit')->with('brand', $brand);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'title'=> 'required|max:155',
    ]);
    
    $brand = Brand::findOrFail($id);

    if($request->hasFile('image')){
      if(!is_null('image')){
        $image_new_path = public_path().'/'.$brand->image;
        unlink($image_new_path);
      }
        $image = $request->image;
        $image_new_name = time().'-'.$image->getClientOriginalName();
        $image->move('upload/brand/', $image_new_name);
        $brand->image = 'upload/brand/'. $image_new_name;
    }

    $brand->title = $request->title;
    $brand->description = $request->description;
    $brand->save();
    Session::flash('success','Brand Succesfully Updated');
    return redirect()->route('admin.brand');
  }

  public function delete($id)
  {
      $brand = Brand::findOrFail($id);
      $brand_image_path = public_path() .'/' . $brand->image;
      unlink($brand_image_path);
      $brand->delete();
      Session::flash('error','Brand Succesfully Deleted');
      return back();
  }
}
