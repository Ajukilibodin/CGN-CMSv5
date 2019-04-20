<div class="col_three_fourth col_last nobottommargin">
@php ($customer_values = \App\Customer::find(\Cookie::get('customerlogin')) )
<div id="snav-content1">
<h3>ÜYELİK BİLGİLERİM</h3>
@include("modules.profile.side-pages.get-member-info")
</div>

<div id="snav-content2">
<h3>ADRES BİLGİLERİM</h3>
@include("modules.profile.side-pages.get-member-address-info")
</div>

<div id="snav-content3">
<h3>SİPARİŞLERİM</h3>
@include("modules.profile.side-pages.get-member-orders")
</div>


<div id="snav-content4">
<h3>TAKİP LİSTEM</h3>
<h4>Bu panel şu an aktif değildir.</h4>
</div>

<div id="snav-content5">
<h3>MESAJLARIM</h3>
<h4>Bu panel şu an aktif değildir.</h4>
</div>

<div id="snav-content6">
<h3>ŞİFRE DEĞİŞTİRME</h3>
@include("modules.profile.side-pages.get-change-password")
</div>

<div id="snav-content7">
<h3>GÜVENLİ ÇIKIŞ</h3>
<a href="{{url('/logout')}}" class="button button-3d fright">GÜVENLİ ÇIKIŞ</a>
</div>

</div>
