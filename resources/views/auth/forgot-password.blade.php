@extends('layout')
@section('tieudetrang')
Trang chủ
@endsection
@section('noidung')

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                </div>

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div data-mdb-input-init class="form-outline mb-4"> <label> {{ __('Quên mật khẩu? Không có gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu qua email để cho phép bạn chọn địa chỉ mới.') }}</label></div>
                                    <div data-mdb-input-init class="form-outline mb-4"> <input type="email" placeholder="Email" name="email" :value="old('email')" required autofocus>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4"><button>{{ __('Liên kết đặt lại mật khẩu email') }}</button></div>



                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection