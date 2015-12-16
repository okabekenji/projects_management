<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>

</head>
<body>
<?php $this->load->view('layout/header'); ?>

<div id="page">

  <section class="clearfix" id="Content">

    <h2>案件管理システムログイン</h2>


  <?php if(isset($error) && $error) { ?>
    <div class="flash flash-error">
      <span class="octicon octicon-x flash-close js-flash-close"></span>
      <?php echo $error; ?>
    </div>
  <?php } ?>

    <?php if($this->session->flashdata('error')) { ?>
      <div class="flash flash-error">
        <span class="octicon octicon-x flash-close js-flash-close"></span>
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php } ?>

<?php echo validation_errors('<div class="error flash flash-error">', '</div>'); ?>

<br><br>


    <article id="mainCont">


      <div  class="search">

        <form method="post" accept-charset="utf-8">
          <p><input autocomplete="off" type="email" name="login_identity" value="<?php echo set_value('login_identity'); ?>" id="loginIdentity" autofocus="autofocus" maxlength="100" placeholder="メールアドレス" required></p>
          <p><input autocomplete="off" type="password" name="login_password" id="loginPassword" maxlength="100" placeholder="パスワード" required></p>
          <p><input type="submit" value="ログイン"></p>
        </form>



  <!-- #loginCont --></article>
<!-- #Content --></section>

<!-- #page --></div>


<?php $this->load->view('layout/footer'); ?>

<style>

#main {
  background-image:none;
}


</style>

</body>
</html>
