<?php

namespace Src\Controllers;

use League\Plates\Engine;
use Src\Models\Item;

class App
{
  // /** @var Engine */
  // private $view;

  public function __construct($router)
  {
    $this->view = Engine::create(
      dirname(__DIR__, 2) . "/theme/pages",
      "php"
    );

    $this->view->addData(["router" => $router]);
  }

  public function home(): void
  {
    echo $this->view->render("home");
  }

  public function create(): void
  {
    echo $this->view->render("create", [
      "title" => "Novo",
      "headerTitle" => "Que incrível que você quer dar aula",
      "headerDesc" => "O primeiro passo é preencher esse formulário de inscrição"
    ]);
  }

  public function read(): void
  {
    echo $this->view->render("read", [
      "items" => (new Item())->find()->fetch(true),
      "title" => "Itens",
      "headerTitle" => "Estes são os proffys disponíveis."
    ]);
  }

  public function detail(array $data): void
  {
    $item = (new Item())->findById($data["id"]);

    if ($item) {
      echo $this->view->render("detail", [
        "item" => $item,
        "title" => "Detalhe",
        "headerTitle" => "Detalhe do Item"
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
        "headerTitle" => "Editar Item"
      ]);
    } else {
      echo $this->view->render("home");
    }
  }

  public function saveCreate(array $data): void
  {
    $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $itemData)) {
      $callback["error"] = "Informe o todos os Dados";
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

    $callback["message"] = "Usuário cadastrado";
    $callback["type"] = "success";
    echo json_encode($callback);
  }

  public function saveEdit(array $data): void
  {

    $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $itemData)) {
      $callback["error"] = "Informe o nome e o sobrenome";
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

    $callback["message"] = "Usuário Editado com sucesso";
    $callback["type"] = "success";
    echo json_encode($callback);
  }

  // public function update(array $data): void
  // {
  //   $userData = filter_var_array($data, FILTER_SANITIZE_STRING);
  //   if (in_array("", $userData)) {
  //     $callback["message"] = message("Informe o nome e o sobrenome", "error");
  //     $callback["error"] = true;
  //     echo json_encode($callback);
  //     return;
  //   }

  //   $user = (new User())->findById($userData["id"]);
  //   $user->first_name = $userData["first_name"];
  //   $user->last_name = $userData["last_name"];
  //   $user->save();

  //   $callback["message"] = message("Usuário Editado com sucesso", "success");
  //   $callback["update"] = true;
  //   echo json_encode($callback);
  // }


  // public function updateForm(array $data): void
  // {
  //   $user = (new User())->findById($data["id"]);

  //   if ($user) {
  //     echo $this->view->render("edit", [
  //       "title" => "Editar Usuário",
  //       "user" => $user
  //     ]);
  //   } else {
  //     echo $this->view->render("error", [
  //       "error" => "Produto não encontrado"
  //     ]);
  //   }
  // }


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
    $callback["message"] = "Item excluído com sucesso";
    echo json_encode($callback);
  }
}
