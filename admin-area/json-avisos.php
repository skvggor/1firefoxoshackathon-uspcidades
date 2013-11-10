<?php
header("Content-type: application/json");
include "classes/mysql_crud.php";

function obterAvisos() {
  $db = new Database();
  $db -> connect();
  $db -> select('avisos',
    'avisos.id_tipo_aviso,avisos.data,avisos.usuario,avisos.latitude,avisos.longitude',
    'tipo_aviso ON avisos.id_aviso = tipo_aviso.id_tipo_aviso',
    'avisos.id_aviso > 0',
    'avisos.id_aviso DESC');
  $dados = $db -> getResult();
  $ObjJSON = json_encode($dados);
  $ObjJSONValido = str_replace("]", "]}", str_replace("[", "{ \"avisos\": [", $ObjJSON));
  return $ObjJSONValido;
}
echo obterAvisos();
?>