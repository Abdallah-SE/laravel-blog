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
            <div class="me-auto p-2 bd-highlight text-xl">Categories</div>
            <div class="p-2 bd-highlight">
                <a href="{{ route('categories.create')}} " class="btn btn-info">
                    Create Category
                </a>
            </div>
          </div>
        
        @if($categories->count() > 0)
        <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Posts Count</th>
        <th class="float-end">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
      <tr class="success">
        <td>{{ $category->name}} </td>
        <td>{{ $category->posts->count()}}</td>
        <td>
           <a  class="btn btn-danger btn-sm float-end" class="float-sm-right"
                                onclick="handleDelete({{ $category->id }})" style="margin-left: 7px;"
                                class="btn btn-primary" data-bs-toggle="modal" 
                                data-bs-target="#deleteModal">
                       Delete
                       </a>
                       <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm float-end" class="float-end">
                       Edit
                       </a> 
        </td>
      </tr>  
      @endforeach
    </tbody>
  </table>
        @else
        <p class="alert alert-warning"> The categories are empty</p>
        @endif
         
    </x-slot>
  
    
    <form action="" method="POST" id="deleteCategoryForm">
        @csrf
        @method('delete')
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p class="text-center">
                      Are you sure you want to delete this category.
                  </p>
              </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-danger" style="background-color: red;">Delete Category</button>
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
