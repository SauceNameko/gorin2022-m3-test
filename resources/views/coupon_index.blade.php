@extends('app')

@section('title')
    クーポン管理画面
@endsection

@section('content')
<a href="{{ route('dashboard') }}" class="btn btn-outline-danger">戻る</a>
    <a href="{{ route('coupon_create') }}" class="btn btn-outline-primary">クーポン新規登録</a>
    <table class="table table-bordered">
        <th>shop_id</th>
        <th>coupon_code</th>
        <th>coupon_price</th>
        <th></th>
        <th></th>
        @foreach ($coupons as $coupon)
            <tr>
                <td>{{ $coupon->shop_id }}</td>
                <td>{{ $coupon->coupon_code }}</td>
                <td>{{ $coupon->coupon_price }}</td>
                <td><a href="{{ route('coupon_destroy', $coupon->id) }}" class="btn btn-danger"
                        onclick="return confirm('本当に削除しますか')">削除</a></td>
            </tr>
        @endforeach
    </table>
@endsection
