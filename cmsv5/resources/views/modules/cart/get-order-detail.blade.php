<div class="col_full nobottommargin">
	<h3>SİPARİŞ DETAYI</h3>
<table class="table table-hover">
<tbody>
<tr>
<td>Sipariş Numarası :</td>
<td>SIP0{{ sprintf("%09d", $temp_order->id) }}</td>
</tr>
<tr>
	<td>Ürün Bilgisi: </td>
	<td>
	@foreach( json_decode($temp_order->Cart) as $cart_item )
	@php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
	 {{$c_prod->Title}} - {{$cart_item->type}} (x{{$cart_item->count}})<br>
	@endforeach
</td>
</tr>
<tr>
<td>Sipariş Tarihi :</td>
<td>{{$temp_order->created_at}}</td>
</tr>
<tr>
<td>Siparişin Durumu :</td>
@if($temp_order->OrderState=='W_Confirm')
<td>Müşteri Siparişini Vermesi Bekleniyor</td>
@elseif($temp_order->OrderState=='W_Pay')
<td>Ödemenin Ulaşması Bekleniyor</td>
@elseif($temp_order->OrderState=='W_Ship')
<td>Kargolama Bekleniyor</td>
@elseif($temp_order->OrderState=='W_Arrive')
<td>Kargonun Müşteriye Ulaşması Bekleniyor</td>
@elseif($temp_order->OrderState=='Done')
<td>Sipariş Müşteriye Teslim Edildi</td>
@else
<td>*Sistem Hatası*</td>
@endif
</tr>
@if($temp_order->CargoName)
<tr>
<td>Kargo Firması: </td>
<td>{{$temp_order->CargoName}}</td>
</tr>
@endif
@if($temp_order->CargoFollow)
<tr>
<td>Kargo Takip No: </td>
<td>{{$temp_order->CargoFollow}}</td>
</tr>
@endif
<tr>
<td>Sevk Adresi: </td>
<td>{{\App\Admin\SiteValues::find(6)->Value}}<br>
{{\App\Admin\SiteValues::find(7)->Value}}</td>
</tr>
<tr>
	<td>Teslim Adresi: </td>
	<td>{!! $temp_order->Address !!}<br>{{$temp_order->State}}</td>
</tr>
</tbody>
</table>
</div>
