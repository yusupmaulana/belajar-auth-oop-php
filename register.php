<?php
  require_once "core/init.php";

  if( $user->is_loggedIn() )
  {
    // header('Location: profile.php');
    Redirect::to('profile');
  }

  $errors = array();

  if ( Input::get('submit') ){
    if( Token::check( Input::get('token') )){
    // 1 .memanggil objek validation
      $validation = new Validation();

    //2. metode check()
      $validation = $validation->check(array(
        'username' => array(
                        'required' => true,
                        'min'      => 3,
                        'max'      => 50,
                      ),
        'password' => array(
                        'required' => true,
                        'min'      => 3,
                      ),
        'password_verify' => array(
                        'required' => true,
                        'match' => 'password'
                      )
      ));

      if( $user->cek_nama( Input::get('username')) ){
        $errors[] = 'nama sudah terdaftar';
      }else{
        //3. lolos ujian
        if ( $validation->passed() ){

        // die( Input::get('username') );
        $user->register_user(array(
          'username' => Input::get('username'),
          'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
        ));

        Session::flash('profile', 'selamat! anda berhasil mendaftar');
        Session::set('username', Input::get('username'));
        // header('Location: profile.php');
        Redirect::to('profile');

        }else {
          // die('ada masalah');
          $errors = $validation->errors();
        }
      }
    }//end of token
}//end of submit




require_once "templates/header.php";
?>

<h2>Daftar Disini</h2>
<form action="" method="post">
  <label>Username</label>
  <input type="text" name="username"><br>

  <label>Password</label>
  <input type="password" name="password"><br>

  <label>Ulangi Password</label>
  <input type="password" name="password_verify"><br>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

  <input type="submit" name="submit" value="Daftar Sekarang">

  <?php if( !empty($errors) ) {?>
    <div class="errors">
      <?php foreach ($errors as $error) { ?>
          <li><?=$error;?></li>
      <?php } ?>
    </div>
  <?php } ?>
</form>



<?php require_once "templates/footer.php"; ?>
