<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\PCategory;
use App\Product;

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
          'ParentCategory' => $c_id,
          'UnitType' => $request->input('cate-type')
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
      if($temp->Type=='Category'){
        $temp->UnitType = $request->input('cate-type');
      }
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

  public function prodcateload()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = PCategory::paginate(10);
      return view('modules/product/admin/list-prodcate', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function addprodcateload()
  {
    if(\Cookie::get('ajanlogin')){
      return view('modules/product/admin/addprodcate');
    }
    else return redirect('/ajan');
  }

  public function editprodcateload($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = PCategory::where('id', $c_id)->first();
      return view('modules/product/admin/editprodcate', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function delprodcate($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      PCategory::where('id', $c_id)->delete();
      return redirect('/ajan/prodcate');
    }
    else return redirect('/ajan');
  }

  public function addprodcatepost(Request $request)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, [
        'prca-title' => 'required|max:250',
        'prca-name' => 'required|max:250',
        'prca-values' => 'required|max:250'
        ]);
      $ctitle = $request->input('prca-title');
      $cname = $request->input('prca-name');
      $cvalues = $request->input('prca-values');

      $pagevalues = PCategory::create([
        'Title' => $ctitle,
        'UnitName' => $cname,
        'UnitList' => $cvalues
      ]);
      return redirect('/ajan/prodcate');
    }
    else return redirect('/ajan');
  }

  public function editprodcatepost(Request $request, $c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, [
        'prca-title' => 'required|max:250',
        'prca-name' => 'required|max:250',
        'prca-values' => 'required|max:250'
        ]);
      $ctitle = $request->input('prca-title');
      $cname = $request->input('prca-name');
      $cvalues = $request->input('prca-values');

      $temp = PCategory::where('id',$c_id)->first();
      $temp->Title = $ctitle;
      $temp->UnitName = $cname;
      $temp->UnitList = $cvalues;
      $temp->save();
      return redirect('/ajan/prodcate');
    }
    else return redirect('/ajan');
  }

  public function productsload()
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = PCategory::paginate(10);
      return view('modules/product/admin/list-productmain', ['pagevalues' => $pagevalues]);
    }
    else return redirect('/ajan');
  }

  public function productlist($c_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Product::paginate(10);
      return view('modules/product/admin/list-products', ['pagevalues' => $pagevalues, 'c_id'=>$c_id]);
    }
    else return redirect('/ajan');
  }

  public function addproductload()
  {
    if(\Cookie::get('ajanlogin')){
      return view('modules/product/admin/addproduct');
    }
    else return redirect('/ajan');
  }

  public function addproductpost(Request $request)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, [
        'prod-title' => 'required|max:250',
        'prod-price' => 'required',
        'prod-filepath' => 'required'
        ]);

      $title = $request->input('prod-title');
      $price = $request->input('prod-price');
      $excha = $request->input('prod-exchange');
      $pdesc = $request->input('prod-desc');
      $fpath = $request->file('prod-filepath')->getClientOriginalName();

      $catetext="";
      $cd_id = 0; $cd_text="";
      foreach (Category::all()->where('Type', 'Header') as $cate) {
        $catetemp = $request->input('radio'.$cate->id);
        if($catetemp != '0'){
          if($catetext=="") $catetext = $catetemp;
          else $catetext .= ",".$catetemp;
          $scate =Category::all()->where('id', $catetemp)->first();
          if($cd_text == "" && $scate->UnitType != 0){
            $cd_id = (int)$catetemp;
            $cd_text = '{"'.str_replace(',','":-1,"', PCategory::where('id',$scate->UnitType)->first()->UnitList).'":-1}';
          }
        }
      }
      if($catetext=="") return back()->with('error','Ürün için en az 1 kategori tanımlanmalıdır.');

      \App\Product::create([
        'Title'=>$title,
        'Categories'=>$catetext,
        'Desc'=> ''.$pdesc,
        'Price'=>$price,
        'PriceExchange'=>$excha,
        'DetailID'=>$cd_id,
        'Stock'=> $cd_text
      ]);

      // TODO: eklediği ürüne stok girme penceresini aç
      return redirect('/ajan/products');
    }
    else return redirect('/ajan');
  }
}
