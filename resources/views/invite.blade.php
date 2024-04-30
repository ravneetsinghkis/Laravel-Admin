@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                    <form method="POST" action="{{ route('invite.send_invite') }}">
                        @csrf
                    <div class="col-md-12">
                        <label for="email" class="form-label">Enter Invite Email address</label>
                        <input class="form-control" type="email" name="email_id" value="" placeholder="john.doe@example.com" required>
                        <div class="invalid-tooltip"></div>
                    </div>
                    <div class="mt-2 " style="margin-left: 20px;">
                        <button type="submit" class=" btn btn-primary me-2">Send Invite Url</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection