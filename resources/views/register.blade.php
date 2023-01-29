<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-styles.css') }}">
</head>

<div class="registerBox">
    <h1>USER REGISTRATION</h1>
    <form action="register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" value = "{{ old('name')}}"><br>
        <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <input type="text" name="email" placeholder="Your Email" value = "{{ old('email')}}"><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span><br>

        <input type="text" name="user" placeholder="User Name" value = "{{ old('user')}}"><br>
        <span style="color: red">@error('user'){{$message}}@enderror</span><br>

        <input type="password" name="password" placeholder="Password" style="width:74%" value = "{{ old('password')}}">
        <i class="fa fa-info-circle" aria-hidden="true" style="margin-left: 5px; color: #b7b2d1" title = "Password length should be between 8 - 14 characters. Must contain atleast one capital letter, simple letter, number, symbol "></i><br>
        <span style="color: red">@error('password'){{$message}}@enderror</span><br>

        <input id="password" type="password" name="password_confirmation" placeholder="Re-enter Password"><br>

        <button type="submit" class="button"> Register</button>
    </form>
</div>
<style>
    
</style>