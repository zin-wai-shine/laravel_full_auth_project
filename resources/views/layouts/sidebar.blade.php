<div class="container-fluid">
    <div class="card p-2">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body bg-dark rounded">

            <div class="">
                <h5>Normall Page</h5>
                <div class="w-100 bg-white text-white p-2 rounded text-center sidebarList__container">
                    <a href="{{route("home")}}" class="text-decoration-none text-primary">
                        <i class="fa fa-home sidebar__icon"></i>
                        Home
                    </a>
                </div>
                <br>
                <div class="w-100 bg-white text-white p-2 rounded text-center sidebarList__container">
                    <a href="" class="text-decoration-none text-primary">
                        <i class="fa fa-file sidebar__icon"></i>
                        File Upload
                    </a>
                </div>
            </div>
            <hr>
            <div class="my-3">
                <h5>Manage Category</h5>
                <div class="w-100 bg-white text-white p-2 rounded text-center sidebarList__container">
                    <a href="{{route("category.index")}}" class="text-decoration-none text-primary">
                        <i class="fa fa-layer-group sidebar__icon"></i>
                        Categories List
                    </a>
                </div>
                <br>
                <div class="w-100 bg-white  text-white p-2 rounded text-center sidebarList__container">
                    <a href="{{ route('category.create') }}" class="text-decoration-none text-primary">
                        <i class="fa fa-plus-circle sidebar__icon"></i>
                        Create Category
                    </a>
                </div>
            </div>
            <hr>
            <div class="">
                <h5>Manage Post</h5>
                <div class="w-100 bg-white  p-2 rounded text-center sidebarList__container">
                    <a href="{{route('post.index')}}" class="text-decoration-none text-primary">
                        <i class="fa fa-layer-group sidebar__icon"></i>
                        Posts List
                    </a>
                </div>
                <br>
                <div class="w-100 bg-white p-2 rounded text-center sidebarList__container">
                    <a href="{{route('post.create')}}" class="text-decoration-none text-primary">
                        <i class="fa fa-plus-circle sidebar__icon"></i>
                        Create Post
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
