@extends('layout.main')
@section('content')
    <div class="content__Management-above">
        <div class="content__Management-above--title">
            <h3>Thêm mới tài khoản</h3>
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
        <form action="{{route('form-add-account-post')}}" method="post" enctype="multipart/form-data">
            <div class="group__input">
                <p class="title">Email:</p>
                <input type="text" name="email">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['email']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Mật khẩu:</p>
                <input type="text" name="password">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['password']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Ảnh đại diện:</p>
                <input type="file" name="image">
            </div>

            <div class="group__input">
                <p class="title">Tên:</p>
                <input type="text" name="name">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['name']}}
                    </p>
                @endif
            </div>

            <div class="group__input">
                <p class="title">Số điện thoại:</p>
                <input type="number" name="phoneNumber">
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                <p style="color: red; padding-top: 3px;">
                    {{$_SESSION['errors']['phoneNumber']}}
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
                <p class="title">Quyền truy cập:</p>
                <select name="role" id="">
                    <option value="" hidden>------ Quyền truy cập tài khoản------</option>
                        <option value="0">Admin</option>
                        <option value="1">Khách hàng</option>
                </select>
                @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                    <p style="color: red; padding-top: 3px;">
                        {{$_SESSION['errors']['role']}}
                    </p>
                @endif
            </div>

            <div class="group__input group__input--btn">
                <button type="submit" name="addAccount">Thêm tài khoản</button>
                <a href="{{route('list-account')}}">Danh sách</a>
            </div>
        </form>
    </div>
@endsection