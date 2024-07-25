@extends('layout')
@section('tieudetrang')
Thông báo
@endsection
@section('noidung')
@if(session()->has('thongbao'))
<p>&nbsp; </p>
<div class="alert alert-info p-5 col-8 h5 m-auto text-center shadow-lg">
    {!! session('thongbao') !!}
</div>
<p>&nbsp;</p>
@endif
@endsection