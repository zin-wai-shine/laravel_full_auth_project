@extends('layouts.app')
@section('title') Categories List @endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route("home") }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("post.index")}}" class="text-decoration-none">Posts
                            List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post By {{ \App\Models\User::find($post->user_id)->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h6>Post By :: {{$post->title}}</h6>
                        </div>
                        <div class="card-body">
                            <div>
                                <h4 class="mb-0">{{ $post->title }}</h4>

                                <div class="my-3">
                                    <div class="badge bg-secondary">{{ \App\Models\User::find($post->user_id)->name }}</div>
                                    <div class="badge bg-success">
                                        {{ \App\Models\Category::find($post->category_id)->title}}
                                    </div>
                                    <div class="badge bg-warning">
                                        <i class="fa fa-calendar"></i> {{ $post->created_at->format('D / M / Y ') }}
                                    </div>
                                    <div class="badge bg-danger">
                                        <i class="fa fa-clock"></i> {{ $post->created_at->format('h : i A ') }}
                                    </div>
                                </div>

                                <p>{{ $post->description }}</p>
                            </div>
                            <div>
                                <form action="{{route('post.destroy',$post->id)}}"  class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
