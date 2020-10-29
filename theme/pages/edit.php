<?php $v->layout("../_theme"); ?>

<div id="page-teacher-form" class="container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle,
  ]);
  ?>


  <main>

    <form action="<?= $router->route("app.saveEdit") ?>" autocomplete="off">

      <input type="hidden" name="id" value="<?= $item->id ?>">

      <fieldset>

        <legend>Dados</legend>


        <div class="image-preview">
          <img src="<?= url("/theme/assets/images/roupas/" . $item->image) ?>" title="Preview da Imagem" id="imagePreview" draggable="false" />
        </div>

        <div class="select-block">
          <label for="images">Imagem</label>
          <select required name="selectImage" type="text" id="images" onchange="previewImage(this)">
            <option selected disabled hidden>Selecione uma Imagem</option>
            <optgroup label="Feminino">
              <option <?= ($item->image === "cropped.jpg") ? 'selected' : '' ?> value="cropped.jpg">Cropped</option>
              <option <?= ($item->image === "short.jpg") ? 'selected' : '' ?> value="short.jpg">Short</option>
              <option <?= ($item->image === "vestido.jpg") ? 'selected' : '' ?> value="vestido.jpg">Vestido</option>
            </optgroup>
            <optgroup label="Masculino">
              <option <?= ($item->image === "blusa.jpg") ? 'selected' : '' ?> value="blusa.jpg">Blusa</option>
              <option <?= ($item->image === "calça.jpg") ? 'selected' : '' ?> value="calça.jpg">Calça</option>
              <option <?= ($item->image === "jaqueta.jpg") ? 'selected' : '' ?> value="jaqueta.jpg">Jaqueta</option>
            </optgroup>
          </select>
        </div>

        <div class="input-block">
          <label for="name">Nome</label>
          <input type="text" name="name" id="name" value="<?= $item->name ?>" />
        </div>

        <div class="textarea-block">
          <label for="bio">Descrição</label>
          <textarea id="bio" name="description"><?= $item->description ?></textarea>
        </div>

        <div class="input-block">
          <label for="price">Preço</label>
          <input id="price" name="price" type="text" value="<?= $item->price ?>" placeholder="00,000,00" />
        </div>

      </fieldset>

      <footer>

        <p>
          <img src="<?= url("/theme/assets/images/icons/warning.svg") ?>" alt="Aviso importante" draggable="false" />
          Importante!<br />
          Preencha todos os dados.
        </p>
        <button type="submit">
          Salvar edição
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

      let local = `<?= url("/theme/assets/images/roupas") ?>/${select.value}`

      image.setAttribute("src", `${local}`)
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