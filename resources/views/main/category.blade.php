@extends('main.master')
@section('content')
<style>

.test3 {
    width: 100%;
    height: 350px;
    background-size: cover;
    background-image:  url("http://theme.hstatic.net/200000315107/1000737985/14/breadcrumb_bg2.png?v=61");
    position: relative;
    border-style: outset;
}

.test3 h1 {

    position: absolute;
    bottom: 50%;
    width: 100%;
    text-align: center;
}


.sidenav {
  width: 180px;
  position: absolute;
  z-index: 1;
  
  background: #53bda8;
  overflow-x: hidden;
  padding: 12px 0;
}

.sidenav select {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #53bda8;
  display: block;
}

.sidenav select:hover {
  color: #064579;
}

.main {
  margin-left: 60px; /* Same width as the sidebar + left position in px */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
}

#fixedbutton {
    position: fixed;
    bottom: 20px;
    left: 0px;
    
}

.center {
    margin-left:auto;
    margin-right:auto;
    width: 250px;
}
.center li{
padding: 6px 8px 6px 16px;
text-align: center;
}

</style>






<button type="button" class="btn" onclick="showSort()" id="fixedbutton"><i class="fas fa-sort"></i> Sắp Xếp</button>




<div class="test3">
    <h1 class="heading"> Mục <span>{{$category_name->name}}</span> </h1>
</div>
  

<br>

<div class="sidenav" id="mysort" style="display: none">
<form method="get" action="{{route('sortcat',request()->route('type'))}}">

<select id="price" name="price" onchange="this.form.submit()">
<option value="" selected="">Khoảng giá</option>
<option value="1">Dưới 100.000đ</option>
<option value="2">100.000-300.000đ</option>
<option value="3">300.000-500.000đ</option>
<option value="4">500.000-1,000.000đ</option>
<option value="5">Trên 1 triệu đ</option>
</select>
<br><br>
<select id="origin" name="origin" onchange="this.form.submit()">
  <option value="" selected>Xuất xứ</option>
  @foreach($country as $ct)
  <option value="{{$ct->id}}">{{$ct->name}}</option>
  @endforeach
</select>
<select name="danhmuc" style="display: none">
  <option value="" selected="false">Tất cả</option>
  @foreach($typea as $t)
  <option value="{{$t->id}}" {{request()->route('type')==$t->id ? 'selected' : ''}}>{{$t->name}}</option>
  @endforeach
</select>

</div>

<div class="main">


<!-- doctors section starts  -->

<section class="blogs" id="blogs">


            
<label for="sort">Theo: </label>
<select class="box" id="sort" name="sort" onchange="this.form.submit()">
<option value="1" selected="">Mặc định</option>
<option value="2">Từ A-Z</option>
<option value="3">Từ Z-A</option>
<option value="4">Giá tăng dần</option>
<option value="5">Giá giảm dần</option>
<option value="6">Mới nhất</option>
</select>
                    <input type="submit" value="Tìm Kiếm" class="" style="display: none;">

</form>


    <div class="box-container">
@foreach($category_type as $cat_type)
        <div class="box">
            <div class="image">
                <img src="source/image/product/{{$cat_type->image}}" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="{{route('category',$cat_type->id_type)}}"> <i class="fas fa-calendar"></i> {{$cat_type->product_type->name}} </a>
                </div>
                <h3>{{$cat_type->name}}</h3>
                @if($cat_type->promotion_price != 0)
                <p>Giá: <span style="text-decoration:line-through">{{number_format($cat_type->unit_price)}}</span> <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($cat_type->promotion_price)}} VNĐ</span></p>
                @else
                <p>Giá: <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($cat_type->unit_price)}} VNĐ</span></p>
                @endif
                <a href="{{route('addsp',$cat_type->id)}}" class="btn"><span class="fas fa-cart-plus"></span> mua ngay </a>
                <a href="{{route('product_detail',$cat_type->id)}}" class="btn"> chi tiết <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
@endforeach





    </div>

</section>

<div class="center">
{{$category_type->links()}}
</div>


</div>  

  




@endsection