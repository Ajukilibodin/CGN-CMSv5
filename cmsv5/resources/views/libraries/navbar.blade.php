<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $_ENV['APP_NAME']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Anasayfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Hakkımızda</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ürünler
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">İndirim</a>
          <a class="dropdown-item" href="#">Yeni Ürünler</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tüm Ürünler</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Ara" aria-label="Ara">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara</button>
    </form>
  </div>
</nav>
