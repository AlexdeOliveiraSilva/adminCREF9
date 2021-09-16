<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('index.php/Partners/'); ?>"><button class='btn btn-danger'>Cancelar</button></a>
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
                            <input type="text" class="form-control" placeholder="Nome" value="<?php if (isset($partner)) echo $partner->title; ?>" autofocus=true name="title" id="title">
                        </div>

                        <div class="col">
                            <label>Situação</label>
                            <select class="form-control" name="situation" id="situation">
                                <option value="1">Ativo</option>
                                <option value="2" <?php if (isset($partner)) if ($partner->situation == 2) echo " selected"; ?>>Cancelado</option>
                            </select>
                        </div>

                    </div>
                    </br>
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