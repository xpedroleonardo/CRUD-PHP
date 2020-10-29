<?php $v->layout("../_theme", ["title" => "Home"]); ?>

<div id="home-page">
  <div class="content">
    <div id="page-home-content">
      <div class="logo-container">
        <img src="<?= url('/theme/assets/images/logo.svg') ?>" alt="Logo" draggable="false" />
        <h2>Sua plataforma de estudos online.</h2>
      </div>
      <div>
        <img src="<?= url('/theme/assets/images/landing.svg') ?>" alt="Plataforma de estudos" class="hero-image" draggable="false" />
      </div>
    </div>
  </div>

  <div class="footer">
    <div class="footer-container">
      <div class="text-container">
        <p>Seja bem-vindo</p>
        <p>O que deseja fazer?</p>
      </div>


      <div class="buttons-container">
        <a href="<?= $router->route("app.read") ?>" class="products">
          <img src="<?= url('/theme/assets/images/icons/list.svg') ?>" draggable="false" />
          Produtos
        </a>

        <a href="<?= $router->route("app.create") ?>" class="products">
          <img src="<?= url('/theme/assets/images/icons/plus.svg') ?>" draggable="false" />
          Cadastar
        </a>
      </div>
    </div>

    <span class="total-products">
      <?php
      if ($items > 0) {
        if ($items == 1) {
          echo "Total de " . $items . " produto cadastrado";
        } else {
          echo "Total de " . $items . " produtos cadastrados";
        }
        echo "<img src=" . url('/theme/assets/images/icons/purple-heart.svg') . " draggable='false' />";
      } else {
        echo "Ainda não temos produtos cadastrados";
      }
      ?>
    </span>

  </div>
</div>