<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-styles.css') }}">
</head>
<body>
    <div class = "loginBox">
    <div class="title">
        <h1>USER LOGIN</h1>
    </div>

    <form action="user" method="POST">
        @csrf
        <input type="text" name="user" placeholder="User Name" value = "{{ old('user')}}"><br>
        <span style="color: red">@error('user'){{$message}}@enderror</span><br>

        <input type="password" name="password" placeholder="Password"><br>
        <span style="color: red">@error('password'){{$message}}@enderror</span><br>

        <button type="submit" class = "button"><strong>LOGIN</strong></button>
    </form>
</div>
    
</body>
<style>
    
</style>