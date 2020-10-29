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

      <button id="delete" type="submit" data-action="<?= $router->route("app.delete"); ?>" data-id="<?= $item->id; ?>">
        Excluir
      </button>

    </footer>

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
        title: "Excluir produto!",
        text: "Deseja realmente excluir o produto",
        confirmButtonText: 'Excluir',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        preConfirm: () => {
          $.ajax({
            url: data.action,
            data: data,
            type: "POST",
            dataType: "json",
            success: function(callback) {

              console.log(callback);

              if (callback.message) {

                Swal.fire({
                  icon: callback.type,
                  title: "Sucesso",
                  text: callback.message,
                  allowOutsideClick: false,
                  willClose: () => location.href = '<?= $router->route("app.products") ?>'
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