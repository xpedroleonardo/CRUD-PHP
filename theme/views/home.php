<?php $v->layout("../_theme"); ?>

<div id="home-page">
  <div class="content">
    <div class="logo-container">
      <img src="<?= url('/theme/assets/images/logo.png') ?>" alt="Logo" draggable="false" />
      <h2>Sua plataforma de compras online.</h2>
    </div>
    <div>
      <img src="<?= url('/theme/assets/images/landing.svg') ?>" alt="Landing image" draggable="false" />
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
          Ver produtos
        </a>

        <a href="<?= $router->route("app.create") ?>" class="products">
          <img src="<?= url('/theme/assets/images/icons/plus.svg') ?>" draggable="false" />
          Novo produto
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
        echo "<img src=" . url('/theme/assets/images/icons/heart.svg') . " draggable='false' />";
      } else {
        echo "Ainda não temos produtos cadastrados";
      }
      ?>
    </span>

  </div>
</div>