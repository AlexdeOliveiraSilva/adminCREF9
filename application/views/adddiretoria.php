<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('index.php/Diretoria/'); ?>"><button class='btn btn-danger'>Cancelar</button></a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <form method="post" action="<?php echo $action; ?>" onsubmit="return savePartner()" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    Formulário
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label>Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" value="<?php if (isset($partner)) echo $partner->name; ?>" autofocus=true name="name" id="name">
                        </div>

                        <div class="col">
                            <label>Cargo</label>
                            <input type="text" class="form-control" placeholder="Cargo" value="<?php if (isset($partner)) echo $partner->office; ?>" autofocus=true name="office" id="office">
                        </div>

                        <div class="col">
                            <label>Situação</label>
                            <select class="form-control" name="situation" id="situation">
                                <option value="1">Ativo</option>
                                <option value="2" <?php if (isset($partner)) if ($partner->situation == 2) echo " selected"; ?>>Cancelado</option>
                            </select>
                        </div>


                    </div>
                    <br />




                    <br />
                    <div class="row">
                        <div class="col">
                            <label>Código</label>
                            <input type="text" value="<?php if (isset($partner)) echo $partner->code; ?>" class="form-control" placeholder="Registro CREF" name="code" id="code">
                        </div>

                        <div class="col">
                            <label>Vencimento do mandato</label>
                            <input type="text" value="<?php if (isset($partner)) if (!empty($partner->dueDate)) echo date("d/m/Y", strtotime($partner->dueDate)); ?>" class="form-control" placeholder="__/__/____" name="dueDate" id="dueDate">
                        </div>


                    </div>

                    <br />

                    <div class="row">
                        <div class="col">
                            <label>Order de exibição(Quanto menor o número mais em cima)</label>
                            <input type="number" value="<?php if (isset($partner)) echo $partner->ord; ?>" class="form-control" placeholder="Número" name="ord" id="ord">
                        </div>




                    </div>




                    <br />
                    <div class="row">

                        <div class="col-2">
                            <label>Imagem</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <?php
                        if (isset($partner)) :
                        ?>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <img style="height: 100px;" src="<?php echo BASE_URL_IMAGEM . $partner->img; ?>">
                            </div>

                        <?php
                        endif;
                        ?>


                    </div>


                    <div class="row">
                        <div class="col-lg-12 text-right">


                            <button type="submit" class="btn btn-primary">Salvar e publicar</button>
                        </div>
                    </div>
                </div>

            </div>



    </div>
    </form>


</section>