<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{url('Modern-Login-master/style.css')}}">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container" style="width: 50%; left:25%;">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <span> {{ __('Quên mật khẩu? Không có gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu qua email để cho phép bạn chọn địa chỉ mới.') }}</span>
                <input type="email" placeholder="Email" name="email" :value="old('email')" required autofocus >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <button>{{ __('Liên kết đặt lại mật khẩu email') }}</button>
            </form>
        </div>
    </div>

    <script src="{{url('Modern-Login-master/script.js')}}"></script>
</body>

</html>
