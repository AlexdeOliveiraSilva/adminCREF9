<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('index.php/Companys/'); ?>"><button class='btn btn-danger'>Cancelar</button></a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <form method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    Formulário
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label>Nome</label>
                            <input type="text" class="form-control" required=true placeholder="Nome" value="<?php if (isset($partner)) echo $partner->name; ?>" autofocus=true name="name" id="name">
                        </div>

                        <div class="col">
                            <label>Documento</label>
                            <input type="text" class="form-control" required=true placeholder="CPF ou Matricula" value="<?php if (isset($partner)) echo $partner->registration; ?>" name="registration" id="registration">
                        </div>

                        <div class="col">
                            <label>Senha</label>
                            <input type="password" class="form-control" <?php if (!isset($partner)) echo "required=true"; ?> placeholder="******" value="" name="password" id="password">
                        </div>

                    </div>
                    <br />


                    <div class="row">
                        <label>Situação</label>
                        <select class="form-control" name="situation" id="situation">
                            <option value="1">Ativo</option>
                            <option value="2" <?php if (isset($partner)) if ($partner->situation == 2) echo " selected"; ?>>Cancelado</option>
                        </select>
                    </div>

                    <br />

                    <div class="row">
                        <label>Empresa</label>
                        <select class="form-control" name="companysId" id="companysId">
                            <option disabled=true>Selecione</option>
                            <?php
                            foreach ($companies as $item) {
                                echo "<option value=\"" . $item->id . "\"";
                                if (isset($partner))
                                    if ($item->id == $partner->companysId) {
                                        echo " selected";
                                    }
                                echo ">" . $item->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-right">
                        <button type="submit" class="btn btn-primary">Salvar e publicar</button>
                    </div>
                </div><br />
            </div>

    </div>

    </form>


</section>