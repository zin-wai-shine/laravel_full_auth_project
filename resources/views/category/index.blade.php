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
                            @forelse($categories as $category)
                                <tr class="align-middle text-center">
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <h6>{{ $category->title }}</h6>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <small class="badge bg-warning text-dark">Slug : {{$category->slug}}</small>
                                            <small class="mx-2 badge bg-success">
                                                User : {{ \App\Models\User::find($category->id)->name }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm
                                        btn-outline-info"><i
                                                class="fa
                                        fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <div class=""><i class="fa fa-calendar text-danger"></i> {{
                                            $category->created_at->format
                                            ('d / m / y')}}
                                        </div>
                                        <div class=""><i class="fa fa-clock text-warning"></i> {{
                                            $category->created_at->format
                                            ('h:i A')}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="4">
                                    <h5>There is no category . . . . . . .</h5>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $categories->onEachSide(1)->links() }}
                    </div>
            </div>
        </div>
    </div>

@endsection
