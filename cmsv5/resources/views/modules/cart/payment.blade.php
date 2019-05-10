<div class="col-md-12">
  <div class="table-responsive">
    <h4>ÖDEME İŞLEMİ</h4>
    <table class="table cart">
      <tbody>
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
                  <input type="text" name="cart" value="{{$cart}}" hidden>
                  <input type="text" name="cart_total" value="{{$cart_total}}" hidden>
              </td>
          </tr>
      </tbody>
    </table>
  </div>

  <div class="accordion clearfix">
    <!-- ======================= BEGIN 3D Öde ============================= -->
    <!--
    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Kredi Kartı </div>
    <div class="acc_content clearfix">
      @ X include('modules.cart.credit-card-form')
      <button type="submit" onclick="setPayment(3)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>
    <!-- ======================= END 3D Öde ============================= -->
    <!-- ======================= BEGIN Banka Öde ============================= -->
    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Banka Transferi</div>
    <div class="acc_content clearfix">
      <h5>Banka Hesap Bilgileri</h5>
      <p>
          {{\App\Admin\SiteValues::find(10)->Value}}</br>
          Şube Kodu: {{\App\Admin\SiteValues::find(11)->Value}}</br>
          Hesap Numarası: {{\App\Admin\SiteValues::find(12)->Value}}</br>
          IBAN NO : {{\App\Admin\SiteValues::find(13)->Value}}
      </p>
      <button type="submit" onclick="setPayment(2)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>
    <!-- ======================= END Banka Öde ============================= -->
    <!-- ======================= BEGIN Kapıda Öde ============================= -->
    <!--
    <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Kapıda Ödeme</div>
    <div class="acc_content clearfix">
        <p>Kapıda ödeme seçenekli alışverişleriniz de adres bilgilerinizi ve telefon bilgilerinizi eksiksiz girmeniz gerekmektedir. Telefon ile müşteri temsilcilerimiz tarafından gün içerisinde teyid alınmaktadır. Telefon bilgileri eksik yanlış
            veya farklı girilmesi dahilinde siparişiniz iptal edilerek gönderilmeyecektir.</p>
            <button type="submit" onclick="setPayment(1)" class="button button-3d fright">ÖDEMEYİ GERÇEKLEŞTİR >> </a>
    </div>
    <!-- ======================= END Kapıda Öde ============================= -->
  </div>
  <form class="" action="{{url('/checkoutback')}}" method="post">
      @csrf
      <button type="submit" class="button button-3d fright"> << SEPETE DÖN</button>
  </form>
  <input type="text" id="paymenttype" name="paymenttype" value="0" hidden>
  <input type="text" name="t_id" value="{{$t_id}}" hidden>
  <input type="text" name="c_id" value="{{$c_id}}" hidden>
</div>
<script type="text/javascript">
  function setPayment(num) {
    document.getElementById("paymenttype").value = num;
  }
</script>
