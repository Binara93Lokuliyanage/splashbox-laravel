Hi {{$data['name']}}!<br>

Your verification code is <br>

<h1>{{$data['key']}}</h1>

Enter this code to verify your Aqualine account.<br><br>

Click the link to visit account verification page <br><br>

<a href = "http://127.0.0.1:8000/verification?name={{$data['user']}}">Visit</a><br><br>

We’re glad you’re here!<br>
The Aqualine team

<style>
a {
  background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>