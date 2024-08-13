@extends('layouts.admin')

@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">User Edit</h5>
                            <p class="m-b-0">This is user add page</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="ti-user"></i> User
                                    List</a>
                            </li>
                            <li class="breadcrumb-item"><i class="fas fa-user-edit"></i> User Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>User Edit</h5>
                            <div class="card-header-right">
                                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to User List</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-material">
                                @csrf
                                @method('PUT')
                                <div class="form-group form-default">
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Name</label>
                                    @error('name')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email</label>
                                    @error('email')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-default">
                                    <input type="password" name="password" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection