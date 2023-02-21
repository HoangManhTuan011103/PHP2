@extends('layout.main');
@section('content')
<div class="content__Management-above">
    <div class="content__Management-above--title">
        <h3>Quản lý danh mục</h3>
    </div>
    <div class="content__Management-above--user">
        <h3>Hoàng Mạnh Tuấn</h3>
    </div>
</div>
<div class="content__Management-feature">
    
    
    <div class="content__Management-feature--advanced">
        <a href="{{route('form-add-category')}}"><button>Thêm danh mục mới</button></a>
    </div>
    
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
  
    <div class="content__Management-feature--table">
        <table border="1">
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            @if (count($list) > 0)
                @foreach ($list as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <img src="app/views/category/img/{{$value->img}} " alt="Không có ảnh" width="150px" height="150px">
                        </td>
                        <td>{{$value->status == 0 ? "Hoạt động" : "Vô hiệu"}}</td>
                        <td>
                            <a href="{{route('form-edit-category'.$value->id)}}"><button>Sửa</button></a>
                            <a href="javascript:confirmDelete('delete-catgory/{{$value->id}}')"><button>Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" >Không tồn tại danh mục nào</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection