<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php if(isset($title)) echo $title; else echo "Categorias de Parceiros";?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('index.php/'.(isset($backController) ? $backController : "Partners")); ?>"><button class='btn btn-danger'><i class='fa fa-plus'></i> Voltar</button></a>
                        <a href="<?php echo base_url('index.php/'.(isset($controller) ? $controller : "Categorias").'/add'); ?>"><button class='btn btn-success'><i class='fa fa-plus'></i> Adicionar</button></a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<section class="content">
    <div class="container-fluid">


        <div class="card">
            <div class="card-header">
                Categorias
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) :
                        ?>
                            <tr style="cursor:pointer;" onClick="location='<?php echo base_url('index.php/'.(isset($controller) ? $controller : "Categorias").'/edit/' . $item->id) ?>';">
                                <td>
                                    <?php echo $item->id; ?>
                                </td>

                                <td>
                                    <?php echo $item->title; ?>
                                </td>

                                <td>
                                    <?php echo $item->situation == 1 ? "Ativo" : "Apagado"; ?>
                                </td>


                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>





    </div>
</section>