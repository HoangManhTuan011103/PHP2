@extends('layout.main');
@section('content')
<div class="content__Management-above">
    <div class="content__Management-above--title">
        <h3>Quản lý sản phẩm</h3>
    </div>
    <div class="content__Management-above--user">
        <h3>Hoàng Mạnh Tuấn</h3>
    </div>
</div>
<div class="content__Management-feature">
    
    
    <div class="content__Management-feature--advanced">
        <a href="{{route('form-add-product')}}"><button>Thêm sản phẩm mới</button></a>
    </div>
    
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
  
    <div class="content__Management-feature--table">
        <table border="1">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            @if (count($list) > 0)
                @foreach ($list as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->name_cate}}</td>
                        <td>
                            <img src="app/views/product/img/{{$value->img}} " alt="Không có ảnh" width="150px" height="150px">
                        </td>
                        <td>{{$value->price}}</td>

                        <td>{{$value->amount}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>
                            <a href="{{route('form-edit-product'.$value->id)}}"><button>Sửa</button></a>
                            <a href="javascript:confirmDelete('delete-product/{{$value->id}}')"><button>Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" >Không tồn tại sản phẩm nào</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection