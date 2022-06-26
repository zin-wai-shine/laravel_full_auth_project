@extends('layouts.app')
@section('title') Create Post @endsection

@section('content')

    <div class="card p-2 p-2 border-warning border-3 ">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route("home") }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}" class="text-decoration-none">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                </ol>
            </nav>
        </div>
        <div class="card-body bg-dark rounded">
            <div>
                <form action="{{route('post.update',$post->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row gap-0">
                        <div class="form-group col">
                            <label for="" class="form-label">Title</label>
                            <input type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   placeholder="Title"
                                   value="{{ old('title',$post->title) }}"
                            >
                            @error('title')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="" class="form-control form-select  @error('category')
                                is-invalid @enderror">
                                <option value="">Choose Category</option>

                                @forelse(\App\Models\Category::all()  as $cateogry)

                                    <option
                                        class="p-3"
                                        {{ $cateogry->id == old('category',$post->category_id) ?"selected" :
                                        "" }}
                                        value="{{$cateogry->id}}">{{$cateogry->title}}
                                    </option>

                                @empty

                                    <option  value="">There is now Category</option>

                                @endforelse
                            </select>
                            @error('category')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="" class="form-label">Descriptoin</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  id="" cols="30"
                                  rows="10"
                                  placeholder="Description">
                        {{ old('description',$post->description) }}
                        </textarea>
                        @error('category')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="" class="form-label">Upload File</label>
                            <input type="file" name="featured_image" class="form-control @error('featured_image')
                                is-invalid
                                @enderror">
                            @error('featured_image')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary mt-4">Update Post <i class="fa fa-arrow-turn-right
                    mx-2"></i></button>
                </form>
            </div>
        </div>
    </div>

@endsection
