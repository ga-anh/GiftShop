@extends('layout')
@section('tieudetrang')
Cập nhật hồ sơ
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
                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.update-profile-information-form')
                                            </div>
                                        </div>

                                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.update-password-form')
                                            </div>
                                        </div>

                                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                            <div class="max-w-xl">
                                                @include('profile.partials.delete-user-form')
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection