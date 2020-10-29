<header class="page-header">
  <div class="top-bar-container">
    <a href="<?= $router->route("app.home") ?>">
      <img src="<?= url("/theme/assets/images/icons/home.svg") ?>" alt="Página Inicial" title="Página Inicial" draggable="false" />
    </a>
    <div class="icons-actions">
      <a href="<?= $router->route("app.read") ?>">
        <img src="<?= url("/theme/assets/images/icons/list.svg") ?>" alt="Listas de Itens" title="Listas de Itens" draggable="false" />
      </a>
      <a href="<?= $router->route("app.create") ?>">
        <img src="<?= url("/theme/assets/images/icons/plus.svg") ?>" alt="Cadastrar Item" title="Cadastrar Item" draggable="false" />
      </a>
    </div>

  </div>
  <div class="header-content">
    <strong><?= $headerTitle ?></strong>

    <?php

    if (!empty($headerDesc)) {
      echo "<p>" . $headerDesc . "</p>";
    }

    ?>

  </div>
</header>