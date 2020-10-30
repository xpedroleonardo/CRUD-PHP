<div class="card-item">
  <header>
    <img src="<?= url('/theme/assets/images/roupas/' . $item->image) ?>" alt="" draggable="false" />
    <div>
      <strong class="text-center"><?= $item->name ?></strong>
    </div>
  </header>

  <div>
    <p><?= $item->description ?></p>
  </div>

  <div class="block">
    <div id="details-card-price" class="text-center">
      <p><strong>R$ <?= $item->price ?></strong></p>
    </div>
  </div>

  <footer>
    <a href=" <?= $router->route("app.detail", ["id" => $item->id]); ?>">
      Ver
    </a>
  </footer>
</div>