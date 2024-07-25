@extends('layout')
@section('tieudetrang')
Cửa hàng
@endsection
@section('noidung')
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">



            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($listsp as $sp)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="/sp/{{$sp->id}}">
                        <div class="img-box">
                            <img src="{{$sp->hinh}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$sp->ten_sp}}
                            </h6>

                            <h6>
                                Price
                                <span>
                                    {{number_format($sp->gia,0,",",".")}}VNĐ
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>
@endsection