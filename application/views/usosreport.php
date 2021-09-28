<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Utilizações</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

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

                            <th>Registro Usuário</th>
                            <th>Empresa</th>
                            <th>Data e Hora</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) :
                        ?>
                            <tr style="cursor:pointer;">
                                <td>
                                    <?php echo $item->registration; ?>
                                </td>

                                <td>
                                    <?php echo $item->partners; ?>
                                </td>

                                <td>
                                    <?php echo $item->createdAt; ?>
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