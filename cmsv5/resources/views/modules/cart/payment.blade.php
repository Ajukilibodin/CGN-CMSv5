<div class="col-md-12">
  <div class="table-responsive">
    <h4>ÖDEME İŞLEMİ</h4>
    <table class="table cart">
      <tbody>
        @php($cart_total = 0)
        @foreach(json_decode(\Cookie::get('customercart')) as $cart_item)
        @php ($c_prod = \App\Product::where('id',$cart_item->p_id)->get()->first())
        @php( ($cart_total += ($c_prod->Price - ($c_prod->Price/100*$c_prod->Discount)) * $cart_item->count) )
        @endforeach
          <tr class="cart_item">
              <td class="notopborder cart-product-name">
                  <strong>Ürünler Toplamı:</strong>
              </td>
              <td class="notopborder cart-product-name">
                  <span class="amount">{{$cart_total}} &#8378;</span>
              </td>
          </tr>
          <tr class="cart_item">
              <td class="cart-product-name">
                  <strong>Kargo:</strong>
              </td>
              <td class="cart-product-name">
                  <span class="amount">Ücretsiz Kargo</span>
              </td>
          </tr>
          <tr class="cart_item">
              <td class="cart-product-name">
                  <strong>Toplam:</strong>
              </td>
              <td class="cart-product-name">
                  <span class="amount color lead"><strong>{{$cart_total}} &#8378;</strong></span>
              </td>
          </tr>
      </tbody>
    </table>
  </div>

  <div class="accordion clearfix">
    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Kredi Kartı </div>
    <div class="acc_content clearfix">
      @include('modules.cart.credit-card-form')
      <button type="submit" onclick="setPayment(3)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>
    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Banka Transferi</div>
    <div class="acc_content clearfix">
      <h5>Banka Hesap Bilgileri</h5>
      <p>
          Garanti Bankası</br>
          Şube Kodu: Marmara Ticari - 1605</br>
          Hesap Numarası: 6299758</br>
          IBAN NO : TR04 0006 2001 6050 0006 2997 58
      </p>
      <button type="submit" onclick="setPayment(2)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>

    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Kapıda Ödeme</div>
    <div class="acc_content clearfix">
        <p>Kapıda ödeme seçenekli alışverişleriniz de adres bilgilerinizi ve telefon bilgilerinizi eksiksiz girmeniz gerekmektedir. Telefon ile müşteri temsilcilerimiz tarafından gün içerisinde teyid alınmaktadır. Telefon bilgileri eksik yanlış
            veya farklı girilmesi dahilinde siparişiniz iptal edilerek gönderilmeyecektir.</p>
            <button type="submit" onclick="setPayment(1)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>
  </div>
  <form class="" action="/checkoutback" method="post">
      @csrf
      <button type="submit" class="button button-3d fright"> << SEPETE DÖN</button>
  </form>
  <input type="text" id="paymenttype" name="paymenttype" value="0" hidden>
</div>
<script type="text/javascript">
  function setPayment(num) {
    document.getElementById("paymenttype").value = num;
  }
</script>
