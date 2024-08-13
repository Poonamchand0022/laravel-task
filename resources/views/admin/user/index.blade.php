@extends('layouts.admin')

@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">User List</h5>
                            <p class="m-b-0">This is user list page</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @if (Session::has('success'))
                <div style="background-color: green; color: white; display: block; text-align: center; margin: 10px 0; padding: 10px;">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>

        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>User List</h5>
                                <div class="card-header-right">
                                    <b><a href="{{ route('user.create') }}"><i class="fa fa-user-plus"></i> User Add</a></b>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="button-page btn"
                                                            style="background-color: #007bff; color: white; display: inline-block"><i class="fa fa-pencil"></i> Edit</a>

                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="button-page btn" style="background-color: #dc3545; color: white;"><i class="fa fa-trash-o"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
            <!-- Main-body end -->
        </div>
    </div>
@endsection