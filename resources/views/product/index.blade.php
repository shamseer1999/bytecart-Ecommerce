@extends('layouts.template')
@section('content')
    <div class="card p-1">

        <div class="card-header">
        <h5 class="">Products List</h5>
        <a href="{{route('product.add')}}" class="btn btn-primary" style="float:right;margin-top:-35px;">Add Product</a>
        </div>
        <div class="card-body">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($results))
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$results->firstItem()+$loop->index}}</td>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->categories->category_name}}</td>
                                <td>
                                        <a href="{{route('product.edit',encrypt($item->id))}}" class="btn btn-sm btn-primary" >Edit</a>
                                        <a href="{{route('product.delete',encrypt($item->id))}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product ?')">Delete</a>
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
