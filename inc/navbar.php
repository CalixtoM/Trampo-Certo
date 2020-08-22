<nav class="navbar navbar-expand-lg bg-faded navbar-dark fixed-top slide-in-top">
  <div id="container">
    <a href="index.php" class="navbar-brand"><img src="img/logo.png" width="60"></a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link tc-animation-navbar" href="index.php" id="a-navbar" >Página Inicial</a>
      </li>
    </ul>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link tc-animation-navbar" href="sobre.php" id="a-navbar">Sobre nós</a>
      </li>
      <li class="nav-item">
        <a class="nav-link tc-animation-navbar" href="contato.php" id="a-navbar">Contato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link tc-animation-navbar" href="tutorial.php" id="a-navbar">Como funciona</a>
      </li>
      <li class="nav-item">
        <a class="nav-link tc-animation-navbar" href="perfil.php" id="a-navbar">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link tc-animation-navbar" href="servicos.php" id="a-navbar">Serviços</a>
      </li>
      <li class="nav-item a-entrar-navbar">
        <?php
         if (isset($_SESSION['usuario'])) {
           echo '
           <a class="nav-link tc-animation-navbar-exit" href="sair.php" id="a-navbar-exit">
           Sair <i class="fa fa-times-circle" aria-hidden="true"></i>
           </a>';
         }else{
          echo '
          <a class="nav-link tc-animation-navbar" href="login.php" id="a-navbar">
          Entrar
          </a>';
         }
        
        ?>
      </li>
    </ul>
  </div>
</nav>