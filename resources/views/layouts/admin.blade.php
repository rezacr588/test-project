<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>{{$title}}</title>
    @yield('style')
    <style>
        .error{
            color: red;
            text-decoration: underline;
        }
        .form-g{
            border: black solid 2px;
            border-radius: 10%;
            margin: 10px;
            padding: 10px;
        }
        a{
            text-decoration: none;
            color: inherit;
        }
        a:active{
            color: pink;
        }
        a:hover{
            color: white;
        }
        *{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        nav{
            background: pink;
            height: 50px;
            border: solid 4px aqua;
        }
        nav ul li{
            display: inline;
            border: #1d68a7 1px solid;
            border-radius: 40px;
            top: 15px;
            padding: 5px;
            margin: 5px;
            background: #4dc0b5;
        }
        ul{
            list-style-type: none;
        }
        li{
            left: 30px;
        }
        li:hover{
            background-color: black;
            color: white;
        }
        aside ul li {
            border: #1d68a7 solid 2px;
            border-radius: 40px;
            margin: 5px;
            padding: 5px;
            background-color: #c7eed8;
        }
        aside{
            background-color: #4e555b;
            float: right;
            width: 17.2%;
        }
        .container{
            width: 100%;
        }
        .main{
            float: right;
            width: 80%;
            border: aqua dotted 1px;
            background-color: #c7eed8;
            padding: 20px;
        }
        @media screen and (max-width: 800px) {
            .main{

            }
            .aside{

            }
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="{{route('login')}}" id="login">ورود</a></li>
        <li><a href="{{route('register')}}" id="register">ثبت نام</a></li>
        <li><a href="{{route('logout.user')}}" id="logout">خروج</a></li>
    </ul>
</nav>
<section class="container">
    <aside>
        <h2>اخبار</h2>
        <ul>
            <li class="aside"><a href="{{route('posts.create')}}" id="create">ایجاد خبر</a></li>
            <li class="aside"><a href="{{route('posts.index')}}" id="index">لیست اخبار</a></li>
        </ul>
    </aside>
    <div class="main">
        @yield('mainPart')
    </div>
</section>
<footer>
</footer>
@yield('script')
</body>
</html>
