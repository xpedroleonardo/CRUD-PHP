<?php $v->layout("../_theme"); ?>

<div id="list" class="container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle,
  ]);
  ?>


  <main>
    <div class='row'>
      <?php
      if (!empty($items)) :
        foreach ($items as $item) :
          $v->insert("../utils/card", ["item" => $item]);
        endforeach;
      else :
      ?>
        <div class="card-item">
          <header>
            <img src="<?= url('/theme/assets/images/roupas/default.jpg') ?>" alt="" draggable="false" />
            <div>
              <strong>Oops...</strong>
            </div>
          </header>

          <div class="text-center">
            <p>Ainda não temos produtos cadastrados</p>
          </div>
          <br />

          <footer>

            <a href="<?= $router->route("app.create") ?>">
              Cadastrar
            </a>
          </footer>
        </div>
      <?php
      endif;
      ?>
    </div>
  </main>
</div>