<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Slider extends Controller
{
  public function mainload()
  {
      if(\Cookie::get('ajanlogin')){
        $sliders = \App\Slider::paginate(12);
        return view('modules/slider/admin/sliderlist', ['sliders' => $sliders]);
      }
      else return view('admin/login');
  }

  public function addload()
  {
      if(\Cookie::get('ajanlogin')){
        return view('modules/slider/admin/addslider');
      }
      else return view('admin/login');
  }

  public function addpost(Request $request)
  {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, ['slider-title' => 'required|max:100']);

        $title = $request->input('slider-title');
        $btitle = $request->input('slider-bigtitle');
        $subtext = $request->input('slider-subtext');
        $buttontext = $request->input('slider-buttontext');
        $buttonlink = $request->input('slider-buttonlink');
        $filepath = $request->file('slider-filepath')->getClientOriginalName();
        $picpath = $request->file('slider-picpath')->getClientOriginalName();

        $slide = new \App\Slider;

        $slide->Title = $title;
        $slide->BigTitle = $btitle;
        $slide->SubText = $subtext;
        $slide->ButtonText = $buttontext;
        $slide->ButtonLink = $buttonlink;
        $slide->save();

        //return $request;
        $file1 = ($slide->id).(substr($filepath, strrpos($filepath,'.')));
        $file2 = ($slide->id)."-1".(substr($picpath, strrpos($picpath,'.')));
        $request->file('slider-filepath')->storeAs('modules/slider', $file1, 'public_uploads');
        $request->file('slider-picpath')->storeAs('modules/slider', $file2, 'public_uploads');

        $slide->FilePath = $file1;
        $slide->PicPath = $file2;
        $slide->save();


        return redirect('/ajan/slidersettings')->with('successmsg', 'Yeni slider oluşturulmuştur.');
      }
      else return view('admin/login');
  }

  public function delslider($s_id)
  {
    if(\Cookie::get('ajanlogin')){
      $temp = \App\Slider::where('id',$s_id);
      if($temp->count() <= 0 ) redirect('/ajan/slidersettings');
      else $temp = $temp->first();
      \Storage::disk('public_uploads')->delete('modules/slider/'.$temp->FilePath);
      \Storage::disk('public_uploads')->delete('modules/slider/'.$temp->PicPath);
      \App\Slider::destroy($s_id);
      return redirect('/ajan/slidersettings');
    }
    else return view('admin/login');
  }
}
