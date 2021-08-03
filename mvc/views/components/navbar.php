<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/mini-project/home">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">   
    </ul>
    
    <ul class="navbar-nav">
    <?php if (isset($_SESSION['username'])) { ?>
        <li class="nav-item active">
            <p class="nav-link"><?php echo $_SESSION['username'] ?></p>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/mini-project/login/logout" aria-hidden="true">Logout </a>
        </li>
    <?php } else { ?>
        <li class="nav-item active">
            <a class="nav-link" href="/mini-project/login">Login </a>
        </li>
    <?php } ?>
    </ul>
  </div>
</nav>