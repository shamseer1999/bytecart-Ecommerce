@extends('layouts.template')
@section('content')
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post" onsubmit="return check()">
        @csrf
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$edit_data->category_name}}" required>
        </div>
        <div class="form-group mt-1">
            <input type="submit" name="submit" class="btn btn-primary" value="Edit Category">
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script>
    function check()
    {
    if($("#name").val() =="")
    {
        alert('Please fill your name');
        return false;
    }
    }
    </script>
@endsection
                        