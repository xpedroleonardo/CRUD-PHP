<?php $v->layout("../_theme"); ?>

<div id="page-teacher-form" class="container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle
  ]);
  ?>


  <main>

    <fieldset>

      <div class="image-preview">
        <img src="<?= url("/theme/assets/images/roupas/" . $item->image) ?>" title="Preview da Imagem" id="imagePreview" draggable="false" />
      </div>

      <div class="details-card-content">

        <strong><?= $item->name ?></strong>

        <p id="details-card-description"><?= $item->description ?></p>

        <p id="details-card-price">Preço<strong>R$ <?= $item->price ?></strong></p>

      </div>

    </fieldset>

    <footer>

      <button id="update" type="submit">
        Editar
      </button>

      <button id="delete" type="submit">
        Excluir
      </button>

    </footer>

  </main>
</div>