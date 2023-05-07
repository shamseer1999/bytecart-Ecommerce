@extends('layouts.template')
@section('content')
<div class="row mt-2">
    <div class="col-md-3">
        <div class="card">
            <h4 class="text-center">{{$userCount}}</h4>
           
           <div class="card-header">
            <h5 class="text-center"><a href="{{route('users')}}" class="text-decoration-none text-dark">Users &rarr;</h5>
           </div>
        </div>
    </div>
</div>
    
@endsection