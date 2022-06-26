@extends('layouts.app')
@section('title') Categories List @endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route("home") }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Create Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories list</li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <div>

                @if(session('status'))

                @endif

                <div class="d-flex {{request('keyword') ? "justify-content-between " : "justify-content-end"
                }} align-items-center">
                    @if(request('keyword'))
                        <div class="d-flex">
                            <h5 class="m-0"><i class="fa fa-search"></i> Search By : "{{ request('keyword') }}"</h5>
                            <a href="{{route("post.index")}}" class="mx-3 badge bg-secondary m-0
                            text-decoration-none"><i class="fa fa-backward"></i> All Posts</a>
                        </div>
                    @endif
                    <div class="mb-2 w-25 ">
                        <form action="{{route('post.index')}}" method="get" class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search ...." >
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <table class="table table-dark table-striped table-hover shadow-lg">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Categories</th>
                        <th>Controller</th>
                        <th>Date and Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr class="align-middle text-center">
                            <td>{{ $post->id }}</td>
                            <td>
                                <h6>{{ $post->title }}</h6>
                                <div class="d-flex justify-content-center align-items-center">
                                    <small class="badge bg-warning text-dark">Category :
                                        {{\App\Models\Category::find($post->category_id)->title}}</small>
                                    <small class="mx-2 badge bg-success">
                                        User : {{ \App\Models\User::find($post->user_id)->name }}
                                    </small>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm
                                        btn-outline-success"><i
                                        class="fa
                                        fa-info-circle"></i>
                                </a>
                                <form action="{{ route('post.destroy',$post->id) }}" method="post"
                                      class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm
                                        btn-outline-info"><i
                                        class="fa
                                        fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <div class=""><i class="fa fa-calendar text-danger"></i> {{
                                            $post->created_at->format
                                            ('d / m / y')}}
                                </div>
                                <div class=""><i class="fa fa-clock text-warning"></i> {{
                                            $post->created_at->format
                                            ('h:i A')}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td class="text-center" colspan="4">
                            <h5>There is no post . . . . . . .</h5>
                        </td>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
