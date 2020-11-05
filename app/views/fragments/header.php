<!doctype html>
<html lang="nl">

<head>
  <!-- Basic -->
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/custom.css">
  <?php foreach  ($styles  as $style ):?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/<?=$style?>">
  <?php endforeach; ?>
  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <?php require_once APPROOT . "/views/fragments/navbar.php"; ?>
  <div class="container-fluid">