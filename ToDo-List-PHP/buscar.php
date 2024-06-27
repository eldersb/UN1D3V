<?php

session_start();

$buscarTarefa = $_GET['buscar'] ?? "";


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Tarefas</title>
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
                    <h2 class="text-primary mt-5">Buscar Tarefas</h2>
                    <form class="mt-2 mb-5" action="">
                        <div class="mt-2 d-flex justify-content-center align-items-end">
                            <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Digite a tarefa a ser buscada">
                            <input type="submit" class="btn btn-primary mt-2" value="Buscar tarefa">
                        </div>
                    </form>
                </div>
            </div>

            <?php

            if ($buscarTarefa != "" && strlen($buscarTarefa) >= 3) {
                $cont = 0;
                $encontrado = false; 
                $tabelaAberta = false;
                foreach (array_map(null, $_SESSION['id'], $_SESSION['titulo'], $_SESSION['date']) as [$idTarefa, $tituloTarefa, $dateTarefa]) {
                    if (str_contains(strtolower($tituloTarefa), strtolower($buscarTarefa))) {
                        $cont++;
                        $encontrado = true;

                        if(!$tabelaAberta){
                            echo '<table class="table mt-4 table-hover table-bordered">
                            <thead >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>';
                            

                            $tabelaAberta = true;

                        }
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($idTarefa) . '</td>';
                        echo '<td>' . htmlspecialchars($tituloTarefa) . '</td>';
                        echo '<td>' . htmlspecialchars($dateTarefa) . '</td>';
                        echo '<td><a href="#""' . htmlspecialchars($idTarefa) . ' class="btn btn-primary">Excluir</a></td>';
                        echo '</tr>';

                       
                        
                      
                        
                    }
                }


                if($encontrado) {
                    echo  "<h5>Foram encontrados $cont registros com a palavra-chave: $buscarTarefa";
                } 
                else {
                  echo  "<div class='alert alert-warning mt-3'>
                    <strong>Ops!!!</strong><br>
                    Não foram encontrados registros com a palavra-chave: <strong>$buscarTarefa</strong>
                  </div>";
                }

            } 

        

            ?>

            <?php if (strlen($buscarTarefa) < 3) : ?>
                <div class="alert alert-danger mt-5">
                    <strong>Ops!!!</strong><br>
                    Você precisa informar ao menos 3 caracteres para realizar uma busca!
                </div>
            <?php endif; ?>

        </div>






    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>