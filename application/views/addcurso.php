<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('index.php/Cursos/'); ?>"><button class='btn btn-danger'>Cancelar</button></a>
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
                            <label>Categoria</label>
                            <select class="form-control" name="coursesCategoriesId" id="coursesCategoriesId">
                                <?php
                                foreach ($categories as $item) {
                                    echo "<option value=\"" . $item->id . "\"";
                                    if (isset($partner))
                                        if ($partner->coursesCategoriesId == $item->id)
                                            echo " selected";
                                    echo ">" . $item->title . "</option>";
                                }
                                //if (isset($partner)) echo $partner->name;
                                ?>
                            </select>
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
                            <label>Link Externo</label>
                            <input type="url" value="<?php if (isset($partner)) echo $partner->link; ?>" class="form-control" placeholder="Link Externo" name="link" id="link">
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