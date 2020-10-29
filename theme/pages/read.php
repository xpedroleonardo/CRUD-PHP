<?php $v->layout("../_theme"); ?>

<div id="list" class="pages container">

  <?php
  $v->insert("../utils/header", [
    "headerTitle" => $headerTitle,
  ]);
  ?>


  <main>
    <div class="row">
      <?php
      if (!empty($items)) :
        foreach ($items as $item) :
          $v->insert("../utils/card", ["item" => $item]);
        endforeach;
      else :
      ?>
        <div class="col-12 mb-4">
          <div class="card shadow">
            <div class="card-body">
              <h5>Nenhum produto cadastrado</h5>
            </div>
          </div>
        </div>
      <?php
      endif;
      ?>

    </div>
  </main>
</div>