<!-- 1900187 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">OGC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  <?php
    
    if (isset($is_index)) {
      echo "<div class='nav navbar-nav ml-auto'>
              <form class='form-inline my-2 my-lg-0' method='GET'> 
                <input name='search'class='form-control mr-sm-2' type='search' placeholder='Search'>
                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
              </form>
            </div>";
    }

  ?>

  <ul class="nav navbar-nav ml-auto">
    <?php
    
      if (isset($_SESSION['user']) ) {
        $user_menu = "<li class='nav-item dropdown'>
                  <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>".$_SESSION['user']['uname']."</a>
                  <div class='dropdown-menu dropdown-menu-right'>
                      <a href='bookmarks.php' class='dropdown-item'>Bookmarks</a>";

        if ($_SESSION['user']['is_admin']){
          $user_menu =  $user_menu . "<a href='new_game.php' class='dropdown-item'>Create Game</a>";
        }
        $user_menu = $user_menu . "<div class='dropdown-divider'></div>
                      <a href='logout.php'class='dropdown-item'>Logout</a>
                  </div>
              </li>";

        echo $user_menu;
      } else {
        echo "<a href='login.php'>Login</a>";
      }
    
    ?>
  </ul>
</nav>