<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment PHP 2</title>
    @include('layout.style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="navigation">
            <div class="navigation__title">
                <p>HMT</p>
            </div>
            <div class="navigation__content">
                <ul>
                    <li><a href="{{route()}}">Trang chủ</a></li>
                    <li><a href="{{route('list-category')}}">Danh mục</a></li>
                    <li><a href="{{route('list-product')}}">Sản phẩm</a></li>
                    <li><a href="{{route('list-staff')}}">Nhân viên</a></li>
                    <li><a href="{{route('list-account')}}">Tài khoản</a></li>
                    <li><a href="{{route('list-brand')}}">Thương hiệu</a></li>
                </ul>
            </div>
        </section>
        <section class="content__Management">
            @yield('content')
        </section>
    </div>
    @include('layout.script')
</body>
</html>