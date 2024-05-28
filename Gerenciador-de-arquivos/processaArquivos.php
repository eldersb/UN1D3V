<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<?php

$nome = $_POST["nome"];
$conteudo = $_POST["conteudo"];


if(empty($nome) || empty($conteudo)) {
  echo '
  <div class="container">
      <div class="row">
          <div class="col-md-12 mt-5">
              <div class="alert alert-warning" role="alert">
                  <h5>Aviso!</h5>
                  Preencha todos os campos corretamente!
              </div>
          </div>
      </div>
  </div>';
} else {
  if (!file_exists($nome)) {
      file_put_contents($nome, $conteudo);
      echo '<div class="alert alert-success" role="alert">
                  Arquivo gravado com sucesso!
                  <a href="index.html">Voltar para a tela principal!</a>
              </div>';
  } else {
      if (isset($_POST['meucheckbox'])) {
          file_put_contents($nome, $conteudo);
          echo '<div class="alert alert-success" role="alert">
                      Arquivo gravado (sobrescrito) com sucesso!
                      <a href="index.html">Voltar para a tela principal!</a>
                  </div>';
      } else {
          file_put_contents($nome, PHP_EOL . $conteudo, FILE_APPEND);
          echo '<div class="alert alert-success" role="alert">
                      Conteúdo adicionado com sucesso!
                      <a href="index.html">Voltar para a tela principal!</a>
                  </div>';
      }
  }
}


?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



