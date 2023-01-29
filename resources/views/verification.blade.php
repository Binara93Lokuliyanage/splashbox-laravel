<?php
if (isset($_GET['name'])) {
    $user_name = $_GET['name'];
} else {
    // Fallback behaviour goes here
}
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-styles.css') }}">
</head>
<div class = "loginBox">
    <div class="title">
        <h1>ACCOUNT VERIFICATION</h1>
        <p>Verification code has been sent to your email address.<br> Please check your email.</p>
    </div>
    <form action="verification" method="POST">
    @csrf
    <input type="hidden" name="user" placeholder="User Name" value="{{$user_name}}">
    <span style="color: red">@error('user'){{$message}}@enderror</span><br>

    <input type="number" name="verify_key" placeholder="Verification Code"><br>
    <span style="color: red">@error('verify_key'){{$message}}@enderror</span><br>

    <button type="submit" class="button"> Verify</button>
</form>
</div>

<style>
   

   
</style>