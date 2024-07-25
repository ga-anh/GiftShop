@extends('layout')
@section('tieudetrang')
Đăng ký
@endsection
@section('noidung')
<section class=" gradient-form" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                </div>

                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="post" action="{{url('/dangky')}}" >
                                @csrf
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Họ tên</label>
                                        <input type="text" name="name" value="{{old('name')}}"  id="form3Example1cg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('name') {{ $message }} @enderror </b>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" id="form3Example3cg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('email') {{ $message }} @enderror </b>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                        <input type="password" name="mk1" value="{{old('mk1')}}"  id="form3Example4cg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('mk1') {{ $message }} @enderror </b>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                                        <input type="password" name="mk2"  value="{{old('mk2')}}" id="form3Example4cdg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('mk2') {{ $message }} @enderror </b>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Địa chỉ</label>
                                        <input name="dia_chi" value="{{old('dia_chi')}}" type="text"  id="form3Example4cdg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('dia_chi') {{ $message }} @enderror </b>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Điện thoại</label>
                                        <input type="text" name="dien_thoai" value="{{old('dien_thoai')}}"  id="form3Example4cdg" class="form-control form-control-lg" />
                                        <b class="text-danger"> @error('dien_thoai') {{ $message }} @enderror </b>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input  type="checkbox" value="" id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            Tôi đồng ý với <a href="#!" class="text-body"><u>điều khoản và dịch vụ</u></a>
                                        </label>

                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Đăng ký</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Đã có tài khoản? <a href="/dangnhap" class="fw-bold text-body"><u>Đăng nhập ngay</u></a></p>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">We are more than just a company</h4>
                                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 140vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>