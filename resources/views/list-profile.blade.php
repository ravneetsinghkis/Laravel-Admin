@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                <table class="pb-3 table text-left w-full data_table">
                <thead class="bg-gray-800 p text-gray-200 thead-dark">
                    <tr>
                        <th style="width:20%" scope="col">Name</th>
                        <th style="width:30%" scope="col">Email</th>
                        <th style="width:50%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                    @foreach($users as $user)

                    <tr class="border-b">
                        <td style="width:20%">{{$user->name}}</td>
                        <td style="width:30%">{{$user->email}}</td>
                       
                        <td style="width:50%" class="flex"><a class="btn btn-primary btn-sm text-gray-500" href="/users/edit/{{$user->id}}">Edit</a>
                       <form action="{{ route('profile.isapproved', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$user->is_approved==1?$status=1:$status=0}}" name="is_approved">
                                <button type="submit" onclick="return IsuserActive(<?php echo $status; ?>);" class="text-gray-500 btn btn-secondary btn-sm">{{$user->is_approved==1?'Approved':'Not Approved'}}</button>
                        </form>
                        <form action="{{ route('profile.destroy', $user) }}" method="POST">
                        @csrf
                      @method('DELETE')
                                <button type="submit" onclick="return deleletconfig();" class="text-gray-500 btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                    <tr>
                        @endforeach
                        @else
                    <tr class="text-center">
                        <td colspan="5">No Users record found</td>
                    </tr>
                    @endif

                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    // function deleletconfig() {

    //     var del = confirm("Are you sure you want to delete this record?");
    //     if (del == true) {
    //         alert("Driver record deleted successfully")
    //     }
    //     return del;
    // }

    function IsuserActive(status) {
        if (status == 0) {
            var user_status = "Approved";
        } else {
            var user_status = "Not Approved";
        }

        var del = confirm("Are you sure you want to " + user_status + " the user status ?");
        if (del == true) {
            alert("User record status is updated successfully")
        }
        return del;
    }
    function deleletconfig(){
        var del = confirm("Are you sure you want to delete the user account ?");
        if (del == true) {
            alert("User record status is updated successfully")
        }
        return del;
    }
</script>
<style>
    span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5 {
        color: #1f2937;
        font-size: 16px;
        font-weight: bolder;
    }
</style>