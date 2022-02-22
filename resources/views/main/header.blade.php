<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> medcare. </a>

    <nav class="navbar">
        <a href="#home"><i class="fa fa-home" aria-hidden="true"></i> trang chủ</a>

        <div class="dropdown">
        <a><i class="fas fa-pills"></i> sản phẩm</a>
        <div class="dropdown-content">
@foreach($category as $cat)
                <a href="{{route('category',$cat->id)}}">{{$cat->name}}</a>
@endforeach
        </div>
        </div>

        <a href="#about"><i class="fa fa-info-circle" aria-hidden="true"></i> giới thiệu</a>
        <a href="#doctors"><i class="fa fa-phone" aria-hidden="true"></i> liên hệ/tư vấn</a>
        <a href="#book"><i class="fas fa-shopping-cart"></i> giỏ hàng</a>
        @if(Auth::check())
<div class="dropdown">
        <a><i class="fas fa-user"></i> tài khoản</a>
<div class="dropdown-content">
        <a href="{{route('userinfo')}}"><i class="far fa-file-alt"></i> thông tin</a>
        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> đăng xuất</a>
</div>
</div>
        @else
        <a href="{{route('login')}}"><i class="fa fa-key"></i> đăng nhập</a>
        @endif
        <a><button type="button" class="btn" onclick="myFunction()"><i class="fa fa-search" aria-hidden="true"></i></button></a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->
<section class="book" id="book">

    <h1 class="heading">search</h1>    

    <div class="row" id="myDIV" style="display: none">
        <form method="get" action="{{route('search')}}">
            <h3>Tìm Kiếm</h3>
            <input type="text" placeholder="Tên sản phẩm" class="box" name="searchbox">
                                    <select class="box" id="exampleFormControlSelect1" name="danhmuc">
                                    <option value="" selected="false">Tất cả</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                    </select>
<select name="price" hidden>
  <option value="" selected>Khoảng giá</option>
</select>
<select name="origin" hidden>
  <option value="" selected>Khoảng giá</option>
</select>
<select name="sort" hidden>
  <option value="1" selected>Khoảng giá</option>
</select>
            <input type="submit" value="Tìm Kiếm" class="btn">
        </form>

    </div>

</section>