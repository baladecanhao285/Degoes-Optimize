<?php /* Header + Menu */ ?>
<header class="header">
  <div class="container header-inner">
    <a class="brand" href="index.php" aria-label="Home">
      <span class="logo">D</span>
      <span>De Goes Optimize</span>
    </a>
    <button class="menu-button" data-open-menu aria-haspopup="dialog" aria-expanded="false" aria-controls="mainmenu">
      <span>Menu</span>
      <span class="bars" aria-hidden="true"></span>
    </button>
  </div>
</header>

<div id="mainmenu" class="overlay" role="dialog" aria-modal="true" aria-label="Menu principal">
  <div class="panel">
    <nav>
      <ul>
        <li><a href="projects.php">Projetos</a></li>
        <li><a href="about.php">Sobre</a></li>
        <li><a href="contact.php">Contato</a></li>
        <li><a href="index.php#newsletter">Newsletter</a></li>
      </ul>
    </nav>
    <div class="social">
      <a class="underline" href="https://instagram.com/degoesoptimize" target="_blank" rel="noopener">Instagram</a>
      <a class="underline" href="#" target="_blank" rel="noopener">Behance</a>
      <a class="underline" href="#" target="_blank" rel="noopener">Dribbble</a>
      <a class="underline" href="#" target="_blank" rel="noopener">LinkedIn</a>
    </div>
    <p class="muted" style="margin-top:24px"><a data-close-menu class="underline" href="#">Fechar</a></p>
  </div>
</div>
