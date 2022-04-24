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
                <h1> {{ !isset($post) ? "Create New Post" : "Edit Post"; }}</h1>
            </div>
            <div class="card-body">
                @include('partials.errors')
                <form class="form" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                        <br>
                        @if(isset($post))
                        @method("PUT")
                        @endif
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" value="{{ isset($post) ? $post->title : '' }}">
                    </div><br>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" cols="5" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
                    </div><br>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input id="content" type="hidden" name="content" value="{{ isset($post->content)? $post->content: ''}}">
                    <trix-editor input="content"></trix-editor>
                    </div><br>
                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input id='published_at' name="published_at" type="text" class="form-control" value="{{ isset($post) ? $post->published_at : '' }}">
                    </div>
                    <br>
                    @if(isset($post))
                    <div>
                        <img src="{{ asset('/storage/' .$post->image) }}" alt='{{ $post->title }}' width="300" height="400">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input name="image" type="file" class="form-control" value="{{ isset($post) ? $post->image : '' }}">
                    </div>
                    <br>
                    <div class="form-group">
                       <label for="category">Category</label>
                       <select name="category" id="category" class="form-control">
                           @foreach($categories as $category)
                           <option value="{{ $category->id }}"
                                   @if(isset($post))
                                        @if($category->id === $post->category_id)
                                        selected
                                        @endif
                                   @endif
                                   >
                               {{ $category->name }}
                           </option>
                           @endforeach
                       </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        @if( $tags->count() > 0)
                            <select class="form-control tags_selector" id="tags" name="tags[]" multiple="multiple">
                                @foreach( $tags as $tag)
                                <option style="color: red;" value="{{ $tag->id }}"
                                        @if(isset($post))
                                            @if( $post->hasTag($tag->id))
                                              selected
                                            @endif
                                          @endif
                                          >
                                       {{ $tag->name }}
                                   </option>
                                @endforeach
                            </select>
                        @else
                        <div class="alert alert-warning">No Tags Yet</div>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit"  class="btn btn-info  float-end">
                            {{ !isset($post) ? "Create Post" : "Edit Post"; }}
                        </button>
                    </div>
                </form>
                
            </div>
            <div class="card-footer">
            </div>
        </div>
    </x-slot>


<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script>
flatpickr("#published_at", {
    enableTime: true
});

window.addEventListener('load', function() {
    $(document).ready(function() {
    $('.tags_selector').select2();
});
})
</script>
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

</x-app-layout>




