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

    <div class="row">
      <div class="col-lg-12">
        <select name="company" class="form-control" onchange="location='<?php echo base_url('index.php/Customers/index');?>/' + this.value;">
            <?php
            echo "<option value=\"\">Todas Empresa</option>";
                  foreach($companys as $item){
                    echo "<option value='".$item->id."'";
                    if($item->id == $companyId){
                      echo " selected";
                    }
                    echo ">".$item->name."</option>";
                  }
            ?>
        </select>
      </div>
    </div><br />
      <div class="card">
        <div class="card-header">
          Formulário
        </div>
        <div class="card-body">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Documento</th>
                <th>Empresa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($list as $item) :
              ?>
                <tr style="cursor:pointer;" onClick="location='<?php echo base_url('index.php/Customers/edit/'.$item->id)?>';">
                    <td>
                        <?php echo $item->name;?>
                    </td>
                    <td>
                        <?php echo $item->registration;?>
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