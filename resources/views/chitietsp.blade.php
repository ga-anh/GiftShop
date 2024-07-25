@extends('layout')
@section('tieudetrang')
Chi tiết {{$spct->ten_sp}}
@endsection
@section('noidung')

<body>
    <!-- Product Details -->
    <section class="section product-detail">
        <div class="details container">
            <div class="left image-container ">
                <div class="main ">
                    <img src="{{asset($spct->hinh)}}" class="rounded-5" alt="">
                </div>
            </div>
            <div class="right">
                <h1>{{$spct->ten_sp}}</h1>
                <div class="price">{{number_format($spct->gia,0,",",".")}}VNĐ </div>
                <form>
                    <div>
                        <label for="">Số lượng:</label>
                        <input class="" type="number" id="soluong" min="1" max="10" value="{{ isset($spct->soluong) ? $spct->soluong : 1 }}">
                    </div>
                </form>
                <form class="form">
                    <a href="/themvaogio/{{$spct->id}}/{{$spct->soluong}}" class="addCart">Add To Cart</a>
                </form>

                <h3>Product Detail</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima
                    delectus nulla voluptates nesciunt quidem laudantium, quisquam
                    voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!
                </p>
            </div>
        </div>
    </section>

    <!-- Related -->
    <section class="section featured">
        <div class="top container">
            <h1>Sản phẩm liên quan</h1>
            <a href="#" class="view-more">View more</a>
        </div>
        <div class="product-center container">
            @foreach($splienquan_arr as $sp)
            <div class="product-item">
                <div class="overlay">
                    <a href="/sp/{{$sp->id}}" class="product-thumb">
                        <img src="{{asset($sp->hinh)  }}" alt="" />
                    </a>

                </div>
                <div class="product-info">
                    <span>MEN'S CLOTHES</span>
                    <a href="">{{$sp->ten_sp}} </a>
                    <h4>{{ number_format( $sp->gia , 0 , "," , ".") }} VNĐ </h4>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Custom Script -->
    <h2 class="bg-success mt-3 p-2 fs-5 text-white"> Bình luận sản phẩm</h2>
    <div id="list_binh_luan">
        @foreach($binh_luan_arr as $bl)
        <div class="border border-success m-2 p-2">
            <p class="d-flex justify-content-between">
                <b>{{$bl->user->name}}</b>
                <span>{{ gmdate('d/m/Y H:m:s', strtotime($bl->thoi_diem)+3600*7)}}</span>
            </p>
            <p>{{$bl->noi_dung}}</p>
        </div>
        @endforeach
    </div>
    <form class="border border-success p-3" method="post" action="/luubinhluan">
        <p>
            <textarea class="form-control shadow-none fs-5" name="noi_dung" rows="4" placeholder="Mời nhập bình luận"></textarea>
        </p>
        <p class="text-end"> @csrf
            <input type="hidden" name="id_sp" value="{{$sp->id}}">
            <button class="btn btn-success " type="submit"> Gửi bình luận</button>
        <p>
    </form>


</body>
@endsection