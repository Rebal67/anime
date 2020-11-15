<nav class="navbar navbar-expand-md navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
    <img src="<?php echo URLROOT; ?>">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">

          <a class="nav-link" href="<?php echo URLROOT; ?>">
            Home
          </a>
        </li>

        <?php if (isset($_SESSION['level']) && $_SESSION['level'] > 0): ?>


          <li class="nav-item">

          <a class="nav-link" href="<?php echo URLROOT; ?>/admin/">
            CMS
          </a>
        </li>

        <?php endif; ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION["userid"])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">
              Logout
            </a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">
              Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">
              Login
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>




