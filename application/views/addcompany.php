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
                            <label>Domínio</label>
                            <input type="text" class="form-control" required=true placeholder="dominio.com" value="<?php if (isset($partner)) echo $partner->domain; ?>" name="domain" id="domain">
                        </div>

                        <div class="col">
                            <label>Cor padrão</label>
                            <input type="text" class="form-control" required=true placeholder="Código Hexadecimal" value="<?php if (isset($partner)) echo $partner->defaultcolor; ?>" name="defaultcolor" id="defaultcolor">
                        </div>




                    </div>
                    <br />

                    <div class="row">
                        <div class="col">
                            <label>Descrição curta</label>
                            <input type="text" class="form-control" required=true placeholder="Nome" value="<?php if (isset($partner)) echo $partner->description; ?>" autofocus=true name="description" id="description">
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <div class="col">
                            <label>Endereço</label>
                            <input type="text" class="form-control" placeholder="Endreço" value="<?php if (isset($partner)) echo $partner->address; ?>" autofocus=true name="address" id="address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Facebook</label>
                            <input type="text" class="form-control" placeholder="Facebook" value="<?php if (isset($partner)) echo $partner->facebook; ?>" autofocus=true name="facebook" id="facebook">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Instagram</label>
                            <input type="text" class="form-control" placeholder="Instagram" value="<?php if (isset($partner)) echo $partner->instagram; ?>" autofocus=true name="instagram" id="instagram">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" value="<?php if (isset($partner)) echo $partner->email; ?>" autofocus=true name="email" id="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Telefone</label>
                            <input type="text" class="form-control" placeholder="Telefone" value="<?php if (isset($partner)) echo $partner->phone; ?>" autofocus=true name="phone" id="phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Link denuncias</label>
                            <input type="text" class="form-control" placeholder="Link para denuncias" value="<?php if (isset($partner)) echo $partner->linkdenuncias; ?>" autofocus=true name="linkdenuncias" id="linkdenuncias">
                        </div>
                    </div>


                    <br />
                    <div class="row">
                        <div class="col">
                            <label>Texto Atendimento</label>
                            <textarea type="text" class="form-control" rows=2 name="textAtendimento" id="textAtendimento"><?php if (isset($partner)) echo $partner->textAtendimento; ?></textarea>
                        </div>
                    </div>
                    <br />

                

                    <div class="row">
                        <div class="col">
                            <label>Sobre</label>
                            <textarea type="text" class="form-control" rows=10 name="sobre" id="sobre"><?php if (isset($partner)) echo $partner->sobre; ?></textarea>
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <div class="col">
                            <label>Visão</label>
                            <textarea type="text" class="form-control" rows=2 name="visao" id="visao"><?php if (isset($partner)) echo $partner->visao; ?></textarea>
                        </div>
                    </div>

                    <br />
                    <div class="row">

                        <div class="col-2">
                            <label>Imagem área sobre</label>
                            <input type="file" name="imgMissao" id="imgMissao">
                        </div>
                        <?php
                        if (isset($partner)) :
                        ?>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <img style="height: 100px;" src="<?php echo BASE_URL_IMAGEM . $partner->imgMissao; ?>">
                            </div>

                        <?php
                        endif;
                        ?>


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

                        <div class="col-2">
                            <label>Imagem</label>
                            <input type="file" name="logo" id="logo">
                        </div>
                        <?php
                        if (isset($partner)) :
                        ?>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <img style="height: 100px;" src="<?php echo BASE_URL_IMAGEM . $partner->logo; ?>">
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