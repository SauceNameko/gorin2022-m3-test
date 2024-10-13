@extends('app')
@section('title')
    クーポン新規登録画面
@endsection

@section('content')
    <a href="{{ route('coupon_index') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('coupon_store') }}" method="post">
        @csrf
        coupon_code:<input type="text" name="coupon_code" id="">
        coupon_price: <input type="text" name="coupon_price" id="">
        <input type="submit" value="登録" class="btn btn-primary">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    </form>
@endsection
