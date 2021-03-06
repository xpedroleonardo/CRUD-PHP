<?php

namespace Src\Controllers;

use League\Plates\Engine;
use Src\Models\Item;

class App
{
  /** @var Engine */
  private $view;

  public function __construct($router)
  {
    $this->view = Engine::create(
      dirname(__DIR__, 2) . "/theme/views",
      "php"
    );

    $this->view->addData(["router" => $router]);
  }

  public function home(): void
  {
    echo $this->view->render("home", [
      "title" => "Home",
      "items" => (new Item())->find()->count()
    ]);
  }

  public function create(): void
  {
    echo $this->view->render("create", [
      "title" => "Novo",
      "headerTitle" => "Você quer cadastrar um produto ?",
      "headerDesc" => "O primeiro passo é preencher esse formulário"
    ]);
  }

  public function read(): void
  {
    echo $this->view->render("read", [
      "items" => (new Item())->find()->fetch(true),
      "title" => "Produtos",
      "headerTitle" => "Estes são os produtos disponíveis",
      "headerDesc" => "Explore e encontre o melhor para você se vestir"
    ]);
  }

  public function detail(array $data): void
  {
    $item = (new Item())->findById($data["id"]);

    if ($item) {
      echo $this->view->render("detail", [
        "item" => $item,
        "title" => "Detalhes",
        "headerTitle" => "Detalhes do produto",
        "headerDesc" => "Esses são os dados do produto cadastrado"
      ]);
    } else {
      echo $this->view->render("home");
    }
  }

  public function edit(array $data): void
  {
    $item = (new Item())->findById($data["id"]);

    if ($item) {
      echo $this->view->render("edit", [
        "item" => $item,
        "title" => "Editar",
        "headerTitle" => "Editar produto",
        "headerDesc" => "Altere os dados do produto cadastrado"
      ]);
    } else {
      echo $this->view->render("home");
    }
  }

  public function saveCreate(array $data): void
  {
    $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $itemData)) {
      $callback["error"] = "Preencha todos os dados.";
      $callback["type"] = "error";
      echo json_encode($callback);
      return;
    }

    if (strlen($itemData["name"]) > 30 || strlen($itemData["description"]) > 255 || strlen($itemData["price"]) > 9) {
      $callback["error"] = "Não altere nosso formulário";
      $callback["type"] = "error";
      echo json_encode($callback);
      return;
    }

    $item = new Item();
    $item->name = $itemData["name"];
    $item->description = $itemData["description"];
    $item->image = $itemData["selectImage"];
    $item->price = $itemData["price"];
    $item->save();

    $callback["message"] = "Produto cadastrado com sucesso";
    $callback["type"] = "success";
    echo json_encode($callback);
  }

  public function saveEdit(array $data): void
  {

    $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $itemData)) {
      $callback["error"] = "Preencha todos os dados.";
      $callback["type"] = "error";
      echo json_encode($callback);
      return;
    }

    if (strlen($itemData["name"]) > 30 || strlen($itemData["description"]) > 255 || strlen($itemData["price"]) > 9) {
      $callback["error"] = "Não altere nosso formulário";
      $callback["type"] = "error";
      echo json_encode($callback);
      return;
    }

    $item = (new Item())->findById($itemData["id"]);
    $item->name = $itemData["name"];
    $item->description = $itemData["description"];
    $item->image = $itemData["selectImage"];
    $item->price = $itemData["price"];
    $item->save();

    $callback["message"] = "Produto Editado com sucesso";
    $callback["type"] = "success";
    echo json_encode($callback);
  }

  public function delete(array $data): void
  {
    if (empty($data["id"])) {
      return;
    }

    $id = filter_var($data["id"], FILTER_VALIDATE_INT);
    $item = (new Item())->findById($id);

    if ($item) {
      $item->destroy();
    }

    $callback["type"] = "success";
    $callback["message"] = "Produto excluído com sucesso";
    echo json_encode($callback);
  }
}
