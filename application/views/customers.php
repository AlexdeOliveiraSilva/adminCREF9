<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Clientes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('index.php/Customers/add'); ?>"><button class='btn btn-success'><i class='fa fa-plus'></i> Adicionar</button></a>
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
                <th>Cliente</th>
                <th>E-mail</th>
                <th>Cidade</th>
                <th>CPF</th>
                <th>Empresa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($list as $item) :
              ?>
                <tr style="cursor:pointer;" onClick="location='<?php echo base_url('index.php/Customers/edit/'.$item->id)?>';">
                    <td>
                        <?php echo $item->cliente;?>
                    </td>
                    <td>
                        <?php echo $item->email;?>
                    </td>
                    <td>
                        <?php echo $item->cidade;?>
                    </td>
                    <td>
                        <?php echo $item->cpf;?>
                    </td>

                    <td>
                        <?php echo $item->companysName;?>
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