<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
    <div class="panel-body">
        <div role="form" id="payment-form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="cardNumber">KART NUMARASI</label>
                        <div class="input-group">
                            <input type="tel" class="form-control" name="cardNumber" placeholder="GEÇERLİ KREDİ KARTI NUMARASI" autocomplete="cc-number" />
                            <span class="input-group-addon"><i class="acc-open icon-line2-credit-card"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-7 col-md-7">
                    <div class="form-group">
                        <label for="cardExpiry"><span class="hidden-xs">SON KULLANMA TARİHİ</span><span class="visible-xs-inline">EXP</span> DATE</label>
                        <input type="tel" class="form-control" name="cardExpiry" placeholder="AA / YY" autocomplete="cc-exp" />
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 pull-right">
                    <div class="form-group">
                        <label for="cardCVC">CV CODE</label>
                        <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="couponCode">KART ÜZERİNDEKİ İSİM</label>
                        <input type="text" class="form-control" name="cardHolder" />
                    </div>
                </div>
            </div>
            <!-- <div class="row">
<div class="col-xs-12">
<button class="btn btn-success btn-lg btn-block" type="submit">Start Subscription</button>
</div>
</div> -->
            <div class="row" style="display:none;">
                <div class="col-xs-12">
                    <p class="payment-errors"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CREDIT CARD FORM ENDS HERE -->
