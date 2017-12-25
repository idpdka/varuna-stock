<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Stock Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if (Auth::check())
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link">Hi, {{ $user['name'] }}
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <form method="post" id="logout-form" action="{{ url('logout') }}">
              {{ csrf_field() }}
              <a class="nav-link" id="logout-btn">Logout</a>
            </form>
          </li>
        </ul>
      </div>
    @endif
  </div>
</nav>

<script>
  $('#logout-btn').click(function() {
    $('#logout-form').submit();
  });
</script>