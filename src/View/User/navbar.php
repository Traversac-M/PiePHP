<nav class="navbar navbar-icon-top navbar-expand-lg navbar-items bg-dark">
  <a class="navbar-brand" href="/PiePHP/home"><img src="/PiePHP/webroot/assets/logo.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/PiePHP/home">
          <i class="fa fa-home"></i>
          Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/PiePHP/movies">
          <i class="fa fa-film">
          </i>
          Movies
        </a>
      </li>
      <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/PiePHP/user/show">
            <i class="fa fa-user">
            </i>
            Profile
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/PiePHP/user/logout">
            <i class="fa fa-sign-out">
            </i>
            Logout
          </a>
        </li>
      <?php   } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="/PiePHP/register" title="Click to login">
            <i class="fa fa-user"></i>
            Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/PiePHP/login" title="Click to login">
            <i class="fa fa-sign-in  "></i>
            Login
          </a>
        </li>
    <?php } ?>
  </ul>
  <form class="form-inline my-2 my-lg-0" method="POST" action="/PiePHP/movies">
    <input class="form-control mr-sm-2" type="text" name="searchFilm" placeholder="Search a movie" aria-label="Search">
    <button class="btn btn-outline-primary my-2 my-sm-0" name="showSubmit" type="submit">Search</button>
  </form>
</div>
</nav>