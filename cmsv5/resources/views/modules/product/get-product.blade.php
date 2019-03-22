<div class="single-product">

						<div class="product">

							<div class="col_two_fifth">

								<!-- Product Single - Gallery
								============================================= -->
			<div class="product-image">
				<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
					<div class="flexslider">
						<div class="slider-wrap" data-lightbox="gallery">
							@foreach(explode(',',$pagevalues->ImgPaths) as $p_pic)
							<div class="slide" data-thumb="/uploads/modules/product/{{$p_pic}}">
								<a href="/uploads/modules/product/{{$p_pic}}" title="" data-lightbox="gallery-item">
									<img src="/uploads/modules/product/{{$p_pic}}" alt="">
								</a>
							</div>@endforeach
						</div>
					</div>
				</div>
				@php($ribbontext = "")
				@if($pagevalues->Discount > 0)
				@if($ribbontext!="")@php($ribbontext.=", ")@endif
				@php($ribbontext.='<i class="icon-arrow-down"></i>'.$pagevalues->Discount.'%<i class="icon-arrow-down"></i>')
				@endif
				@if($pagevalues->Ribbons%4 >= 2)
				@if($ribbontext!="")@php($ribbontext.=", ")@endif
				@php($ribbontext.="Yeni")
				@endif
				@if($pagevalues->Ribbons%2 >= 1)
				@if($ribbontext!="")@php($ribbontext.=", ")@endif
				@php($ribbontext.="Öne Çıkan")
				@endif
				<div class="sale-flash">{!!$ribbontext!!}</div>
			</div><!-- Product Single - Gallery End -->

							</div>

							<div class="col_two_fifth product-desc">

								<!-- Product Single - Price
								============================================= -->
								@if($pagevalues->Discount > 0)
								<div class="product-price"><del>{{$pagevalues->Price}}&#8378;</del>
									<ins>{{ $pagevalues->Price - ($pagevalues->Price/100 * $pagevalues->Discount) }}&#8378;</ins></div>
								@else
								<div class="product-price"><ins>{{$pagevalues->Price}}&#8378;</ins></div>
								@endif

								<!-- Product Single - Rating
								<div class="product-rating">
										Stokta Var
								</div>-->
								<!-- Product Single - Rating End -->

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Quantity & Cart Button
								============================================= -->
								<div class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>

									<div class="quantity clearfix allmargin-xs">
										<input type="button" value="-" class="minus" onclick="chnVal(-1)">
										<input type="text" step="1" min="1" id="p_quantity" name="quantity" value="1" title="Qty" class="qty" size="4" />
										<input type="button" value="+" class="plus" onclick="chnVal(1)">
										<script type="text/javascript">
										function chnVal(num)
										{
											var value = parseInt(document.getElementById('p_quantity').value, 10);
											value+=num;
											if(value < 1) value = 1;
											document.getElementById('p_quantity').value = value;
										}
										</script>
									</div>


										<select class="select-hide form-control allmargin-xs" style="width:25%;">
											<?php
											$prodstok = json_decode($pagevalues->Stock);
											foreach ($prodstok as $key) {
												echo '<option value="'.$key->name.'" ';
												if($key->val==-1 || $key->val==0) echo 'disabled="disabled"';
												echo '>'.$key->name;
												if($key->val>-1) echo ' (Stok: '.$key->val.')';
												echo '</option>';
											}
											 ?>
										</select>


									<button type="submit" class="add-to-cart button allmargin-xs" onclick="sepetegit();">SEPETE EKLE</button>
								</form><!-- Product Single - Quantity & Cart Button End -->

								<div class="clear"></div>
								<div class="line"></div>

								<!-- Product Single - Short Description
								============================================= -->
								<p>{{$pagevalues->Desc}}</p>
								<!-- Product Single - Short Description End -->

								<!-- Product Single - Meta
								============================================= -->
								<div class="panel panel-default product-meta">
									<div class="panel-body">
										@if($pagevalues->Barcode)
										<span itemprop="productID" class="sku_wrapper">Barkod No: <span class="sku">{{$pagevalues->Barcode}}</span></span>
										@endif
										<span class="tagged_as">Kategoriler:
										@php($catetext = "")
										@foreach(explode(',', $pagevalues->Categories) as $scate)
										@php($temp_cate = \App\Category::where('id', $scate)->get()->first())
										@if($catetext == "")
										@php($catetext .= '<a href="'.url('/products/'.$scate).'" rel="tag">'.$temp_cate->Title.'</a>')
										@else
										@php($catetext .= ', <a href="'.url('/products/'.$scate).'" rel="tag">'.$temp_cate->Title.'</a>')
										@endif
										@endforeach
										{!! $catetext !!}
										</span>
									</div>
								</div><!-- Product Single - Meta End -->

								<!-- Product Single - Share
								============================================= -->
								<div class="si-share noborder clearfix">
									<span>Paylaş:</span>
									<div>
										<a href="#" class="social-icon si-borderless si-facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-pinterest">
											<i class="icon-pinterest"></i>
											<i class="icon-pinterest"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-gplus">
											<i class="icon-gplus"></i>
											<i class="icon-gplus"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-rss">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>
										<a href="#" class="social-icon si-borderless si-email3">
											<i class="icon-email3"></i>
											<i class="icon-email3"></i>
										</a>
									</div>
								</div><!-- Product Single - Share End -->

							</div>

							<div class="col_one_fifth col_last">

											<!-- <a href="#" title="Brand Logo" class="hidden-xs"><img class="image_fade" src="images/shop/brand.jpg" alt="Brand Logo" style="opacity: 1;"></a>

											<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

											<div class="feature-box fbox-plain fbox-dark fbox-small">
												<div class="fbox-icon">
													<i class="icon-thumbs-up2"></i>
												</div>
												<h3>100% Original</h3>
												<p class="notopmargin">We guarantee you the sale of Original Brands.</p>
											</div>

											<div class="feature-box fbox-plain fbox-dark fbox-small">
												<div class="fbox-icon">
													<i class="icon-credit-cards"></i>
												</div>
												<h3>Payment Options</h3>
												<p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
											</div>

											<div class="feature-box fbox-plain fbox-dark fbox-small">
												<div class="fbox-icon">
													<i class="icon-truck2"></i>
												</div>
												<h3>Free Shipping</h3>
												<p class="notopmargin">Free Delivery to 100+ Locations on orders above $40.</p>
											</div>

											<div class="feature-box fbox-plain fbox-dark fbox-small">
												<div class="fbox-icon">
													<i class="icon-undo"></i>
												</div>
												<h3>30-Days Returns</h3>
												<p class="notopmargin">Return or exchange items purchased within 30 days.</p>
											</div> -->

										</div>



						</div>

					</div>

					<div class="clear"></div><div class="line"></div>
