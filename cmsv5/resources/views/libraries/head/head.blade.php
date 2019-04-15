<!DOCTYPE html>
<html dir="ltr" lang="tr">
<head>

@include('libraries.head.meta')
@include('libraries.head.favicons')
@include('libraries.head.base-css')

@if(Request::is('/'))
<!---	******************************************* INDEX SPESIFIC SCRIPTS **********	-->
<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{url('/include/rs-plugin/css/settings.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('/include/rs-plugin/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/include/rs-plugin/css/navigation.css')}}">
<!-- VIDEO -->
<style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>
@endif
</head>
