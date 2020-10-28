<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>houpa | <?= $title; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= url("/theme/assets/css/global.css"); ?>" />
  <link rel="stylesheet" href="<?= assets("/css/home.css"); ?>" />
  <link rel="stylesheet" href="<?= assets("/css/create.css") ?>" />
</head>

<body>
  <?= $v->section("content"); ?>

  <script src="<?= url("/theme/assets/js/jquery.js"); ?>"></script>
  <script src="<?= url("/theme/assets/js/scripts.js"); ?>"></script>
  <?= $v->section("js"); ?>
</body>

</html>