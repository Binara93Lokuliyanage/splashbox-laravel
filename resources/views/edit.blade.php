<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/profile-styles.css') }}">
</head>
<div class="updateBox">
    <h1>Update Product</h1>
    <form action="edit" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$data['id']}}">
        <input type="text" name="title" placeholder="Title" value="{{$data['title']}}"><br>
        <span style="color: red">@error('title'){{$message}}@enderror</span><br>

        <input type="hidden" name="image"  placeholder="Image" value="{{$data['image']}}">

        <select name="category" placeholder="Icon Name" value="{{$data['icon_url']}}">
            <option value="" disabled selected>Select Category</option>
            <option value="images/cat/Group 494.png">Plumbing</option>
            <option value="images/cat/Group 480.png">Gasfitting</option>
            <option value="images/cat/Group 492.png">Roofing</option>
            <option value="images/cat/Group 470.png">Drainage</option>
            <option value="images/cat/Group 482.png">Pipe System</option>
            <option value="images/cat/Group 493.png">Backflow</option>
            
        </select><br>
        <span style="color: red">@error('category'){{$message}}@enderror</span><br>

        <div class="imageArea" id = "imageArea">
            <img src="{{asset('/storage/images/'.$data['image']) }}" alt="" title="" style="max-width: 100%; max-height: 100%;">
        </div><br>
        <input type="file" name="image2" placeholder="Image2" id = "image2" accept="image/png, image/gif, image/jpeg">

        <button type="submit" class="button"> Update</button>
    </form>

</div>

<style>
  

   
</style>
<script>
    const image = document.getElementById("image2");
    const preview = document.getElementById("imageArea");

    image.addEventListener("change", function () {
  var imageData = getImgData();
  

  function getImgData() {
  const files = image.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
        preview.innerHTML = '<img src="' + this.result + '" style="max-width: 100%; max-height: 100%;"/>';
    });    
  }
}
});
</script>