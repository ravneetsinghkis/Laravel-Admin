@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
               
                <form method="POST" action="{{ route('profile.update',$user_details->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" value="{{$user_details->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$user_details->email}}" aria-describedby="emailHelp" placeholder="Enter email" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    