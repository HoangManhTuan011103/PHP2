@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Sửa danh mục</h3>
        </div>
        <div class="content__Management-above--user">
            <h3>Hoàng Mạnh Tuấn</h3>
        </div>
    </div>
    <div class="content__Management-feature">
        <form action="{{route('form-edit-category-post/'.$category->id)}}" method="post" enctype="multipart/form-data">
            <div class="group__input">
                <p class="title">Tên danh mục:</p>
                <input type="text" name="name" value="{{$category->name}}">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ảnh danh mục:</p>
                <img src="app/views/category/img/{{$category->img}} " alt="Chưa load xong" width="150px" height="150px"> <br>
                <input type="file" name="image" >
            </div>

            <div class="group__input">
                <p class="title">Trạng thái:</p>
                <select name="status" id="">
                    <option value="" hidden>--- Trạng thái danh mục ---</option>
                    <option value="0" {{$category->status === 0 ? "selected" : ""}} >Hoạt động</option>
                    <option value="1" {{$category->status === 1 ? "selected" : ""}} >Vô hiệu</option>
                </select>
            </div>

            <div class="group__input group__input--btn">
                <button type="submit" name="editCategory">Sửa danh mục</button>
                <a href="{{route('list-category')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection