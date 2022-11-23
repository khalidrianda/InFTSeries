      <!-- Begin Page Content -->
        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                <?php echo $title; ?>
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-dashboard"></i>User</a></li>
                <li class="active"><?php echo $title; ?></li>
              </ol>
            </section>
          <!-- Page Heading -->
          <section class="content">
            <?php echo $this->session->flashdata('message');?>
            <center><div class="card text-white bg-info mb-3" style="max-width: 440px;">
              <div class="card-header"><h1 class="h3 mb-4 text-gray-100"><center><br><?php echo $user['name']; ?>'s Profile</center></h1></div>
              <br>
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?php echo base_url('assets/img/profile/').$user['image']; ?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <b class="card-title"><?php echo $user['name']; ?></b>
                      <p class="card-text"><?php echo $user['email']; ?></p>
                      <p class="card-text"><small class="text-muted">Member since <?php echo date('d F Y', $user['date_created']); ?></small></p>
                      <button type="button" class="btn waves-effect waves-light btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalEdit"
                  data-id="<?php echo $user['id']; ?>" data-name="<?php echo $user['name']; ?>" data-images="<?php echo $user['image']; ?>">Update Data User</button>
                       <button type="button" style="margin-left: 5px" class="btn waves-effect waves-light btn-primary btn-sm" data-toggle="modal" data-target="#gantipassword" data-id="<?php echo $user['id']; ?>" data-passwordlama="<?php echo $user['password']; ?>">Ganti Password</button>
                    </div>
                  </div>
                  
                </div>
                <br>
              </div></center>
          </section>

        </div>
        <!-- /.container-fluid -->

<!-- Modal Edit-->
<div class="modal" id="exampleModalEdit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <?php echo form_open_multipart('user/tambah_aksi'); ?>
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id"  name="id">
                                            <input type="hidden" class="form-control" id="images"  name="images">
                                            <label class="bmd-label-floating">Nama</label>
                                            <input type="text" class="form-control" id="name"  name="name">
                                            <label class="bmd-label-floating">Upload Image</label>
                                            <input type="file" class="form-control" id="image"  name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        style="margin-right: 10px">Batal
                                </button>
                                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

<div class="modal" id="gantipassword" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?php echo base_url('user/ganti_password'); ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id"  name="id">
                                            <label class="bmd-label-floating">Password Lama</label>
                                            <input type="password" class="form-control" id="passwordlama1"  name="passwordlama1">
                                        </div>  

                                        <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="hidden" class="form-control" id="passwordlama"  name="passwordlama">
                                            <label class="bmd-label-floating">Password Baru</label>
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                             <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                                          </div>
                                          <div class="col-sm-6">
                                            <label class="bmd-label-floating">Repeat Password Baru</label>
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        style="margin-right: 10px">Batal
                                </button>
                                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<script>

    $(document).ready(function(){
        $("#exampleModalEdit").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            var name = button.data('name')
            var images = button.data('images')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #images').val(images)

        });
    });
</script>

<script>

    $(document).ready(function(){
        $("#gantipassword").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            var passwordlama = button.data('passwordlama')
            
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #passwordlama').val(passwordlama)
            

        });
    });
</script>