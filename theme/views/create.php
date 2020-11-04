<?php $v->layout("../_theme"); ?>

<div id="page-form" class="container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle,
    "headerDesc" => $headerDesc,
  ]);
  ?>


  <main>

    <form action="<?= $router->route("app.saveCreate") ?>" autocomplete="off">

      <fieldset>

        <div class="image-preview">
          <img src="<?= url("/theme/assets/images/roupas/default.jpg") ?>" title="Preview da Imagem" id="imagePreview" draggable="false" />
        </div>

        <div class="select-block">
          <label for="images">Imagem</label>
          <select name="selectImage" type="text" id="images" onchange="previewImage(this)">
            <option value="" selected disabled hidden>Selecione uma Imagem</option>
            <optgroup label="Feminino">
              <option value="blusaF.jpg">Cropped</option>
              <option value="calçaF.jpg">Calça</option>
              <option value="shortF.jpg">Short</option>
              <option value="pijamaF.jpg">Pijama</option>
            </optgroup>
            <optgroup label="Masculino">
              <option value="blusaM.jpg">Camiseta</option>
              <option value="calçaM.jpg">Calça</option>
              <option value="shortM.jpg">Short</option>
              <option value="pijamaM.jpg">Pijama</option>
            </optgroup>
          </select>
        </div>

        <div class="block">
          <label for="name">Nome</label>
          <input type="text" name="name" id="name" maxlength="30" />
        </div>

        <div class="textarea-block">
          <label for="bio">Descrição</label>
          <textarea id="bio" name="description" maxlength="255"></textarea>
        </div>

        <div class="block">
          <label for="price">Preço (R$)</label>
          <input id="price" name="price" type="text" placeholder="00.000,00" />
        </div>

      </fieldset>

      <footer>

        <button type="submit" class="button-large">
          Salvar
        </button>

      </footer>

    </form>

  </main>

</div>

<?php
$v->start("js");
?>
<script>
  $("#price").mask("99.900,00", {
    reverse: true
  })

  function previewImage(select) {
    if (select.value) {
      let image = document.querySelector("#imagePreview")

      image.setAttribute("src", `theme/assets/images/roupas/${select.value}`)
    }
  }

  $("form").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    $.ajax({
      url: form.attr("action"),
      data: form.serialize(),
      type: "POST",
      dataType: "json",
      success: function(callback) {

        if (callback.error) {

          Swal.fire({
            icon: callback.type,
            title: 'Oops...',
            text: callback.error,
            allowOutsideClick: false
          })

        } else {

          Swal.fire({
            icon: callback.type,
            title: 'Sucesso',
            text: callback.message,
            allowOutsideClick: false,
            willClose: () => location.href = '<?= url("/products") ?>'
          })

        }
      },
      error: function() {

      }
    });
  });
</script>
<?php
$v->end();
?>