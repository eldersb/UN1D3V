<?php

session_start();

$tituloTarefa = "";
$dataTarefa = "";
$dataAtual = "";

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    $tituloTarefa = $_POST['titulo'] ?? "";
    $dataTarefa = $_POST['date'] ?? "";
    $id = "";

    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y/m/d");

    if ($tituloTarefa != "" && $dataTarefa != "" && strlen($tituloTarefa) > 5 && strtotime($dataTarefa) >= strtotime($dataAtual)) {

        if (!isset($_SESSION['titulo'])) {
            $_SESSION['titulo'] = [];
        }
        if (!isset($_SESSION['date'])) {
            $_SESSION['date'] = [];
        }

        array_push($_SESSION['titulo'], $tituloTarefa);
        array_push($_SESSION['date'], $dataTarefa);

        if (!isset($_SESSION['id'])) {
            $_SESSION['id'] = [];
        }

        $id = array_search($tituloTarefa, $_SESSION['titulo']);
        array_push($_SESSION['id'], $id + 1);
    }
}
//   session_unset();




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="index.php">ToDo list</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active text-light" href="buscar.php"><strong>Buscar tarefas</strong></a>
                        <a class="nav-link active text-light" aria-current="page" href="cadastro.php"><strong>Cadastrar tarefa</strong></a>
                        <a class="nav-link active text-light" href="index.php"><strong>Listar tarefas</strong></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary mt-5">Nova tarefa</h3>

                    <form class="mt-4" action="" method="POST">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título da tarefa</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex: Comprar leite">
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data da tarefa</label>
                            <input type="date" class="form-control" id="data" name="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar tarefa</button>
                    </form>
                </div>
            </div>
            
            <?php if ($tituloTarefa != "" && $dataTarefa != "" && strlen($tituloTarefa) > 5 && strtotime($dataTarefa) >= strtotime($dataAtual)) : ?>
            <div class="alert alert-success mt-5">
                <strong>Uhull</strong><br>
                Tarefa Cadastrada com sucesso!
            </div>
            <?php endif; ?>

            <?php if (strlen($tituloTarefa) < 5 && $_SERVER['REQUEST_METHOD'] != 'GET') : ?>              
            <div class="alert alert-warning mt-5">
                <strong>Ops!!!</strong><br>
                O título da tarefa não pode ter menos do que 5 caracteres!
            </div>
             <?php endif; ?>

            <?php if (strtotime($dataTarefa) < strtotime($dataAtual)) : ?>
             <div class="alert alert-warning mt-5">
                <strong>Ops!!!</strong><br>
                <?php echo "A data da tarefa não pode ser anterior a $dataAtual" ?>
             </div>
            <?php endif; ?>
        </div>


       

       




    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>