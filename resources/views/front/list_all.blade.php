<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BYTECART</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            @if (!empty($results))
                @foreach ($results as $item)
                    <P><B>{{$item->category_name}}</B></P>
                    @if (!empty($item->activeProducts))
                        @foreach ($item->activeProducts as $products)
                            <div class="col-md-3">
                                <div class="card p-2 bg-light" style="width:15rem;">
                                    @if (!empty($products->image))
                                        <img src="{{asset('storage/'.$products->image)}}" alt="">
                                    @endif
                                    
                                   <span class="text-center">{{$products->product_name}}</span>
                                </div>
                            </div>
                            
                            
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
        
    </div>
</body>
</html>