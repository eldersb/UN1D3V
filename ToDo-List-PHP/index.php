<?php


session_start();

// $valor = $_SESSION['titulo'];

//   var_dump($_SESSION['titulo']);


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
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
                        <a class="nav-link active text-light" aria-current="page" href="cadastro.php">Cadastrar tarefa</a>
                        <a class="nav-link active text-light" href="index.php">Listar tarefas</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-primary mt-5">Tarefas cadastradas</h1>

                        <table class="table mt-4">
                            <thead>
                                <tr>
                                     <th scope="col">#</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                   
                               <?php
                                 foreach (array_map(null, $_SESSION['id'], $_SESSION['titulo'], $_SESSION['date']) as [$idTask, $titulo, $date]) : ?>
                                <tr>
                                     <td><?php echo $idTask ?></td>
                                    <td><?php echo $titulo ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><button class="btn btn-primary">Excluir</button></td>
                                </tr>
                                <?php endforeach?>
                               
                              

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>

   
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>