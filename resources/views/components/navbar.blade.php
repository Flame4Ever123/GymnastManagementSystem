<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('home') }}" class="nav-link">Home</a>
    </li>
  </ul>



  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <form id="logout-form" action="/logout" method="POST">
      @csrf
      <button type="submit"  class="btn  btn-default btn-block">Logout <i class="fa fa-arrow-right"></i></button>
    </form>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>