<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ProductModule extends Controller
{
  public function categoryload()
  {
      if(\Cookie::get('ajanlogin')){
        $pagevalues = Category::where('Type', 2)->paginate(10);
        return view('modules/product/admin/list-categories', ['pagevalues' => $pagevalues]);
      }
      else return redirect('/ajan');
  }

  public function subcateload($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Category::where('ParentCategory', $c_id)->paginate(10);
      return view('modules/product/admin/list-subcategories', ['pagevalues' => $pagevalues, 'c_id' => $c_id]);
    }
    else return redirect('/ajan');
  }

  public function delcategory($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      Category::where('ParentCategory', $c_id)->delete();
      Category::destroy($c_id);
      return redirect('/ajan/categories');
    }
    else return redirect('/ajan');
  }

  public function delsubcategory($p_id, $c_id)
  {
    if(\Cookie::get('ajanlogin')){
      Category::destroy($c_id);
      return redirect('/ajan/categories/'.$p_id);
    }
    else return redirect('/ajan');
  }

  public function addcategory($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      return view('modules/product/admin/addcategory', ['c_id' => $c_id]);
    }
    else return redirect('/ajan');
  }

  public function addcategorypost(Request $request, $c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, ['cate-title' => 'required|max:250']);
      $ctitle = $request->input('cate-title');
      if($c_id==0){
        Category::create([
          'Title' => $ctitle,
          'Type' => 2
        ]);
        return redirect('/ajan/categories/');
      }
      else{
        Category::create([
          'Title' => $ctitle,
          'ParentCategory' => $c_id
        ]);
        return redirect('/ajan/categories/'.$c_id);
      }
    }
    else return redirect('/ajan');
  }

  public function editcategory($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      return view('modules/product/admin/editcategory', ['c_id' => $c_id]);
    }
    else return redirect('/ajan');
  }

  public function editcategorypost(Request $request, $c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, ['cate-title' => 'required|max:250']);
      $ctitle = $request->input('cate-title');
      $temp = Category::where('id',$c_id)->first();
      $temp->Title = $ctitle;
      $temp->save();
      if($c_id==0){
        return redirect('/ajan/categories/');
      }
      else{
        return redirect('/ajan/categories/'.$temp->ParentCategory);
      }
    }
    else return redirect('/ajan');
  }
}
