@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))

        <h2 class="bg-danger">{{session('deleted_user')}}</h2>
    @endif

    <h2>Users</h2>


    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>

        @if($users)
            @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height="50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="Photo"></td>
                        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>

                        <td>
                            @if($user->role)
                                {{ $user->role->name }}
                            @else
                                User has no role
                            @endif
                        </td>



{{--                        <td>{{$user->role->name}}</td>--}}
                        <td>{{$user->is_active == 1 ?'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                </tbody>
            @endforeach

        @endif
    </table>

@stop