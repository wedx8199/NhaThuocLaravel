@extends('master')
@section('content')
<style>
* {
  box-sizing: border-box;
}

.row1 {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column1 {
  flex: 50%;
  padding: 5px;
}







/* Pic shit */
body{
    margin-top:20px;
background:#f5f5f5;
}

.categories-card.card {
    border: none;
    box-shadow: none
}

.categories-card .card-img-overlay {
    display: flex
}

.categories-card .card-img-overlay>* {
    flex: 1
}

.categories-card h3 {
    margin-bottom: 5px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px
}

.categories-card .bg-white-opacity {
    text-align: center;
    padding: 20px 20px 18px 20px
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.bg-white-opacity {
    background-color: rgba(255,255,255,0.85);
}

.categories-02 {
    padding: 0;
    margin: 0;
}

.categories-02 li {
    display: inline-block;
    margin-right: 20px;
    font-size: 14px;
    font-weight: 600;
    opacity: .8;
    vertical-align: middle;
}

.categories-02 li a {
    color: rgba(0,0,0,0.85);
}

a, a:active, a:focus {
    color: #5e6973;
    text-decoration: none;
    transition-timing-function: ease-in-out;
    -ms-transition-timing-function: ease-in-out;
    -moz-transition-timing-function: ease-in-out;
    -webkit-transition-timing-function: ease-in-out;
    -o-transition-timing-function: ease-in-out;
    transition-duration: .2s;
    -ms-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -webkit-transition-duration: .2s;
    -o-transition-duration: .2s;
}

.card-img, .card-img-bottom {
    border-bottom-right-radius: calc(.25rem - 1px);
    border-bottom-left-radius: calc(.25rem - 1px);
}
.card-img, .card-img-top {
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}
.card-img, .card-img-bottom, .card-img-top {
    -ms-flex-negative: 0;
    flex-shrink: 0;
    width: 100%;
}

img {
    max-width: 100%;
    height: auto;
}











/*for customer review*/
body{
    margin-top:20px;
    background:#eee;
}
.team-card-style-1, .team-card-style-3, .team-card-style-5 {
  position: relative;
  max-width: 360px;
  text-align: center;
  background:#fff;
 box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
}
.team-contact-link {
  display: block;
  margin-top: 4px;
  transition: all 0.25s;
  font-size: 12px;
  font-weight: 700;
  text-decoration: none;
}
.team-contact-link > i {
  display: inline-block;
  font-size: 1.1em;
  vertical-align: middle;
}
.team-card-style-1 .team-position, .team-card-style-3 .team-position, .team-card-style-4 .team-position {
  display: block;
  margin-bottom: 8px;
  color: #8c8c8c;
  font-size: 12px;
  font-weight: 700;
  opacity: 0.6;
}
.team-card-style-3 .team-name, .team-card-style-4 .team-name, .team-card-style-5 .team-name {
  margin-bottom: 16px;
  font-size: 18px;
  font-weight: 600;
}
.team-thumb > img {
  display: block;
  width: 100%;
}
.team-card-style-1 {
  padding-bottom: 36px;
}
.team-card-style-1 > * {
  position: relative;
  z-index: 5;
}
.team-card-style-1::before {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  transition: all 0.3s 0.12s;
  content: '';
  opacity: 0;
}
.team-card-style-1 .team-card-inner {
  margin-bottom: 16px;
  padding-top: 48px;
  padding-right: 16px;
  padding-bottom: 20px;
  padding-left: 16px;
  background-color: #fff;
  box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
}
.team-card-style-1 .team-thumb {
  width: 108px;
  height: 108px;
  margin: auto;
  margin-bottom: 16px;
  border-radius: 50%;
  overflow: hidden;
}
.team-card-style-1 .team-social-bar {
  margin-top: 16px;
  margin-bottom: 8px;
  transform: scale(0.8);
}
.team-card-style-1 .team-contact-link {
  transition-delay: 0.12s;
  color: #8c8c8c;
  opacity: 0.6;
}
.team-card-style-1 .team-contact-link:hover {
  color: #8c8c8c;
  opacity: 1;
}
.team-card-style-1 .team-card-inner, .team-card-style-1 .team-thumb, .team-card-style-1 .team-social-bar {
  transition: all 0.3s 0.12s;
}
.team-card-style-1 .team-position, .team-card-style-1 .team-name {
  transition: color 0.3s 0.12s;
}
.team-card-style-1 .team-name {
  margin-bottom: 0;
  font-size: 20px;
  font-weight: bold;
}
.no-touchevents .team-card-style-1:hover::before {
  height: 100%;
  box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
  opacity: 1;
}
.no-touchevents .team-card-style-1:hover .team-card-inner {
  background-color: transparent;
  box-shadow: none;
}
.no-touchevents .team-card-style-1:hover .team-thumb {
  transform: scale(1.1);
}
.no-touchevents .team-card-style-1:hover .team-social-bar {
  transform: scale(1);
}
.no-touchevents .team-card-style-1:hover .team-contact-link, .no-touchevents .team-card-style-1:hover .team-position, .no-touchevents .team-card-style-1:hover .team-name {
  color: #fff;
}
.no-touchevents .team-card-style-1:hover .team-contact-link {
  opacity: 1;
}
.team-card-style-2 {
  position: relative;
}
.team-card-style-2 > img {
  display: block;
  width: 100%;
}
.team-card-style-2::before, .team-card-style-2::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: opacity 0.35s 0.12s;
  content: '';
  z-index: 1;
}
.team-card-style-2::before {
  background-color: rgba(0, 0, 0, .25);
}
.team-card-style-2::after {
  opacity: 0;
}
.team-card-style-2 .team-card-inner {
  position: absolute;
  top: 50%;
  width: 100%;
  padding: 20px;
  transform: translateY(-45%);
  transition: all 0.35s 0.12s;
  text-align: center;
  opacity: 0;
  z-index: 5;
}
.team-card-style-2 .team-name, .team-card-style-2 .team-position, .team-card-style-2 .team-contact-link {
  color: #fff;
}
.team-card-style-2 .team-name {
  margin-bottom: 5px;
  font-size: 20px;
  font-weight: bold;
}
.team-card-style-2 .team-position {
  display: block;
  margin-bottom: 16px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}
.team-card-style-2 .team-social-bar {
  margin-top: 16px;
  margin-bottom: 8px;
}
.team-card-style-2 .team-contact-link {
  opacity: 1;
}
.team-card-style-2:hover::before {
  opacity: 0;
}
.team-card-style-2:hover::after {
  opacity: 0.7;
}
.team-card-style-2:hover .team-card-inner {
  transform: translateY(-50%);
  opacity: 1;
}
.team-card-style-3, .team-card-style-4 {
  position: relative;
  padding-top: 30px;
  padding-right: 20px;
  padding-bottom: 38px;
  padding-left: 20px;
  transition: all 0.35s;
  border: 1px solid #e7e7e7;
}
.team-card-style-3 .team-thumb, .team-card-style-4 .team-thumb {
  width: 90px;
  margin: auto;
  margin-bottom: 17px;
}
.team-card-style-3 .team-position, .team-card-style-4 .team-position {
  margin-bottom: 0;
}
.team-card-style-3 .team-contact-link, .team-card-style-4 .team-contact-link {
  color: #404040;
  font-weight: 600;
}
.team-card-style-3 .team-contact-link > i, .team-card-style-4 .team-contact-link > i {
  color: #8c8c8c !important;
}
.team-card-style-3 .team-contact-link:hover, .team-card-style-4 .team-contact-link:hover {
  color: rgba(64, 64, 64, .6);
}
.team-card-style-3 .team-social-bar-wrap, .team-card-style-4 .team-social-bar-wrap {
  position: absolute;
  bottom: -18px;
  left: 0;
  width: 100%;
}
.team-card-style-3 .team-social-bar-wrap > .team-social-bar, .team-card-style-4 .team-social-bar-wrap > .team-social-bar {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.team-card-style-3:hover, .team-card-style-4:hover {
  border-color: transparent;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.team-card-style-4 {
  padding-top: 24px;
  padding-bottom: 31px;
  padding-left: 24px;
}
.team-card-style-4 .team-name {
  margin-bottom: 5px;
}
.team-card-style-4 .team-social-bar-wrap {
  position: relative;
  bottom: auto;
  left: auto;
  margin-top: 20px;
}
.team-card-style-4 .team-social-bar-wrap > .team-social-bar {
  margin: 0;
}
.team-card-style-5 {
  padding-bottom: 24px;
  transition: box-shadow 0.35s 0.12s;
}
.team-card-style-5 .team-thumb {
  position: relative;
  margin-bottom: 24px;
}
.team-card-style-5 .team-thumb::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: opacity 0.35s 0.12s;
  background-color: #ac32e4;
  content: '';
  opacity: 0;
  z-index: 1;
}
.team-card-style-5 .team-card-inner {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 16px;
  padding-bottom: 26px;
  transform: translateY(10px);
  transition: all 0.35s 0.12s;
  text-align: center;
  opacity: 0;
  z-index: 5;
}
.team-card-style-5 .team-contact-link, .team-card-style-5 .team-contact-link:hover {
  color: #fff;
}
.team-card-style-5 .sb-style-6.sb-light-skin, .team-card-style-5 .sb-style-7.sb-light-skin {
  border-color: rgba(255, 255, 255, .35);
}
.team-card-style-5 .team-name {
  margin-bottom: 6px;
  padding: 0 16px;
}
.team-card-style-5 .team-position {
  display: block;
  padding: 0 16px;
  transition: color 0.35s 0.12s;
}
.team-card-style-5:hover {
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.team-card-style-5:hover .team-thumb::after {
  opacity: 0.7;
}
.team-card-style-5:hover .team-card-inner {
  transform: translateY(0);
  opacity: 1;
}
.team-card-style-5:hover .team-position {
  color: #ac32e4;
}
.team-card-style-3 .team-social-bar-wrap>.team-social-bar, .team-card-style-4 .team-social-bar-wrap>.team-social-bar {
    display: table;
    margin: auto;
    background-color: #fff;
    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.11);
    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.11);
}
.social-btn {
    display: inline-block;
    width: 36px;
    height: 36px;
    margin: 0;
    -webkit-transition: all .3s;
    transition: all .3s;
    font-size: 18px;
    line-height: 36px;
    vertical-align: middle;
    text-align: center !important;
    text-decoration: none;
}
.sb-twitter {
    color: #55acee !important;
}
.sb-github {
    color: #4183c4 !important;
}
.sb-linkedin {
    color: #0976b4 !important;
}
.sb-skype {
    color: #00aff0 !important;
}
.sb-style-2, .sb-style-3, .sb-style-4, .sb-style-5 {
  margin-right: 10px;
  margin-bottom: 10px;
  border-radius: 50%;
  background-color: #f5f5f5;
}
.sb-style-2.sb-light-skin, .sb-style-3.sb-light-skin, .sb-style-4.sb-light-skin, .sb-style-5.sb-light-skin {
  background-color: rgba(255, 255, 255, .1);
}
.sb-style-2:hover, .sb-style-3:hover, .sb-style-4:hover, .sb-style-5:hover, .sb-style-2.hover, .sb-style-3.hover, .sb-style-4.hover, .sb-style-5.hover {
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}



body{margin-top:20px;}
.btn.btn-outline-primary:hover, .bg-primary {
    background-color: #0cb4ce !important;
}
.section-medium {
    padding: 55px 0px;
}
.testimonial-four blockquote:hover::after, .section-arrow-primary-color.section-arrow--bottom-center:after {
    border-right-color: #0cb4ce;
}
.section-arrow-primary-color.section-arrow--bottom-center:after {
    background-color: #0cb4ce;
    border-right-color: #0cb4ce;
    border-bottom-color: #0cb4ce;
}
.section-arrow--bottom-center:after {
    z-index: 1;
    position: absolute;
    left: 50%;
    margin-left: -15px;
    content: "";
    position: absolute;
    bottom: -15px;
    width: 30px;
    height: 30px;
    border-right: 1px solid #262626;
    border-bottom: 1px solid #262626;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
    background-color: #262626;
}
.text-white h1, .text-white h2, .text-white h3, .text-white h4, .text-white h5, .text-white h6 {
    color: white !important;
}
.section-title {
    font-size: 32px;
    font-weight: 600;
    margin-top: 0.45em;
    margin-bottom: 0.35em;
    color: #303133;
    font-family: Poppins;
    letter-spacing: -0.02em;
}
.section-sub-title {
    font-size: 18px;
    margin-bottom: 20px;
    font-weight: 400;
    font-family: Poppins;
}
.section-arrow-primary-color.section-arrow--bottom-center:after {
    border-bottom-color: #0cb4ce;
}
.section-arrow-primary-color.section-arrow--bottom-center:after{
    background-color: #0cb4ce;
}
.special-heading.line span:before, .special-heading.line span:after, .footer.footer-minimal, .t-bordered {
    border-top-color: #eaeaea;
}
.t-bordered {
    border-top: 1px solid #eaeaea;
}
.section-primary {
    padding: 75px 0px;
}
section {
    position: relative;
}


</style>

	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">


							<!-- <h1>We Help to Build Your Site</h1>
											<a href=""><button type="submit" class="btn btn-success">Xem thêm</button></a>-->

													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="space20">&nbsp;</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">



	<div class="space20">&nbsp;</div>

<div class="container lg padding-20px-tb">
        <div class="row">
            <div class="col-md-4 xs-margin-30px-bottom">
                <div class="card categories-card">
                    <div class="card-img"><img src="http://theme.hstatic.net/200000315107/1000737985/14/ms_banner_img3.jpg?v=61" alt=""></div>

                    <div class="card-img-overlay align-items-center">
                        <div class="bg-white-opacity">

                            <h4>Home Decor</h4>
                            <ul class="categories-02">
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?

</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 xs-margin-30px-bottom">
                <div class="card categories-card">
                    <div class="card-img"><img src="http://theme.hstatic.net/200000315107/1000737985/14/ms_banner_img2.jpg?v=61" alt=""></div>

                    <div class="card-img-overlay align-items-center">
                        <div class="bg-white-opacity">

                            <h4>Home Decor</h4>
                            <ul class="categories-02">
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?

</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card categories-card">
                    <div class="card-img"><img src="https://media.istockphoto.com/photos/pharmacist-holding-medicine-box-and-capsule-pack-picture-id878852718?k=20&m=878852718&s=612x612&w=0&h=bhYSWJoIeVLjJCsmK9AI6iWz7_vlE3UlYN-0OKhtQRg=" alt=""></div>

                    <div class="card-img-overlay align-items-center">
                        <div class="bg-white-opacity">

                            <h4>Home Decor</h4>
                            <ul class="categories-02">
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?

</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>






<div class="space20">&nbsp;</div>
<div class="space20">&nbsp;</div>


<div class="row1">
  <div class="column1">
    <img src="source/image/ad3.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column1">
    <img src="source/image/ad4.jpg" alt="Mountains" style="width:100%">
  </div>
</div>

<div class="space20">&nbsp;</div>
<div class="space20">&nbsp;</div>

<img src="http://theme.hstatic.net/200000315107/1000737985/14/home_banner_img.jpg?v=61" style="width:100%">








				
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $newhang)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$newhang->id)}}"><img src="source/image/product/{{$newhang->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newhang->name}}</p>
											<p class="single-item-price">
												@if($newhang->promotion_price != 0)

												<span class="flash-del">{{number_format($newhang->unit_price)}}</span>
												<span class="flash-sale">{{number_format($newhang->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($newhang->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$newhang->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$newhang->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>


							<!--pagination -->
							<div class="row">{{$new_product->links()}}</div>



						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Products On Sale</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($top_product as $tophang)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('product_detail',$tophang->id)}}"><img src="source/image/product/{{$tophang->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tophang->name}}</p>
											<p class="single-item-price">
												@if($tophang->promotion_price != 0)

												<span class="flash-del">{{number_format($tophang->unit_price)}}</span>
												<span class="flash-sale">{{number_format($tophang->promotion_price)}}</span> VNĐ
												
												@else
												<span class="flash-sale">{{number_format($tophang->unit_price)}}</span> VNĐ

												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addsp',$tophang->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$tophang->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
						</div> <!-- .beta-products-list -->


							<!--pagination -->
							<div class="row">{{$top_product->links()}}</div>



					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->


<div class="space20">&nbsp;</div><div class="space20">&nbsp;</div>


<section class="section-medium section-arrow--bottom-center section-arrow-primary-color bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <h2 class="section-title "> What Others Say About Us</h2>

            </div>
        </div>
    </div>
</section>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<section class="container py-5">
    <br><br>
    <div class="row pt-3">
        <!-- Author-->
        <div class="col-lg-3 col-sm-6 mb-30 pb-2">
            <div class="team-card-style-3 mx-auto">
                <div class="team-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Author Picture">
                </div>
                <h4 class="team-name">Emanuel Ortega</h4><a class="team-contact-link" style="pointer-events: none; cursor: default;"><i class="fe-icon-mail"></i>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</a>

            </div>
        </div>
        <!-- Author-->
        <div class="col-lg-3 col-sm-6 mb-30 pb-2">
            <div class="team-card-style-3 mx-auto">
                <div class="team-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Author Picture">
                </div>
                <h4 class="team-name">Samantha Palson</h4><a class="team-contact-link" style="pointer-events: none; cursor: default;"><i class="fe-icon-mail"></i>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</a>

            </div>
        </div>
        <!-- Author-->
        <div class="col-lg-3 col-sm-6 mb-30 pb-2">
            <div class="team-card-style-3 mx-auto">
                <div class="team-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Author Picture">
                </div>
                <h4 class="team-name">Emma Johnson</h4><a class="team-contact-link" style="pointer-events: none; cursor: default;"><i class="fe-icon-mail"></i>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</a>

            </div>
        </div>
        <!-- Author-->
        <div class="col-lg-3 col-sm-6 mb-30 pb-2">
            <div class="team-card-style-3 mx-auto">
                <div class="team-thumb"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Author Picture">
                </div>
                <h4 class="team-name">William Smith</h4><a class="team-contact-link" style="pointer-events: none; cursor: default;"><i class="fe-icon-mail"></i>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</a>

            </div>
        </div>
    </div>
</section>







		</div> <!-- #content -->
		</div>
		</div>
@endsection