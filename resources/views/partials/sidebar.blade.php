<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

      <h6 class="sidebar-title">Search</h6>
      <form class="input-group" action="" method="GET">
          <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->query('search') }}">
        <div class="input-group-addon">
            <span class="input-group-text">
                <button type="submit" class="btn btn-sm btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </span>
        </div>
          
      </form>

      <hr>

      <h6 class="sidebar-title">Categories</h6>
      <div class="row link-color-default fs-14 lh-24">
          @foreach($categories as $category)
          <div class="col-6"><a href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a></div>
          @endforeach
      </div>
      
      
      
      <br>
      <hr>
      <br>
      <hr>
<br>
      <h6 class="sidebar-title">Tags</h6>
      <div class="gap-multiline-items-1">
          @foreach($tags as $tag)
          <a class="badge badge-secondary" href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a>
          @endforeach

      </div> <br>
      <hr>
           <br>
      <h6 class="sidebar-title">About</h6>
      <p class="small-3">
          I'm Software Developer who specialises in the design, 
          testing and implementation of software using the PHP programming language and other front end technologies!
      </p>
      <div class="col-6 col-lg-3 text-right order-lg-last text-danger">
        <div class="social">
          <a class="" href="https://github.com/Abdallah-SE">
              My GitHub
          </a>
        </div>
      </div>

    </div>
  </div>