@extends('app')
@section('title')
    ログイン画面
@endsection

@section('content')
    <form action="{{ route('check') }}" method="post">
        @csrf
        account:<input type="text" name="name" id="">
        password: <input type="text" name="password" id="">
        <input type="submit" value="ログイン" class="btn btn-primary">
        @if(session("message"))
        <div class="alert alert-danger">{{ session("message") }}</div>
        @endif
    </form>
@endsection
