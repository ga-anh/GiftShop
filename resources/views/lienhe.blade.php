@extends('layout')
@section('tieudetrang')
Liên hệ
@endsection
@section('noidung')
<section class="contact_section layout_padding">
    <div class="container px-0">
        <div class="heading_container ">
            <h2 class="">
                Liên hệ với chúng tôi
            </h2>
        </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
                <form method="post" action="/guilienhe">
                    @csrf
                    <div>
                        <input type="text" name="ht" placeholder="Họ tên" />
                    </div>
                    <div>
                        <input type="email" name="em" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" name="dt" placeholder="Số điện thoại" />
                    </div>
                    <div>
                        <input type="text" name="nd" class="message-box" placeholder="Nội dung" />
                    </div>
                    <div class="d-flex ">
                        <button type="submit">
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection