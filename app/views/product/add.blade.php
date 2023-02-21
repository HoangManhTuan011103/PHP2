@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Thêm mới sản phẩm</h3>
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
        <form action="{{route('form-add-product-post')}}" method="post" enctype="multipart/form-data">
            <div class="group__input">
                <p class="title">Tên sản phẩm:</p>
                <input type="text" name="name">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ảnh sản phẩm:</p>
                <input type="file" name="image">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['img']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Giá sản phẩm:</p>
                <input type="number" name="price">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                <p style="color: red; padding-top: 3px;">
                    {{$_SESSION['errors']['price']}}
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

            <div class="group__input">
                <p class="title">Ngày tạo:</p>
                <input type="date" name="date">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                <p style="color: red; padding-top: 3px;">
                    {{$_SESSION['errors']['date']}}
                </p>
            @endif
            </div>

            <div class="group__input">
                <p class="title">Tên danh mục:</p>
                <select name="category" id="">
                    <option value="" hidden>------ Danh mục sản phẩm ------</option>
                    @foreach ($listCategory as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['category']}}
                    </p>
                @endif
            </div>

            <div class="group__input group__input--btn">
                <button type="submit" name="addProduct">Thêm sản phẩm</button>
                <a href="{{route('list-product')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection