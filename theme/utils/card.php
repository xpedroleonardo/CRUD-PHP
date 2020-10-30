<div class="card-item">
  <header>
    <img src="<?= url('/theme/assets/images/roupas/' . $item->image) ?>" alt="" draggable="false" />
    <div>
      <strong><?= $item->name ?></strong>
    </div>
  </header>

  <p><?= $item->description ?></p>

  <footer>
    <p>Preço<strong>R$ <?= $item->price ?></strong></p>

    <a href=" <?= $router->route("app.detail", ["id" => $item->id]); ?>">
      Ver
    </a>
  </footer>
</div>