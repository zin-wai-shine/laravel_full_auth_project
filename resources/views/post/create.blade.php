@extends('layouts.app')
@section('title') Create Post @endsection

@section('content')

    <div class="card p-2">
        <div class="card-header">
            Create Post
        </div>
        <div class="card-body bg-dark text-white rounded">
            <div>
                <form action="{{route('post.store')}}" method="post">
                    @csrf

                    <div class="row gap-0">
                        <div class="form-group col">
                            <label for="" class="form-label">Title</label>
                            <input type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   placeholder="Title"
                                   value="{{ old('title') }}"
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

                                            <option class="p-3" {{ $cateogry->id == \App\Models\Post::find($cateogry->id)->id ?
                                            "seleted" : "" }}
                                            value="{{$cateogry->id}}">{{$cateogry->title}}</option>

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
                            {{old('description')}}

                        </textarea>
                        @error('description')
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

                    <button class="btn btn-primary mt-4">Create Post <i class="fa fa-plus-circle mx-2"></i></button>
                </form>
            </div>
        </div>
    </div>

@endsection
