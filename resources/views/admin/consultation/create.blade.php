@extends('layouts.admin')

@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add Consultation</h5>
                            <p class="m-b-0">This is the consultation creation page</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('consultations.index') }}"><i class="ti-calendar"></i> Consultations List</a></li>
                            <li class="breadcrumb-item"><i class="fa fa-plus"></i> Add Consultation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Consultation</h5>
                            <div class="card-header-right">
                                <a href="{{ route('consultation.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Consultation List</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('consultation.store') }}" method="POST" class="form-material">
                                @csrf
                                <div class="form-group form-default">
                                    <input type="text" name="topic" class="form-control" value="{{ old('topic') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Topic</label>
                                    @error('topic')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-default">
                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Description</label>
                                    @error('description')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-default">
                                    <input type="datetime-local" name="scheduled_at" class="form-control" value="{{ old('scheduled_at') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Scheduled At</label>
                                    @error('scheduled_at')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Submit</button>
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
