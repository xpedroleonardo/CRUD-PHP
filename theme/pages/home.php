<?php $v->layout("../_theme", ["title" => "Home"]); ?>
<!-- --------------------- -->

<div id="home-page">
  <div class="content">
    <div id="page-home-content">
      <div class="logo-container">
        <img src="<?= url('/theme/assets/images/logo.svg') ?>" alt="Logo" />
        <h2>Sua plataforma de estudos online.</h2>
      </div>
      <div>
        <img src="<?= url('/theme/assets/images/landing.svg') ?>" alt="Plataforma de estudos" class="hero-image" />
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
        <a href="#" class="products">
          <img src="<?= url('/theme/assets/images/icons/study.svg') ?>" />
          Produtos
        </a>

        <a href="#" class="products">
          <img src="<?= url('/theme/assets/images/icons/study.svg') ?>" />
          Cadastar
        </a>
      </div>
    </div>

    <span class="total-products">
      Total de 10 produtos cadastrados
      <img src="<?= url('/theme/assets/images/icons/purple-heart.svg') ?>" alt="" />
    </span>

  </div>
</div>