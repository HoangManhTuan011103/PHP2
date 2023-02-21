@extends('layout.main');
@section('content')
<div class="content__Management-above">
    <div class="content__Management-above--title">
        <h3>Quản lý thương hiệu</h3>
    </div>
    <div class="content__Management-above--user">
        <h3>Hoàng Mạnh Tuấn</h3>
    </div>
</div>
<div class="content__Management-feature">
    
    
    <div class="content__Management-feature--advanced">
        <a href="{{route('form-add-brand')}}"><button>Thêm thương hiệu mới</button></a>
    </div>
    
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="information__Action">
            {{$_SESSION['success']}}
        </div>
    @endif
  
    <div class="content__Management-feature--table">
        <table border="1">
            <tr>
                <th>Mã thương hiệu</th>
                <th>Tên thương hiệu</th>
                <th>Số lượng sản phẩm</th>
                <th>Thao tác</th>
            </tr>
            @if (count($list) > 0)
                @foreach ($list as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->amount_product}}</td>
                        <td>
                            <a href="{{route('form-edit-category'.$value->id)}}"><button>Sửa</button></a>
                            <a href="javascript:confirmDelete('delete-account/{{$value->id}}')"><button>Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" >Không tồn tại thương hiệu nào</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection