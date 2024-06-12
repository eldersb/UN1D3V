<?php 

function cadastrar(){
    
    session_start();

    $tituloTarefa = $_POST['titulo'] ?? "";
    $dataTarefa = $_POST['date'] ?? "";
    
    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y/m/d");
    
    if($tituloTarefa != "" && $dataTarefa != "" && strlen($tituloTarefa) > 5 && strtotime($dataTarefa) >= strtotime($dataAtual)) {
      
       if (!isset($_SESSION['titulo'])) {
           $_SESSION['titulo'] = [];
       }
       if (!isset($_SESSION['date'])) {
           $_SESSION['date'] = [];
       }
    
       array_push($_SESSION['titulo'], $tituloTarefa);
       array_push($_SESSION['date'], $dataTarefa);
    
       
       // $_SESSION['titulo'][] = $tituloTarefa;
       // $_SESSION['data'][] = $dataTarefa;
    }
    
    var_dump($_SESSION);
    
     // session_unset();

}


?>