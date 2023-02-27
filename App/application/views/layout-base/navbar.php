<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand">CodeIgniter PeachPie</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">          
          <?php echo anchor("home", 'Home', array('title' => 'Home', 'class' => 'nav-link active', 'aria-current' => 'page')); ?>
        </li>
        <li class="nav-item">
          <?php echo anchor("auth/logout", 'Logout', array('title' => 'Logout', 'class' => 'nav-link')); ?>
        </li>        
      </ul>
    </div>
  </div>
</nav>

<main role="main" class="container">