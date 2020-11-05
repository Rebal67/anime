<?php require APPROOT . "/views/fragments/header.php"; ?>
<div class="container-fluid">
  <h1>Bikes</h1>
  <?php flash('bikes'); ?>
  <?php foreach ($data['bikes'] as $bike) : ?>
    <div class="row">
      <div class="col"><a href="<?= URLROOT?>/projects/update/<?=$bike->id?>"><?= $bike->name?></a></div>
      <div class="col"><a href="<?= URLROOT?>/projects/update/<?=$bike->id?>"><?= $bike->radius?></a></div>
      <div class="col"><a href="<?= URLROOT?>/projects/delete/<?=$bike->id?>"><i class="far fa-trash-alt"></i></a></div>
  
  
   
    </div>
  <?php endforeach ?>

  
<a href="<?= URLROOT?>/projects/addbike" class="btn btn-primary">Add bike</a>
</div>


<?php require APPROOT . "/views/fragments/footer.php" ?>