@extends('layouts.template')
@section('content')
    <div class="card p-1">

        <div class="card-header">
        <h5 class="">Users List</h5>
        <a href="{{route('user.add')}}" class="btn btn-primary" style="float:right;margin-top:-35px;">Add User</a>
        </div>
        <div class="card-body">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($results))
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$results->firstItem()+$loop->index}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->roles->role_name}}</td>
                                <td>
                                    @if ($item->status ==1)
                                        {{"Active"}}
                                        @elseif($item->status ==2)
                                        {{"Inactive"}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.edit',encrypt($item->id))}}" class="btn btn-sm btn-primary" >Edit</a>
                                    @if ($item->status ==1)
                                        <a href="{{route('user.disable',encrypt($item->id))}}" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to disable this user ?')">Disable</a>
                                    @elseif($item->status ==2)
                                        <a href="{{route('user.enable',encrypt($item->id))}}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to enable this user ?')">Enable</a>
                                    @endif
                                        
                                        <a href="{{route('user.delete',encrypt($item->id))}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
        </div>
    </div>
@endsection
