<?php
include('scripts/database.php');

if ( isset($_POST['username']) ) {
  // start the session
  $link = connect();
  // get the user details
  $user_data = get_user($link, $_POST['username']);
  // hash the submitted password
  $hashed_password = sha1( $_POST['password'] . $user_data['salt'] );
  // check the password matches
  if ($hashed_password === $user_data['pass']) {
    $_SESSION['user'] = $user_data;
    header('location: index.php');
  } else {
    echo "password was wrong";
  }
  $link->close();
}
?>
