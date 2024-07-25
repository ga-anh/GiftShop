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
            <div class="border col-sm-12 d-flex p-2">
                <div class="border p-2 m-2">
                    <a href="/shop">ALL</a>
                </div>
                @foreach($listsp as $lsp)
                <div class="border p-2 m-2">
                    <a href="/sp_theoloai/{{$lsp->id}}">
                        {{$lsp->ten_loai}}
                    </a>
                </div>
                @endforeach
            </div>
            @foreach($spshow as $sp)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="/sp/{{$sp->id}}">
                        <div class="img-box">
                            <img src="{{asset($sp->hinh)}}" alt="">
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
        <div class="p-3 pagination">{{$spshow->links()}}</div>
    </div>
</section>
@endsection