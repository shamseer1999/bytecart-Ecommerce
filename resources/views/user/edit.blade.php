@extends('layouts.template')
@section('content')
    <h3 class="text-center">Edit User</h3>
    <form action="" method="post" onsubmit="return check()">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{$edit_data->name}}" required>
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">--SELECT--</option>
                @if (!empty($roles))
                    @foreach ($roles as $item)
                        <option value="{{$item->id}}" {{$item->id == $edit_data->role_id ? 'selected' :''}}>{{$item->role_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group mt-1">
            <input type="submit" name="submit" class="btn btn-primary" value="Edit User">
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
    if($("#role").val() =="")
    {
    alert('Please choose a role');
    return false;
    }
    }
    </script>
@endsection
                        