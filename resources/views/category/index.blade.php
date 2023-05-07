@extends('layouts.template')
@section('content')
    <div class="card p-1">

        <div class="card-header">
        <h5 class="">Categories List</h5>
        <a href="{{route('category.add')}}" class="btn btn-primary" style="float:right;margin-top:-35px;">Add Category</a>
        </div>
        <div class="card-body">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($results))
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$results->firstItem()+$loop->index}}</td>
                                <td>{{$item->category_name}}</td>
                                <td>
                                        <a href="{{route('category.edit',encrypt($item->id))}}" class="btn btn-sm btn-primary" >Edit</a>
                                        <a href="{{route('category.delete',encrypt($item->id))}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
              {{$results->links()}}
        </div>
    </div>
@endsection
