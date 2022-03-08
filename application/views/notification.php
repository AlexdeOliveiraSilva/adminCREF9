<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Notificações</h1>
            </div>

        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">


        <div class="card">
            <div class="card-header">
                Nova Notificação
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('index.php/Notification/add');?>">

                    <div class="row">
                        <div class="col">
                            <label>Título</label>
                            <input type="text" class="form-control" required=true placeholder="Título" value="" autofocus=true name="title" id="title">
                        </div>
                    </div><br />
            

                    <div class="row">
                        <div class="col">
                            <label>Conteúdo</label>
                            <input type="text" class="form-control" maxlength="150" required=true  placeholder="Conteúdo" value=""name="body" id="body">
                        </div>
                    </div><br />

                    <div class="row">
                        <div class="col text-right">
                                <button type=submit class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                  
                    <br />
                </form>

            </div>
        </div>



        <div class="card">
            <div class="card-header">
                Relatório
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data de Hora</th>
                            <th>Titulo</th>
                            <th>Texto</th>
                            <th>Situação</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) :
                        ?>
                            <tr>
                                <td>
                                    <?php echo date("d/m/Y H:i:s", strtotime($item->sendDateTime)); ?>
                                </td>
                                <td>
                                    <?php echo $item->title; ?>
                                </td>
                                <td>
                                    <?php echo $item->body; ?>
                                </td>


                                <td>
                                    <?php echo (date('Y-m-d H:i:s', strtotime($item->sendDateTime)) <= date('Y-m-d H:i:s') ? "Enviado" : "<font color=red>Agendado</font>"); ?>
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