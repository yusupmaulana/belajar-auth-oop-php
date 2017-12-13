<?php
  require_once "core/init.php";
  if( !$user->is_loggedIn() )
  {
    Session::flash('login', 'anda harus login terlebih dahulu');
    // header('Location: login.php');
    Redirect::to('login');
  }

  if( !$user->is_admin(Session::get('username')) ){
    Session::flash('profile', 'halaman ini khusus admin');
    Redirect::to('profile');
  }

  $users = $user->get_users();

  require_once "templates/header.php";
 ?>

<h2>Halaman Admin</h2>
<?php foreach ($users as $_user) { ?>
  <div class="">
    <a href="profile.php?nama=<?php echo $_user['username'] ?>">
      <?php echo $_user['username'] ?>
    </a>
  </div>
<?php } ?>

<?php require_once "templates/footer.php"; ?>
