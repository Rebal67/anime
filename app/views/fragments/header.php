<!doctype html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/custom.css">
  <?php foreach  ($styles as $style ):?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/<?=$style?>.css">
  <?php endforeach; ?>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <?php require_once APPROOT . "/views/fragments/navbar.php"; ?>
  <div class="container-fluid">