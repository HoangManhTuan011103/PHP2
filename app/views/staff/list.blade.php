@extends('layout.main');
@section('content')
<div class="content__Management-above">
    <div class="content__Management-above--title">
        <h3>Quản lý nhân viên</h3>
    </div>
    <div class="content__Management-above--user">
        <h3>Hoàng Mạnh Tuấn</h3>
    </div>
</div>
<div class="content__Management-feature">
    
    
    <div class="content__Management-feature--advanced">
        <a href="{{route('form-add-staff')}}"><button>Thêm nhân viên mới</button></a>
    </div>
    
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
  
    <div class="content__Management-feature--table">
        <table border="1">
            <tr>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Ảnh</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Thao tác</th>
            </tr>
            @if (count($list) > 0)
                @foreach ($list as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <img src="app/views/staff/img/{{$value->img}} " alt="Không có ảnh" width="150px" height="150px">
                        </td>
                        <td>{{$value->birthday}}</td>
                        <td>{{$value->addess}}</td>
                        <td>
                            {{$value->role === 0 ? "Quản lý" : "Nhân viên"}}
                        </td>
                        <td>
                            <a href="{{route('form-edit-staff'.$value->id)}}"><button>Sửa</button></a>
                            <a href="javascript:confirmDelete('delete-staff/{{$value->id}}')"><button>Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" >Không tồn tại nhân viên nào</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection