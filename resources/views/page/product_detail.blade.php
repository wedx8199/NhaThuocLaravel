@extends('master')
@section('content')
<style>



		.zoom-area
		{
			width: 280px;
			
			position: relative;
			cursor: none
		}
		/* for create magnify glass */
		.large
		{
			width: 175px;
			height: 175px;
			position: absolute;
			border-radius: 100%;
		
			/* for box shadow for glass effect */
			box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 
			0 0 7px 7px rgba(0, 0, 0, 0.25), 
			inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
			
			/*for hide the glass by default*/
			display: none;
		}
		.small
		{
			display: block;
		}
</style>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$product->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <a href="{{route('category',$product->id_type)}}" >{{$category_name->name}}</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">

<!-- Created by Rohan Hapani -->
<div class="zoom-area">
		
		<!-- It's container of the magnify glass -->
		<div class="large"></div>
		
		<!-- It's for the small image -->
		<img class="small" src="source/image/product/{{$product->image}}" width="300" height="300" style="border: 1px inset #16a085" />
		
</div>
<br>
<p>Alo</p>


							<!-- <img src="source/image/product/{{$product->image}}" alt=""> -->
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-weight: bold; text-transform: uppercase">{{$product->name}}</p>
								<div class="space20">&nbsp;</div>
								<p class="single-item-price">
									Giá:
												@if($product->promotion_price != 0)

												<span class="flash-del">{{number_format($product->unit_price)}}</span>
												<span class="flash-sale" style="font-weight: bold">{{number_format($product->promotion_price)}}</span> VNĐ
												<p style="font-size:130%;color:#18a085;"><i>(Bạn đã tiết kiệm được {{number_format($product->unit_price - $product->promotion_price)}}đ)</i></p>
												@else
												<span class="flash-sale" style="font-weight: bold">{{number_format($product->unit_price)}}</span> VNĐ

												@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>


							<div class="space20">&nbsp;</div>
@if($product->quantity > 0)
							<p>Số lượng:</p>
						<form id="myform" method="POST" action="{{route('muahang',$product->id)}}">
							@csrf
							<div class="single-item-options">
<!-- 								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select> -->
								<select class="wc-select" name="soluong">
									
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
<!-- 								<a class="add-to-cart" href="{{route('muahang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a> -->
								<a class="add-to-cart" href="javascript:document.getElementById('myform').submit();"><i class="fa fa-shopping-cart"></i></a>
								
								<div class="clearfix"></div>

							</div>
						</form>
@else
						<h6 class="inner-title">Hết hàng</h6>
@endif


						<div class="space20">&nbsp;</div>
						<p class="single-item-title">(Còn {{$product->quantity}} sản phẩm)</p>
						<div class="space20">&nbsp;</div>
							<div class="fb-share-button" data-href="http://localhost/MyLaravel/public/product_detail/{{$product->id}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FMyLaravel%2Fpublic%2Fproduct_detail%2F{{$product->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description" style="font-weight: bold">Mô tả sản phẩm</a></li>
							<li><a href="#tab-reviews" style="font-weight: bold">Bình luận</a></li>
						</ul>

						<div class="panel" id="tab-description">
							@if($product->id_country != '')
							<p>Xuất xứ: {{$product->country->name}}</p>
							@else
							@endif
							<p>{!! nl2br(e($product->description)) !!}</p>
							<br>
@if($product->youtube != "")
<?php
function get_youtube_id_from_url($url)  {
     preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
}


$a = get_youtube_id_from_url($product->youtube);
      // or                   http://youtu.be/GvJehZx3eQ1 
      // or                   http://www.youtube.com/embed/GvJehZx3eQ1
      // or                   http://www.youtu.be/GvJehZx3eQ1/blabla?xyz
?>
<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$a}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@else
@endif
						</div>
						<div class="panel" id="tab-reviews">
							<div class="fb-comments" data-href="http://localhost/MyLaravel/public/product_detail/{{$product->id}}" data-numposts="20" data-width=""></div>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4 style="font-weight: bold; color: darkcyan">Sản Phẩm Liên Quan</h4>

						<div class="row">
							@foreach($product_related as $related)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('product_detail',$related->id)}}"><img src="source/image/product/{{$related->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$related->name}}</p>
										<p class="single-item-price">
												@if($related->promotion_price != 0)

												<span class="flash-del">{{number_format($related->unit_price)}}</span>
												<span class="flash-sale" style="font-weight: bold">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale" style="font-weight: bold">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('addsp',$related->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('product_detail',$related->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
@foreach($top_product as $top)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('product_detail',$top->id)}}"><img src="source/image/product/{{$top->image}}" alt="" height="58px"></a>
									<div class="media-body">
										{{\Illuminate\Support\Str::limit($top->name, 17)}}
												@if($related->promotion_price != 0)

												<span class="beta-sales-price" style="font-weight: bold">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="beta-sales-price" style="font-weight: bold">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
									</div>
								</div>
@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('product_detail',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="58px"></a>
									<div class="media-body">
										{{\Illuminate\Support\Str::limit($new->name, 17)}}
												@if($related->promotion_price != 0)

												<span class="beta-sales-price" style="font-weight: bold">{{number_format($related->promotion_price)}}</span> VNĐ
												
												@else
												<span class="beta-sales-price" style="font-weight: bold">{{number_format($related->unit_price)}}</span> VNĐ

												@endif
									</div>
								</div>
@endforeach
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

   <script>
/* Created by Rohan Hapani */
$(document).ready(function()
		{
			var sub_width = 0;
			var sub_height = 0;
		 	$(".large").css("background","url('" + $(".small").attr("src") + "') no-repeat");

			$(".zoom-area").mousemove(function(e){
				if(!sub_width && !sub_height)
				{
					var image_object = new Image();
					image_object.src = $(".small").attr("src");
					sub_width = image_object.width;
					sub_height = image_object.height;
				}
				else
				{
					var magnify_position = $(this).offset();

					var mx = e.pageX - magnify_position.left;
					var my = e.pageY - magnify_position.top;
					
					if(mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0)
					{
						$(".large").fadeIn(100);
					}
					else
					{
						$(".large").fadeOut(100);
					}
					if($(".large").is(":visible"))
					{
						var rx = Math.round(mx/$(".small").width()*sub_width - $(".large").width()/2)*-1;
						var ry = Math.round(my/$(".small").height()*sub_height - $(".large").height()/2)*-1;

						var bgp = rx + "px " + ry + "px";
						
						var px = mx - $(".large").width()/2;
						var py = my - $(".large").height()/2;

						$(".large").css({left: px, top: py, backgroundPosition: bgp});
					}
				}
			})
		})
  </script>






@endsection