<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Diretoria</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">

                        <a href="<?php echo base_url('index.php/Diretoria/add'); ?>"><button class='btn btn-success'><i class='fa fa-plus'></i> Adicionar</button></a>
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
                Formulário
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Validade</th>
                            <th>Empresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) :
                        ?>
                            <tr style="cursor:pointer;" onClick="location='<?php echo base_url('index.php/Diretoria/edit/' . $item->id) ?>';">

                                <td>
                                    <?php echo $item->name; ?>
                                </td>

                                <td>
                                    <?php echo $item->office; ?>
                                </td>
                                <td>
                                    <?php if (!empty($item->dueDate)) echo date("d/m/Y", strtotime($item->dueDate)); ?>
                                </td>
                                <td>
                                    <?php echo $item->companyName; ?>
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