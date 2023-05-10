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
    <div class="container mt-3">
        <div class="card">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-2" style="position:relative;height:600px;">
                        <h4>BYTECART</h4>
                        <ul>
                            <li><a href="{{route('dashbord')}}" class="text-decoration-none text-dark">Dashbord</a></li>
                            @if (auth()->user()->role_id ==1)
                                
                            
                            <li><a href="{{route('users')}}" class="text-decoration-none text-dark">Users</a></li>
                            <li><a href="{{route('categories')}}" class="text-decoration-none text-dark">Categories</a></li>
                            @endif
                            <li><a href="{{route('products')}}" class="text-decoration-none text-dark">Products</a></li>
                            
                        </ul>
                        <div style="position:absolute;bottom:5px;">
                            <ul>
                                <li><a href="{{{route('logout')}}}" onclick="return confirm('Are you sure you want to logout ?')" class="text-decoration-none text-dark">Logout</a></li>
                            </ul>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-10 bg-white pt-4" style="height:600px;">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if (session()->has('danger'))
                            <div class="alert alert-danger">{{session('danger')}}</div>
                        @endif
                        @yield('content')
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>