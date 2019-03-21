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
      $this->validate($request, ['cate-title' => 'required|max:250','cate-filepath'=>'required']);
      $ctitle = $request->input('cate-title');
      $filepath = $request->file('cate-filepath')->getClientOriginalName();

      if($c_id==0){
        $_cate = new Category;
        $_cate->Title = $ctitle;
        $_cate->Type = 2;
        $_cate->save();

        $file = ($temp->id).(substr($filepath, strrpos($filepath,'.')));
        $request->file('cate-filepath')->storeAs('modules/category', $file, 'public_uploads');

        $_cate->ImgUrl = $file;
        $_cate->save();

        return redirect('/ajan/categories/');
      }
      else{
        $_cate = new Category;
        $_cate->Title = $ctitle;
        $_cate->ParentCategory = $c_id;
        $_cate->UnitType = $request->input('cate-type');
        $_cate->save();

        $file = ($temp->id).(substr($filepath, strrpos($filepath,'.')));
        $request->file('cate-filepath')->storeAs('modules/category', $file, 'public_uploads');

        $_cate->ImgUrl = $file;
        $_cate->save();

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

      if($request->hasFile('cate-filepath'))
      $filepath = $request->file('cate-filepath')->getClientOriginalName();

      $temp = Category::where('id',$c_id)->first();
      $temp->Title = $ctitle;
      if($temp->Type=='Category'){
        $temp->UnitType = $request->input('cate-type');
      }
      $temp->save();

      if($request->hasFile('cate-filepath')){
        $file = ($temp->id).(substr($filepath, strrpos($filepath,'.')));
        $request->file('cate-filepath')->storeAs('modules/category', $file, 'public_uploads');

        $temp->ImgUrl = $file;
        $temp->save();
      }

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

  public function editproductload($p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $pagevalues = Product::where('id', $p_id)->first();
      return view('modules/product/admin/editproduct', ['pagevalues' => $pagevalues, 'p_id'=>$p_id]);
    }
    else return redirect('/ajan');
  }

  public function editproductpost(Request $request, $p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, [
        'prod-title' => 'required|max:250',
        'prod-price' => 'required'
        ]);

      $title = $request->input('prod-title');
      $price = $request->input('prod-price');
      $excha = $request->input('prod-exchange');
      $pdesc = $request->input('prod-desc');
      $pbcod = $request->input('prod-barkod');
      if($request->hasFile('prod-filepath'))
      $fpath = $request->file('prod-filepath')->getClientOriginalName();

      $ribbon = 0;
      if($request->input('check1')) $ribbon+=1;
      if($request->input('check2')) $ribbon+=2;

      $catetext="";
      foreach (Category::where('Type', 'Header')->get() as $cate) {
        $catetemp = $request->input('radio'.$cate->id);
        if($catetemp != '0'){
          if($catetext=="") $catetext = $catetemp;
          else $catetext .= ",".$catetemp;
          $scate =Category::where('id', $catetemp)->get()->first();
        }
      }
      if($catetext=="") return back()->with('error','Ürün için en az 1 kategori tanımlanmalıdır.');

      $temp_product = Product::where('id',$p_id)->first();
      $temp_product->Title=$title;
      $temp_product->Categories=$catetext;
      $temp_product->Desc= ''.$pdesc;
      $temp_product->Price=$price;
      $temp_product->PriceExchange=$excha;
      $temp_product->Ribbons=$ribbon;
      $temp_product->Barcode=$pbcod;
      $temp_product->save();

      if($request->hasFile('prod-filepath')){
        $file = ($temp_product->id).(substr($fpath, strrpos($fpath,'.')));
        $request->file('prod-filepath')->storeAs('modules/product', $file, 'public_uploads');

        $temp_product->ImgPaths = $file;
        $temp_product->save();
      }

      return redirect('/ajan/products');
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
      $pbcod = $request->input('prod-barkod');
      $fpath = $request->file('prod-filepath')->getClientOriginalName();

      $ribbon = 0;
      if($request->input('check1')) $ribbon+=1;
      if($request->input('check2')) $ribbon+=2;

      $catetext="";
      $cd_id = 0; $cd_text="";
      foreach (Category::where('Type', 'Header')->get() as $cate) {
        $catetemp = $request->input('radio'.$cate->id);
        if($catetemp != '0'){
          if($catetext=="") $catetext = $catetemp;
          else $catetext .= ",".$catetemp;
          $scate =Category::where('id', $catetemp)->get()->first();
          if($cd_text == "" && $scate->UnitType != 0){
            $cd_id = (int)$catetemp;
            $cd_array = array();
            foreach (explode (',',PCategory::where('id',$scate->UnitType)->first()->UnitList) as $unitname) {
              array_push($cd_array , ['name'=>$unitname, 'val'=>-1]);
            }
            $cd_text = json_encode($cd_array);
          }
        }
      }
      if($catetext=="") return back()->with('error','Ürün için en az 1 kategori tanımlanmalıdır.');
      if($cd_text=="") return back()->with('error','Ürün için en az 1 özellikli kategori(*) tanımlanmalıdır.');

      $temp_product = new \App\Product;
      $temp_product->Title=$title;
      $temp_product->Categories=$catetext;
      $temp_product->Desc= ''.$pdesc;
      $temp_product->Price=$price;
      $temp_product->PriceExchange=$excha;
      $temp_product->DetailID=$cd_id;
      $temp_product->Stock= $cd_text;
      $temp_product->Ribbons=$ribbon;
      $temp_product->Barcode=$pbcod;
      $temp_product->save();

      $file = ($temp_product->id).(substr($fpath, strrpos($fpath,'.')));
      $request->file('prod-filepath')->storeAs('modules/product', $file, 'public_uploads');

      $temp_product->ImgPaths = $file;
      $temp_product->save();

      // TODO: eklediği ürüne stok girme penceresini aç
      return redirect('/ajan/products');
    }
    else return redirect('/ajan');
  }
  public function delproduct($c_id,$p_id)
  {
    if(\Cookie::get('ajanlogin')){
      Product::destroy($p_id);
      return redirect('/ajan/products/'.$c_id);
    }
    else return redirect('/ajan');
  }

  public function exchangesload()
  {
    if(\Cookie::get('ajanlogin')){
      $sitevalues = \App\Exchange::where('id','<>',1)->paginate(10);
      return view('modules/product/admin/editexchange', ['sitevalues' => $sitevalues]);
    }
    else return redirect('/ajan');
  }
  public function exchangespost(Request $request, $e_id)
  {
    if(\Cookie::get('ajanlogin')){
      $this->validate($request, ['sitevalue-input' => 'required']);
      $temp = \App\Exchange::where('id',$e_id)->first();
      $temp->Multipler = $request->input('sitevalue-input');
      $temp->save();
      return redirect('/ajan/exchanges')->with('successid', $e_id);
    }
    else return redirect('/ajan');
  }
  public function editstockload($p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $product = \App\Product::where('id',$p_id)->first();
      return view('modules/product/admin/editstock', ['product' => $product]);
    }
    else return redirect('/ajan');
  }
  public function editstockpost(Request $request, $action, $p_id)
  {
    if(\Cookie::get('ajanlogin')){
      $product = \App\Product::where('id',$p_id)->first();
      if($action==1){
        $stokTemp = json_decode($product->Stock);
        for ($i=0; $i <count($stokTemp) ; $i++) {
          $stokTemp[$i]->val = (int)( $request->input('stok-type-'.($i+1)) );
        }
        $product->Stock = json_encode($stokTemp);
        $product->save();
        return back()->with('a-success','Ürün stokları güncellendi.');
      }
      else{
        $product->Barcode = $request->input('stok-barkod');
        $product->StockAlarm = $request->input('stok-alarm');
        $product->save();
        return back()->with('a-success','Stok ayarları ürün için güncellendi.');
      }
    }
    else return redirect('/ajan');
  }
}
