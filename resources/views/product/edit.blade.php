@extends('layouts.template')
@section('content')
    <h3 class="text-center">Edit Product</h3>
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
            <label for="">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$edit_data->product_name}}" required>
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">--SELECT--</option>
                @if (!empty($categories))
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}" {{$item->id == $edit_data->category_id ? 'selected' :''}}>{{$item->category_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group mt-1">
            <input type="submit" name="submit" class="btn btn-primary" value="Edit Product">
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
    if($("#category").val() =="")
    {
        alert('choose a category');
    }
    }
    </script>
@endsection
                        