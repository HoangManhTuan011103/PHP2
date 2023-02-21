@extends('layout.main');
@section('content')
<div class="content__Management-above">
    <div class="content__Management-above--title">
        <h3>Quản lý tài khoản</h3>
    </div>
    <div class="content__Management-above--user">
        <h3>Hoàng Mạnh Tuấn</h3>
    </div>
</div>
<div class="content__Management-feature">
    
    
    <div class="content__Management-feature--advanced">
        <a href="{{route('form-add-account')}}"><button>Thêm tài khoản mới</button></a>
    </div>
    
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
  
    <div class="content__Management-feature--table">
        <table border="1">
            <tr>
                <th>Mã tài khoản</th>
                <th>Email</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Số điện thoại</th></th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th>Quyền truy cập</th>
                <th>Thao tác</th>
            </tr>
            @if (count($list) > 0)
                @foreach ($list as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                            <img src="app/views/account/img/{{$value->avatar}} " alt="Không có ảnh" width="150px" height="150px">
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone_number}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>
                            {{$value->role === 0 ? "Admin" : "Khách hàng"}}
                        </td>
                        <td>
                            <a href="javascript:confirmDelete('delete-account/{{$value->id}}')"><button>Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" >Không tồn tại tài khoản nào</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection