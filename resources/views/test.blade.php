<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>test img</h1>
    <div>
        @php
            $prod = App\Product::where('id', 121)->first();
            $url1 = $prod->getMedia()[0]->getUrl();
            $url2 = $prod->getMedia()[1]->getUrl();
        @endphp
        <img src="{{ $url1 }}" alt="">
        <img src="{{ $url2 }}" alt="">
    </div>



</body>
</html>
