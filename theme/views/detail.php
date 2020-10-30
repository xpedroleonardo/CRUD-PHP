<?php $v->layout("../_theme"); ?>

<div id="page-form" class="container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle
  ]);
  ?>

  <main>

    <form action="">
      <fieldset>


        <div class="image-preview">
          <img src="<?= url("/theme/assets/images/roupas/" . $item->image) ?>" title="Preview da Imagem" id="imagePreview" draggable="false" />
        </div>

        <div class="block">
          <div id="details-card-title" class="text-center">
            <strong><?= $item->name ?></strong>
          </div>
        </div>

        <div class="block">
          <div id="details-card-description">
            <p><?= $item->description ?></p>
          </div>
        </div>

        <div class="block">
          <div id="details-card-price" class="text-center">
            <p><strong>R$ <?= $item->price ?></strong></p>
          </div>
        </div>

      </fieldset>

      <footer>

        <a href=" <?= $router->route("app.edit", ["id" => $item->id]); ?>">
          <button id="update" type="button">
            <img src="<?= url('/theme/assets/images/icons/edit.svg') ?>" />
            Editar
          </button>
        </a>

        <button id="delete" type="submit" data-action="<?= $router->route("app.delete"); ?>" data-id="<?= $item->id; ?>">
          <img src="<?= url('/theme/assets/images/icons/trash.svg') ?>" />
          Excluir
        </button>

      </footer>

    </form>

  </main>

</div>

<?php $v->start("js"); ?>

<script>
  $(() => {
    $("body").on("click", "[data-action]", function(e) {
      e.preventDefault();
      var data = $(this).data();

      Swal.fire({
        icon: "warning",
        title: "Excluir produto",
        text: "Deseja realmente excluir o produto ?",
        confirmButtonText: 'Excluir',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        preConfirm: () => {
          $.ajax({
            url: data.action,
            data: data,
            type: "POST",
            dataType: "json",
            success: function(callback) {

              if (callback.message) {

                Swal.fire({
                  icon: callback.type,
                  title: "Sucesso",
                  text: callback.message,
                  allowOutsideClick: false,
                  willClose: () => location.href = "<?= url("/products") ?>"
                })
              }
            },
            error: function() {
              Swal.fire({
                title: "Erro na exclusão do produto!",
                icon: "error",
              });
            }
          });
        }
      })
    });
  });
</script>

<?php $v->end(); ?>