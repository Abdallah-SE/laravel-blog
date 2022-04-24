<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            <div class="d-flex">
                <div class="p-2">
                    
                </div>
                <div class="m1-auto p-2">
                    
                </div>
            </div>
            
        </h2>
       
          <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight text-xl">Posts</div>
            <div class="p-2 bd-highlight">
                <a href="{{ route('posts.create')}} " class="btn btn-info">
                    Create Post
                </a>
            </div>
          </div>
        <div class="card-body text-primary">
                @if($posts->count() > 0)
                <table class="table table-info">
                    <thead>
                  <tr  class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 0;
                    @endphp
                @foreach($posts as $post)
                
                  <tr>
                    <th scope="row">{{++$counter}}</th>
                    <td>
                        <img src="{{ asset( '/storage/' . $post->image)}}" alt="{{ $post->title}}" width="70" height="70">
                    </td>
                    <td>{{ $post->title}}</td>
                    <td><a href="{{ route('categories.edit', $post->category->id )}}" >{{ $post->category->name }}</a></td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger btn-sm float-end" class="float-sm-none"
                                style="margin-left: 7px;"
                                class="btn btn-primary" data-bs-toggle="modal" 
                                data-bs-target="#deleteModal">
                                {{ $post->trashed() ? 'Delete' : 'Trash'}}
                       </button>
                        </form>
                        @if(!$post->trashed())
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm float-end" class="float-end">
                       Edit
                       </a>
                        @else
                        
                        <form action="{{ route('restore-post', $post->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button  class="btn btn-info btn-sm float-end" class="float-sm-none"
                                style="margin-left: 7px;"
                                class="btn btn-primary" data-bs-toggle="modal" 
                                data-bs-target="#deleteModal">
                                Restore
                       </button>
                        </form>
                        
                        @endif
                         
                    </td>
                  </tr>
                @endforeach
                </tbody>
                @else
                <p class="alert alert-warning"> The posts are empty</p>
                @endif
                </table>
            
        </div>
    </x-slot>
    
    
        
    
    <form action="" method="POST" id="deleteCategoryForm">
        @csrf
        @method('delete')
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p class="text-center">
                      Are you sure you want to delete this category.
                  </p>
              </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-danger" style="background-color: red;">Delete Post</button>
                  <button type="" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
                
            </div>
          </div>
        </div>
    </form>
    <script>
    function handleDelete(id){
        let deleteForm = document.getElementById("deleteCategoryForm");
        deleteForm.action = '/categories/' + id;
        $('#deleteModal').modal('show');
    }
    </script>
</x-app-layout>
