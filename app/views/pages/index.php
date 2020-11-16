
<?php $styles=[]; include APPROOT . "/views/fragments/header.php"; ?>

<header class="row"> 
<h1>Welcome to AnimeLover.</h1>
    <p></p>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <!-- all difault resolution for the carousel images is 750px x 1000px  -->
      <img src="/images/narutologo.jpg" class="d-block w-100" alt=" width: 273px; height: 330px;"">
      <div class="carousel-caption d-none d-md-block">
      <h5 id="h5titel">Naruto</h5>
          <!-- add <p> hier if you want -->
      </div>
    </div>
    <div class="carousel-item">
    <!-- all difault resolution for the carousel images is 750px x 1000px  -->
    <img src="/images/onepiecelogo.jpg" class="d-block w-100" alt="width: 273px; height: 330px;"">
      <div class="carousel-caption d-none d-md-block">
        <h5 id="h5titel">OnePiece</h5>
       <!-- add <p> hier if you want -->
      </div>
    </div>
    <div class="carousel-item">
    <!-- all difault resolution for the carousel images is 750px x 1000px  -->  
    <img src="/images/rememberme.jpg" class="d-block w-100" alt="width: 273px; height: 330px;"">
    <div class="carousel-caption d-none d-md-block">
    <h5 id="h5titel">remember me</h5>
          <!-- add <p> hier if you want -->
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</header>

<div class="row footer">
  <h1>#</h1>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>