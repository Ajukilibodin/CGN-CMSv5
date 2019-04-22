<div class="col-12 table-responsive">
  <h4>Siparişlerim</h4>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Takip Tipi</th>
        <th scope="col">Ürün</th>
        <th scope="col">Tipi</th>
        <th scope="col">Fiyat</th>
        <th scope="col">İşlem</th>
      </tr>
    </thead>
    <tbody>
      @if( $customer_values->WishList != null )
        @foreach ( json_decode($customer_values->WishList) as $wishlist)
        <tr>
          <th scope="row">
            @switch($wishlist->act)
            @case('1') {!!'<label class="bg-danger">Favori</label>'!!} @break
            @case('2') {!!'<label class="bg-info">İndirim Alarmı</label>'!!} @break
            @case('3') {!!'<label class="bg-primary">Stok Takibi</label>'!!} @break
            @endswitch
          </th>
          @php($prod = \App\Product::find($wishlist->prod))
          <td><a href="{{url('/product/'.$prod->id )}}">{{ $prod->Title }}</a></td>
          <td>{{ $wishlist->stok }}</td>
          <td>{{ $prod->Price - ($prod->Price/100 * $prod->Discount) }}&#8378;</td>
          <td>{{ '***' }}</td>
          <?php // TODO: takipten çıkma işlemi ?>
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
