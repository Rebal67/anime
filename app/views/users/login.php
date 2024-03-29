
<?php $styles = ['login']; require APPROOT . "/views/fragments/header.php"; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <?php flash("register_success"); ?>
      <h2>Log in</h2>
      <p>Please fill out this form to register</p>
      <form action="<?php echo URLROOT; ?>/users/login" method="POST">

        <div class="form-group">
          <label for="email">Email <sup>*</sup></label>
          <input type="text" name="email" class="form-control form-controllg <?php echo (!empty($data['email_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">password <sup>*</sup></label>
          <input type="password" name="password" class="form-control formcontrol-lg <?php echo (!empty($data['password_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo  $data['password_error']; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? </a>
          </div>
          <div class="col">
            <input type="submit" value="Sign in" class="btn btn-success btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . "/views/fragments/footer.php"; ?>