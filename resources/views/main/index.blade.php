@extends('main.master')
@section('content')

<div id ="holdurass">
@foreach($slide as $sl)
<img class="mySlides fade-in" src="source/image/slide/{{$sl->image}}" >
@endforeach

</div>





<section class="home" id="home">

    <div class="image">
        <img src="source2/image/home-img.svg" alt="">
    </div>

    <div class="content">
        <h3>stay safe, stay healthy</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="#" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
    </div>

</section>

<!-- home section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>140+</h3>
        <p>doctors at work</p>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>1040+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>500+</h3>
        <p>bed facility</p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>80+</h3>
        <p>available hospitals</p>
    </div>

</section>

<!-- icons section ends -->





<!-- doctors section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> sản phẩm <span>mới</span> </h1>

    <div class="box-container">
@foreach($new_product as $newhang)
        <div class="box">
            <div class="image">
                <img src="source/image/product/{{$newhang->image}}" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="{{route('category',$newhang->id_type)}}"> <i class="fas fa-calendar"></i> {{$newhang->product_type->name}} </a>
                </div>
                <h3>{{$newhang->name}}</h3>
                @if($newhang->promotion_price != 0)
                <p>Giá: <span style="text-decoration:line-through">{{number_format($newhang->unit_price)}}</span> <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($newhang->promotion_price)}} VNĐ</span></p>
                @else
                <p>Giá: <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($newhang->unit_price)}} VNĐ</span></p>
                @endif
                <a href="{{route('addsp',$newhang->id)}}" class="btn"><span class="fas fa-cart-plus"></span> mua ngay </a>
                <a href="{{route('product_detail',$newhang->id)}}" class="btn"> chi tiết <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
@endforeach


<button type="button" class="btn "><i class="fas fa-braille"></i> Xem Thêm</button>
    </div>

</section>









<section class="blogs" id="blogs">

    <h1 class="heading"> sản phẩm <span>khuyến mãi</span> </h1>

    <div class="box-container">
@foreach($top_product as $tophang)
        <div class="box">
            <div class="image">
                <img src="source/image/product/{{$tophang->image}}" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="{{route('category',$tophang->id_type)}}"> <i class="fas fa-calendar"></i> {{$tophang->product_type->name}} </a>
                </div>
                <h3>{{$tophang->name}}</h3>
                @if($tophang->promotion_price != 0)
                <p>Giá: <span style="text-decoration:line-through">{{number_format($tophang->unit_price)}}</span> <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($tophang->promotion_price)}} VNĐ</span></p>
                @else
                <p>Giá: <span style="font-size:21px;color:#00b38f;font-weight:bold">{{number_format($tophang->unit_price)}} VNĐ</span></p>
                @endif
                <a href="{{route('addsp',$tophang->id)}}" class="btn"><span class="fas fa-cart-plus"></span> mua ngay </a>
                <a href="{{route('product_detail',$tophang->id)}}" class="btn"> chi tiết <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
@endforeach

<button type="button" class="btn"><i class="fas fa-braille"></i> Xem Thêm</button>
    </div>

</section>

<!-- doctors section ends -->


<!-- review section starts  -->

<section class="review" id="review">
    
    <h1 class="heading"> client's <span>review</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="source2/image/pic-1.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

        <div class="box">
            <img src="source2/image/pic-2.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

        <div class="box">
            <img src="source2/image/pic-3.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

    </div>

</section>

<!-- review section ends -->



<!-- booking section starts   -->

<section class="book" id="book">

    <h1 class="heading"> <span>book</span> now </h1>    

    <div class="row">

        <div class="image">
            <img src="source2/image/book-img.svg" alt="">
        </div>

        <form action="">
            <h3>book appointment</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="number" placeholder="your number" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="date" class="box">
            <input type="submit" value="book now" class="btn">
        </form>

    </div>

</section>

<!-- booking section ends -->

@endsection