<div class="col-12 table-responsive">
  <h4>Siparişlerim</h4>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sipariş Tarihi</th>
        <th scope="col">Sipariş Numarası</th>
        <th scope="col">Sipariş Tipi</th>
        <th scope="col">Sipariş Durumu</th>
        <th scope="col">Son Güncelleme</th>
        <th scope="col">Sepet</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customer_values->Orders as $customer_order)
      <tr>
        <td>{{ $customer_order->created_at }}</td>
        <th scope="row">SIP0{{ sprintf("%09d", $customer_order->id) }}</th>
        <td>{{ $customer_order->OrderType }}</td>
        <td>
          @switch($customer_order->OrderState)
          @case('W_Confirm') {!!'<label class="bg-danger">Sipariş Vermeyi Bekliyor</label>'!!} @break
          @case('W_Pay') {!!'<label class="bg-info">Ödeme Bekliyor</label>'!!} @break
          @case('W_Ship') {!!'<label class="bg-warning">Kargolanacak</label>'!!} @break
          @case('W_Arrive') {!!'<label class="bg-info">Kargoda</label>'!!} @break
          @case('Done') {!!'<label class="bg-success">Teslim Edildi</label>'!!} @break
          @endswitch
        </td>
        <td>{{ $customer_order->updated_at }}</td>
        <td> <a href="javascript:;" onclick="seecart({{$customer_order->id}})"><i class="icon-shopping-cart"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div id="modaldiv"></div>
