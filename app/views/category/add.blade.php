@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Thêm mới danh mục</h3>
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
        <form action="{{route('form-add-category-post')}}" method="post" enctype="multipart/form-data">
            <div class="group__input">
                <p class="title">Tên danh mục:</p>
                <input type="text" name="name">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ảnh danh mục:</p>
                <input type="file" name="image">
            </div>

            <div class="group__input">
                <p class="title">Trạng thái:</p>
                <select name="status" id="">
                    <option value="" hidden>--- Trạng thái danh mục ---</option>
                    <option value="0">Hoạt động</option>
                    <option value="1">Vô hiệu</option>
                </select>
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['status']}}
                    </p>
                @endif
            </div>

            <div class="group__input group__input--btn">
                <button type="submit" name="addCategory">Thêm danh mục</button>
                <a href="{{route('list-category')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection