<!DOCTYPE html>
<html>
<head>
  <title>@yield('title','Weibo App') - Laravel 开发教程</title>
  <link rel='stylesheet' href="{{mix('css/app.css')}}">
</head>
<body>
   @include('layouts._header')
   <div class='container'>
       @include('shared._messages')
       @yield('content')
   </div>
      @include('layouts._footer')   

</body>
</html>
