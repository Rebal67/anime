<?php require APPROOT . "/views/fragments/header.php"; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <?php flash("register_success"); ?>
      <h2>edit bike</h2>
      <form action="<?php echo URLROOT; ?>/projects/update/<?=$data['id']?>" method="POST">

        <div class="form-group">
          <label for="name">Name <sup>*</sup></label>
          <input type="text" name="name" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="radius">Radius <sup>*</sup></label>
          <input type="text" autocomplete="off" name="radius" class="form-control formcontrol-lg <?php echo (!empty($data['radius_error'])) ? "is-invalid" : ""; ?>" value="<?php echo $data['radius']; ?>">
          <span class="invalid-feedback"><?php echo  $data['radius_error']; ?></span>
        </div>

        <div class="row">
        <div class="ml-3">
            <a href="<?= URLROOT?>/projects/index" class="btn btn-secondary">Cancel</a>
          </div>
          <div class="ml-3">
            <input type="submit" value="Update" class="btn btn-success ">
          </div>

          
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . "/views/fragments/footer.php" ?>