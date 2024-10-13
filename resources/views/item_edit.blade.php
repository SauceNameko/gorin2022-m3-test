@extends('app')
@section('title')
    商品新規登録画面
@endsection

@section('content')
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('item_update', $item->id) }}" method="post">
        @csrf
        name:<input type="text" name="name" id="" value="{{ $item->name }}">
        price: <input type="text" name="price" id="" value="{{ $item->price }}">
        <input type="submit" value="編集" class="btn btn-success">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    </form>
@endsection
