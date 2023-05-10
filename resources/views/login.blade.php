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
                <div class="row justify-content-center">
                    <div class="col-md-8 border">
                        <h3 class="text-center">Login</h3>
                        <form action="" method="post">
                            @csrf
                            @if (session()->has('danger'))
                                <div class="alert alert-danger">{{session('danger')}}</div>                                
                            @endif
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group mt-1">
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>