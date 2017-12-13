<?php
  require_once "core/init.php";

  if( $user->is_loggedIn() )
  {
    // header('Location: profile.php');
    Redirect::to('profile');
  }

  if( Session::exists('login')){
    echo Session::flash('login');
  }


  $errors = array();

  if ( Input::get('submit') ){
    if( Token::check( Input::get('token') )){
      // 1 .memanggil objek validation
        $validation = new Validation();

      //2. metode check()
        $validation = $validation->check(array(
          'username' => array( 'required' => true ),
          'password' => array( 'required' => true )
        ));

      //3. lolos ujian
      if ( $validation->passed() ){

      // die( Input::get('username') );
        if( $user->cek_nama( Input::get('username') ) ){
          if( $user->login_user( Input::get('username'), Input::get('password') )){
            Session::set('username', Input::get('username'));
            // header('Location: profile.php');
            Redirect::to('profile');
          }else {
            $errors[] = 'password salah';
          }
        }else {
          $errors[] = 'nama belum terdaftar';
        }

      }else {
        // die('ada masalah');
        $errors = $validation->errors();
      }
    }//end of token
}//end of input submit




require_once "templates/header.php";
?>

<h2>Login Disini</h2>
<form action="" method="post">
  <label>Username</label>
  <input type="text" name="username"><br>

  <label>Password</label>
  <input type="password" name="password"><br>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

  <input type="submit" name="submit" value="Login Sekarang">

  <?php if( !empty($errors) ) {?>
    <div class="errors">
      <?php foreach ($errors as $error) { ?>
          <li><?=$error;?></li>
      <?php } ?>
    </div>
  <?php } ?>
  
</form>



<?php require_once "templates/footer.php"; ?>
