<?php

session_start();

if (!isset($_SESSION['titulo'])) {
    $_SESSION['titulo'] = [];
}
if (!isset($_SESSION['date'])) {
    $_SESSION['date'] = [];
}

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = [];
    }

function limpartudo() {

    session_unset();

    header('Location: index.php');

}


// $valor = $_SESSION['titulo'];

// var_dump($_SESSION['titulo']);

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
                <a class="navbar-brand text-light" href="index.php"><strong>ToDo list</strong></a>
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
                    <div class="d-flex justify-content-between align-items-end">
                        <h2 class="text-primary mt-5">Tarefas cadastradas</h1>
                        <a href="index.php?id=1" class="btn btn-primary">Limpar tudo</a>

                    </div>

                        <table class="table mt-4 table-hover table-bordered">
                            <thead >
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
                                    <td><a href="index.php?delete_id=<?php echo $idTask ?>" class="btn btn-primary">Excluir</a></td>
                                </tr>

                                <?php endforeach?>
                               
                                
                                <?php 

                                     if(isset($_GET['id']) == 1){
                                        limpartudo();
                                     }

                                     if(isset($_GET['delete_id'])){
                                        $delete_id = $_GET['delete_id'];
                                        $key = array_search($delete_id, $_SESSION['id']);

                                        if ($key !== false) {
                                            unset($_SESSION['id'][$key]);
                                            unset($_SESSION['titulo'][$key]);
                                            unset($_SESSION['date'][$key]);
                                            
                                            $_SESSION['id'] = array_values($_SESSION['id']);
                                            $_SESSION['titulo'] = array_values($_SESSION['titulo']);
                                            $_SESSION['date'] = array_values($_SESSION['date']);
                                        }

    
                                            header('Location: index.php');
                                            exit();
                                        }
                                        // $indice = $idTask;
                                        
                                    

                                ?>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>


     

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>