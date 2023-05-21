
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Infinity Posts</title>
    <link rel="icon" href="{{URL::asset('/infinityImgs/blog.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/css/app.css'])
</head>

<body>

    <div class="container">
    <img src="{{URL::asset('/infinityImgs/Logo.png')}}" class="img-fluid mt-5" width="100" alt="" >

        <div class=" d-flex principal">
            <div class="textleft">
                <h1>See the <span>updated comments</span> from people around the world <span>.</span></h1>
                <a href="{{route('notes')}}"><button type="button" href="#" class="btnPosts"> WATCH POST’S</button></a>
            </div>
            <div class="imgrigth d-flex">
                <img src="{{URL::asset('/infinityImgs/socialmedia1.jpg')}}" class="imagenup" alt="" >
                <img src="{{URL::asset('/infinityImgs/socialmedia2.jpg')}}" class="imagendown" alt="" >
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>