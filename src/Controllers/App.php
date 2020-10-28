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
    echo $this->view->render("home", [
      "items" => (new Item())->find()->fetch(true)
    ]);
  }

  public function create(): void
  {
    echo $this->view->render("create");
  }

  public function saveCreate(array $data): void
  {
    $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $itemData)) {
      $callback["error"] = message("Informe o todos os Dados", "error");
      echo json_encode($callback);
      return;
    }

    $item = new Item();
    $item->name = $itemData["name"];
    $item->description = $itemData["description"];
    $item->image = $itemData["selectImage"];
    $item->price = $itemData["price"];
    $item->save();

    $callback["message"] = message("Usuário cadastrado com sucesso", "success");
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


  // public function delete(array $data): void
  // {
  //   if (empty($data["id"])) {
  //     return;
  //   }

  //   $id = filter_var($data["id"], FILTER_VALIDATE_INT);
  //   $user = (new User())->findById($id);

  //   if ($user) {
  //     $user->destroy();
  //   }

  //   $callback["remove"] = true;
  //   echo json_encode($callback);
  // }
}
