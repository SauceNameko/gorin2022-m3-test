@extends('app')
@section('title')
    商品新規登録画面
@endsection

@section('content')
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('item_store') }}" method="post">
        @csrf
        name:<input type="text" name="name" id="">
        price: <input type="text" name="price" id="">
        <input type="submit" value="登録" class="btn btn-primary">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    </form>
@endsection
