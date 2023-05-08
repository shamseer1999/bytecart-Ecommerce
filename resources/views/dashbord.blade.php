@extends('layouts.template')
@section('content')
<div class="row mt-2">
    <div class="col-lg-3">
        <div class="card p-2">
            <h4 class="text-center">{{$userCount}}</h4>
           
           <div class="card-header">
            <h5 class="text-center"><a href="{{route('users')}}" class="text-decoration-none text-dark">Users &rarr;</a></h5>
           </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card p-2">
            <h4 class="text-center">{{$categoryCount}}</h4>
           
           <div class="card-header">
            <h5 class="text-center"><a href="{{route('categories')}}" class="text-decoration-none text-dark">Categories &rarr;</a></h5>
           </div>
        </div>
    </div>
</div>
    
@endsection