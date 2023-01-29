<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/profile-styles.css') }}">
</head>
<div class="header">
    <a href="/logout"><i class="fa fa-power-off" aria-hidden="true" style="color: white; float: right; margin-top: 20px; margin-right: 20px; font-size: 24px"></i></a>
    <h1>Welcome</h1>
    <h2>{{session('user')}}</h2>
</div>


<div class="left">
    <h3 style="text-align: center;">Add Product</h3>
    <form action="addProduct" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title"><br>
        <span style="color: red">@error('title'){{$message}}@enderror</span><br>

        <input type="file" name="image" placeholder="Image" accept="image/png, image/gif, image/jpeg"><br>
        <span style="color: red">@error('image'){{$message}}@enderror</span><br>

        <select name="category" placeholder="Icon Name">
        <option value="" disabled selected>Select Category</option>
            <option value="images/cat/Group 494.png">Plumbing</option>
            <option value="images/cat/Group 480.png">Gasfitting</option>
            <option value="images/cat/Group 492.png">Roofing</option>
            <option value="images/cat/Group 470.png">Drainage</option>
            <option value="images/cat/Group 482.png">Pipe System</option>
            <option value="images/cat/Group 493.png">Backflow</option>
            
        </select><br>
        <span style="color: red">@error('category'){{$message}}@enderror</span><br>
        

        <button type="submit" class="button"> Save</button>
    </form>
</div>
<div class="right">
    <h3>Product List</h3>
    <table class="tableStyle">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image Name</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($collection as $col)
        <tr>
            <td>{{$col['id']}}</td>
            <td>{{$col['title']}}</td>
            <td>{{$col['image']}}</td>
            <td><a href="{{'edit/'.$col['id']}}">Edit</a></td>
            <td><a href="{{'delete/'.$col['id']}}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>

<style>
   
</style>