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
        <div class="card">
            <div class="card-header">
                <h1> {{ !isset($tag) ? "Create New Tag" : "Edit Tag"; }}</h1>
            </div>
            <div class="card-body">
                @include('partials.errors')
                <form class="form" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                   @csrf
                        <br>
                        @if(isset($tag))
                        @method("PUT")
                        @endif
                    
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input name="name" type="text" class="form-control" value="{{ isset($tag) ? $tag->name : '' }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit"  class="btn btn-info  float-end">
                            {{ !isset($tag) ? "Create Tag" : "Edit Tag"; }}
                        </button>
                    </div>
                </form>
                
            </div>
            <div class="card-footer">
            </div>
        </div>
    </x-slot>

    
</x-app-layout>
