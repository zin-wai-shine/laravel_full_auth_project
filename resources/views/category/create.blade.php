@extends('layouts.app')
@section('title') Create Category @endsection
@section('content')

    <div class="card shadow-lg p-2">

        <div class="card-header text-white border-white">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route("home") }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route("category.index") }}" class="text-decoration-none">Categories List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                </ol>
            </nav>
        </div>

        <div class="card-body bg-dark rounded">
            <div class="w-50 p-5">
                <form action="{{route("category.store")}}" method="post" >
                    @csrf
                    <label for="" class="text-white mb-3 h5">Create New Category</label>
                    <div class="d-flex align-content-center">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old
                        ('title')}}">
                        <button class="btn btn-primary mx-2"><i class="fa fa-plus-circle"></i></button>
                    </div>
                    @error('title')
                        <small class="fw-bold text-danger">{{$message}}</small>
                    @enderror
                </form>
            </div>
        </div>
    </div>

@endsection
