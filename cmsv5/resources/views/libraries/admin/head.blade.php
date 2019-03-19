<meta charset="utf-8">
@php($_SITEVALUES = \App\Admin\SiteValues::all())
<title>{{$_SITEVALUES[1]->Value}} - AdminPanel</title>

@include('libraries.head.favicons')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="/css/app.css">
