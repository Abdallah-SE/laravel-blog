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
            <div class="me-auto p-2 bd-highlight text-xl">Users</div>
            
          </div>
        <div class="card-body text-primary">
                <table class="table table-info">
                    <thead>
                  <tr  class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                @php
                    $counter = 0;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <th scope="row"><img style="border-radius: 50%;" src="{{ Gravatar::get($user->email, ['size'=>35]);  }}"></th>
                      <td>
                          {{ $user->name }}
                      </td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <td>  
                          @if(!$user->isAdmin())
                          <form class="" action="{{ route('usres.make-admin', $user->id) }}"
                                         method="POST">
                              @csrf
                              <button style="background-color: purple;" type="submit" class="btn btn-success btn-sm">Make Admin</button>
                          </form>
                          @endif
                          
                      </td>
                    </tr>
                @endforeach
                </tbody>
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
        deleteForm.action = '/users/' + id;
        $('#deleteModal').modal('show');
    }
    </script>
</x-app-layout>
