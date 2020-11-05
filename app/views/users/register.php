<?php require APPROOT . "/views/fragments/header.php"; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Registreren</h2>
      <p>Vul aub dit formulier in om te registreren</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="POST">
        <div class="row">

          <div class="form-group col">
            <label for="name">Voornaam <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg
            <?php echo (!empty($data['name_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_error']; ?>
            </span>
          </div>

          <div class="form-group col">
            <label for="last_name">Achternaam <sup>*</sup></label>
            <input type="text" name="last_name" class="form-control form-control-lg
            <?php echo (!empty($data['last_name_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['last_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['last_name_error']; ?>
            </span>
          </div>

        </div>
        <div class="form-group">
          <label for="email">Email <sup>*</sup></label>
          <input type="text" name="email" class="form-control form-controllg <?php echo (!empty($data['email_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord <sup>*</sup></label>
          <input type="password" name="password" class="form-control formcontrol-lg <?php echo (!empty($data['password_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo  $data['password_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="confirmpassword">Herhaal wachtwoord
            <sup>*</sup></label>
          <input type="password" name="confirmpassword" class="form-control form-control-lg 
          <?php echo (!empty($data['confirmpassword_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirmpassword_error']; ?></span>
        </div>
        <div class="row">
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Al een account? </a>
          </div>
          <div class="col">
            <input type="submit" value="Aanmelden" class="btn btn-success btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . "/views/fragments/footer.php"; ?>