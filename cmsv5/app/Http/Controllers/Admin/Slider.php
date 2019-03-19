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
      else return redirect('/ajan');
  }

  public function addload()
  {
      if(\Cookie::get('ajanlogin')){
        return view('modules/slider/admin/addslider');
      }
      else return redirect('/ajan');
  }

  public function addpost(Request $request)
  {
      if(\Cookie::get('ajanlogin')){
        $this->validate($request, [
          'slider-title' => 'required|max:250',
          'slider-bigtitle' => 'required|max:250',
          'slider-subtext' => 'required|max:250',
          'slider-buttontext' => 'required|max:250',
          'slider-filepath' => 'required'
        ]);

        $title = $request->input('slider-title');
        $btitle = $request->input('slider-bigtitle');
        $subtext = $request->input('slider-subtext');
        $buttontext = $request->input('slider-buttontext');
        $buttonlink = $request->input('slider-buttonlink');
        if($request->hasFile('slider-filepath'))
        $filepath = $request->file('slider-filepath')->getClientOriginalName();
        if($request->hasFile('slider-picpath'))
        $picpath = $request->file('slider-picpath')->getClientOriginalName();

        $slide = new \App\Slider;

        $slide->Title = $title;
        $slide->BigTitle = $btitle;
        $slide->SubText = $subtext;
        $slide->ButtonText = $buttontext;
        $slide->ButtonLink = $buttonlink;
        $slide->save();

        //return $request;
        if($request->hasFile('slider-filepath'))
        $file1 = ($slide->id).(substr($filepath, strrpos($filepath,'.')));
        if($request->hasFile('slider-picpath'))
        $file2 = ($slide->id)."-1".(substr($picpath, strrpos($picpath,'.')));

        if($request->hasFile('slider-filepath'))
        $request->file('slider-filepath')->storeAs('modules/slider', $file1, 'public_uploads');
        if($request->hasFile('slider-picpath'))
        $request->file('slider-picpath')->storeAs('modules/slider', $file2, 'public_uploads');

        if($request->hasFile('slider-filepath'))
        $slide->FilePath = $file1;
        if($request->hasFile('slider-picpath'))
        $slide->PicPath = $file2;
        $slide->save();


        return redirect('/ajan/slidersettings')->with('successmsg', 'Yeni slider oluşturulmuştur.');
      }
      else return redirect('/ajan');
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
    else return redirect('/ajan');
  }
}
