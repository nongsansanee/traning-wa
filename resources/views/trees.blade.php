<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div  >
        <h1>ต้นไม้</h1>
        @foreach ($trees as $tree)
         <li>{{$tree->name}} ราคา {{$tree->price}} บาท {{$tree->remark}} สถานะ: {{$tree->status}}</li>
        @endforeach
    </div>
</body>
</html>