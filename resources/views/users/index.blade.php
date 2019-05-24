@extends('users.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
                    Create User
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr id="row_{{ $user->id }}" data-id="{{ $user->id }}" class="data-row">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <form method="post" role="form">
                            <button type="button" id="show-item" class="btn btn-info" data-toggle="modal"
                                    data-target="#show-modal" data-id="{{$user->id}}" data-myname="{{$user->name}}"
                                    data-email="{{$user->email}}" data-phone="{{$user->phone}}" data-address="{{$user->address}}" data-role="{{$user->role}}">
                                Show
                            </button>
                            <button type="button" id="edit-item" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-modal" data-id="{{$user->id}}" data-myname="{{$user->name}}"
                                    data-email="{{$user->email}}" data-phone="{{$user->phone}}" data-address="{{$user->address}}" data-role="{{$user->role}}">
                                Edit
                            </button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="dalete-user" id="delete" value="{{$user->id}}">
                            <button type="button" id="delete-user" class="btn btn-danger delete" value="{{$user->id}}" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{$users->links()}}
    @include('users.create')
    @include('users.edit')
    @include('users.show')
@endsection