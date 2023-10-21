<x-app-layout>
    <x-slot name="header">
        @include('partials/errors')
        <div class="d-flex bd-highlight mb-3">
          <div class="me-auto p-2 bd-highlight text-xl">Update The Profile</div>
         
        </div>
        <div class="card text-primary">
            
            <div class="card card-body">
                <form class="text-center" method="POST" action="{{ route('users.update-profile') }}">
                    @csrf
                    {{method_field('put')}} 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{  $user->name }}">
                    </div><br>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" rows="5" cols="5" class="form-control">{{ $user->about }}</textarea>
                    </div><br>
                    <button style="background-color: #2ca02c" type="submit" class="btn btn-info">Update The Profile</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
