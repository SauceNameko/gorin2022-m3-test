@extends('app')

@section('title')
    ホーム画面
@endsection

@section('content')
    <a href="{{ route('logout') }}" class="btn btn-outline-danger">ログアウト</a>
    <a href="{{ route('item_create') }}" class="btn btn-outline-primary">商品新規登録</a>
    <a href="{{ route('coupon_index') }}" class="btn btn-outline-success">クーポン管理画面</a>
    <table class="table table-bordered">
        <th>shop_id</th>
        <th>name</th>
        <th>price</th>
        <th></th>
        <th></th>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->shop_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td><a href="{{ route('item_edit', $item->id) }}" class="btn btn-success">編集</a></td>
                <td><a href="{{ route('item_destroy', $item->id) }}" class="btn btn-danger" onclick="return confirm('本当に削除しますか')" >削除</a></td>
            </tr>
        @endforeach
    </table>
@endsection
