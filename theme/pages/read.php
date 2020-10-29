<?php $v->layout("../_theme", ["title" => "Products"]); ?>

<div id="page-teacher-list" class="container">
  <header class="page-header">
    <div class="top-bar-container">
      <a href="<?= $router->route("app.home") ?>">
        <img src="<?= url("/theme/assets/images/icons/back.svg") ?>" alt="Voltar" />
      </a>
      <img src="<?= url("/theme/assets/images/logo.svg") ?>" alt="Proffy" />
    </div>
    <div class="header-content">
      <strong>Estes são os proffys disponíveis.</strong>
    </div>
  </header>


  <main>
    <div class="row">
      <div class="teacher-item">
        <header>
          <img src="<?= url('/theme/assets/images/roupas/blusa.jpg') ?>" alt="" />
          <div>
            <strong>{teacher.name}</strong>
          </div>
        </header>

        <p>dfsdfdfs</p>

        <footer>
          <p>Preço<strong>R$ {teacher.cost}</strong></p>

          <a href="#" target="_blank">
            Entrar em contato
          </a>
        </footer>
      </div>
    </div>
  </main>
</div>