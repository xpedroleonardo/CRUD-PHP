<?php $v->layout("../_theme", ["title" => "Novo"]); ?>

<div id="page-teacher-form" class="container">

  <header class="page-header">
    <div class="top-bar-container">
      <a href="#">
        <img src="<?= url("/theme/assets/images/icons/back.svg") ?>" alt="Voltar" />
      </a>
      <img src="<?= url("/theme/assets/images/logo.svg") ?>" alt="Proffy" />
    </div>
    <div class="header-content">
      <strong>Que incrível que você quer dar aula</strong>
      <p>O primeiro passo é preencher esse formulário de inscrição</p>
    </div>
  </header>


  <main>

    <form action="<?= $router->route("app.saveCreate") ?>" autocomplete="off">

      <fieldset>

        <legend>Dados</legend>


        <div class="image-preview">
          <img src="<?= url("/theme/assets/images/logo.svg") ?>" id="imagePreview">
        </div>

        <div class="select-block">
          <label for="images">Imagem</label>
          <select required value="" name="image" id="images" onchange="previewImage(this)">
            <option selected disabled hidden>Selecione uma Imagem</option>
            <optgroup label="Feminino">
              <option value="cropped.jpg">Cropped</option>
              <option value="short.jpg">Short</option>
              <option value="vestido.jpg">Vestido</option>
            </optgroup>
            <optgroup label="Masculino">
              <option value="blusa.jpg">Blusa</option>
              <option value="calça.jpg">Calça</option>
              <option value="jaqueta.jpg">Jaqueta</option>
            </optgroup>
          </select>
        </div>

        <div class="input-block">
          <label for="name">Nome</label>
          <input type="text" name="name" id="name" />
        </div>

        <div class="textarea-block">
          <label for="bio">Descrição</label>
          <textarea id="bio" name="description"></textarea>
        </div>

        <div class="input-block">
          <label for="price">Preço</label>
          <input id="price" placeholder="0,00" />
        </div>

      </fieldset>

      <!-- <fieldset>

        <legend>
          Tamanhos disponíveis
          <button type="button" onClick={addNewScheduleItem}>
            + Novo horário
          </button>
        </legend>

      </fieldset> -->

      <footer>

        <p>
          <img src="<?= url("/theme/assets/images/icons/warning.svg") ?>" alt="Aviso importante" />
          Importante!<br />
          Preencha todos os dados.
        </p>
        <button type="submit">
          Salvar cadastro
        </button>

      </footer>

    </form>

  </main>

</div>

<?php
$v->start("js");
?>
<script>
  function previewImage(select) {
    if (select.value) {
      let image = document.querySelector("#imagePreview")

      image.setAttribute("src", `theme/assets/images/roupas/${select.value}`)
    }
  }

  // $(".name").on("keyup", () => {
  //   var data = $(".name").val()
  //   $(".card-title").html(data)
  // })

  // $(".price").on("keyup", () => {
  //   var data = $(".price").val()
  //   $(".card-price").html(data)
  // })

  async function Submit(e) {
    e.preventDefault();
    // var form = $(this);

    // $.ajax({
    //   url: form.attr("action"),
    //   data: form.serialize(),
    //   type: "POST",
    //   dataType: "json",
    //   success: function(callback) {
    //     if (callback.error) {
    //       swal({
    //         title: callback.message,
    //         icon: "warning",
    //         buttons: [false, "Ok"],
    //       })
    //     } else {
    //       swal({
    //           title: callback.message,
    //           icon: "success",
    //           buttons: [false, "Ok"],
    //         })
    //         .then(areClosed => {
    //           if (areClosed) location.href = ''
    //         });
    //     }
    //   },
    //   error: function() {
    //     swal({
    //       title: "Erro na exclusão do produto!",
    //       icon: "error",
    //     });
    //   }
    // });
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
          alert("Erro")
        } else {

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