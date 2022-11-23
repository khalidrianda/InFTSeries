<div class="content-wrapper">
     <section class="content-header">
      <h1>
        Data Projek
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Projek</li>
      </ol>
    </section>

    <section class="content">
        <div>
        <div style="margin-right: 5px" class="navbar-form navbar-left">
            <?php echo form_open('projek/search'); ?>
            <input type="text" name="keyword" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-success">Cari</button>
            <?php echo form_close(); ?>
        </div>
        </div>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th><center>No</center></th>
                <th>Nama Projek</th>
                <th>Tipe Peramalan</th>
                <th>Tipe Data</th>
                <th><center>Jumlah Data</center></th>
                <th><center>Import Data</center></th>
                <th><center>Lihat Data</center></th>
            </tr>
            <?php 
                $no =1;
                foreach($projek as $pjk) : ?>
            <tr>
                <?php $query=$this->db->query('SELECT * FROM bandwidth WHERE id_projek = '.$pjk->id); ?>
                <td><center><?php echo $no++ ?></center></td>
                <td><?php echo $pjk->title_projek ?></td>
                <td><?php echo $pjk->tipe ?></td>
                <td><?php echo $pjk->ket ?></td>
                <td><center><?php echo $query->num_rows() ?></center></td>
                <td><center><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1" data-id="<?php echo $pjk->id; ?>"><i class="fa fa-file"></i> Import Data</button></center></td>
                <td><center><?php echo anchor('data/detail/'.$pjk->id.'/'.$pjk->ket, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>'); ?></center></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </section>
</div>
<!-- Modal Import Data-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Import File</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('assets/uploadc.php'); ?>" id="import_form" enctype="multipart/form-data">
             <div class="form-group">
                <label>Select excel file</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="hidden" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                <input type="file" name="file" id="file" required accept=".xls, xlsx" class="form-control">    
            </div>
            <button type="submit" name="import" value="Import" class="btn btn-info">Import</button>
           </form>
      </div>
    </div>
  </div>
</div>

<script>

    $(document).ready(function(){
        $("#exampleModal1").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)

        });
    });
</script>