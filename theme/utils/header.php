<header class="page-header">
  <div class="top-bar-container">
    <a href="<?= $router->route("app.home") ?>">
      <img src="<?= url("/theme/assets/images/icons/back.svg") ?>" alt="Voltar" />
    </a>
    <img src="<?= url("/theme/assets/images/logo.svg") ?>" alt="Proffy" />
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