@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Thêm mới thương hiệu</h3>
        </div>
        <div class="content__Management-above--user">
            <h3>Hoàng Mạnh Tuấn</h3>
        </div>
    </div>
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
    
    <div class="content__Management-feature">
        <form action="{{route('form-add-brand-post')}}" method="post" enctype="multipart/form-data">

            <div class="group__input">
                <p class="title">Tên thương hiệu:</p>
                <input type="text" name="name">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Số lượng sản phẩm:</p>
                <input type="number" name="amount">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                <p style="color: red; padding-top: 3px;">
                    {{$_SESSION['errors']['amount']}}
                </p>
            @endif
            </div>          

            <div class="group__input group__input--btn">
                <button type="submit" name="addBrand">Thêm thương hiệu</button>
                <a href="{{route('list-brand')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection