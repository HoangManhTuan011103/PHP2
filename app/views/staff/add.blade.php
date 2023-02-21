@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Thêm mới nhân viên</h3>
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
        <form action="{{route('form-add-staff-post')}}" method="post" enctype="multipart/form-data">
            <div class="group__input">
                <p class="title">Tên nhân viên:</p>
                <input type="text" name="name">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ảnh nhân viên:</p>
                <input type="file" name="image">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['img']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ngày sinh:</p>
                <input type="date" name="date">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                <p style="color: red; padding-top: 3px;">
                    {{$_SESSION['errors']['date']}}
                </p>
            @endif
            </div>

            <div class="group__input">
                <p class="title">Địa chỉ:</p>
                <input type="text" name="address">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['address']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Chức vụ:</p>
                <select name="role" id="">
                    <option value="" hidden>------ Chức vụ nhân viên------</option>
                        <option value="0">Quản lý</option>
                        <option value="1">Nhân viên</option>
                </select>
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['role']}}
                    </p>
                @endif
            </div>

            <div class="group__input group__input--btn">
                <button type="submit" name="addStaff">Thêm nhân viên</button>
                <a href="{{route('list-staff')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection