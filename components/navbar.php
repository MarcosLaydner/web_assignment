<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php">OGC</a>


  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Find a game" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  <?php
  
  // if logged-in display name, if not, prompt to login
  if (isset($_SESSION['user']) ) {
    echo "<a href=\"".$_SESSION['user']['uname']."\">".$_SESSION['user']['uname']."</a>";
  } else {
    echo "<a href='login.php'>Login</a>";
  }
  ?>

</nav>