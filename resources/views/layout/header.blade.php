<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      @guest
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <span class="fs-4" style="color: Mediumslateblue;"> <i class="fas fa-list-alt"></i> WebApps</span>
        </a>
      
        <a href="{{ route('index')}}" type="button" class="btn btn-primary me-2"> Login </i> </a>
        <a href="{{ route('register')}}" type="button" class="btn btn-success"> Register </i> </a>
      @else
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <span class="fs-4" style="color: Mediumslateblue;"> <i class="fas fa-list-alt"></i> WebApps</span>

          <div class="ms-3">
            @if(auth()->user()->is_subscription === 0)
              <h3> <span class="badge bg-warning mt-1">Free</span></h3>
            @else
              <h3> <span class="badge bg-primary mt-1">Premium</span></h3>
            @endif
          </div>
        </a>
      
        <h5 class="mt-3 me-2" >{{ auth()->user()->name}}</h5>
        <a href="{{ route('signOut')}}" type="button" class="btn btn-danger"> <i class="fas fa-sign-out-alt mt-2"></i> </a>
      @endguest
    </header>
</div>
