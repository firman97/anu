


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Warta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="#" class="act-btn" data-toggle="modal" data-target="#exampleModal">+</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?php echo base_url('admin/warta/tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="titleWarta" class="col-form-label">Judul</label>
                            <input type="text" class="form-control" id="titleWarta" name="titleWarta">
                          </div>
                          <div class="form-group">
                            <label class="col-form-label">Kategori</label>
                            <select name="categoryWarta" class="form-control">
                              <option value="1">Nasional</option>                
                              <option value="2">Daerah</option>                
                              <option value="3">Internasional</option>                           
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="contentWarta" class="col-form-label">Isi</label>
                            <textarea class="form-control" id="contentWarta" name="contentWarta"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="gambarWarta" class="col-form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambarWarta" name="gambarWarta">
                          </div>
                        </div>
                        <div class="modal-footer">

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <!-- <input type="submit" name="submit" value="Tambah" class="btn btn-secondary"> -->
                          <button type="submit" class="btn btn-secondary">Tambah</button>
                        </div>
                      </form>
                      
                      
                    </div>
                  </div>
                </div>
                <h3 class="card-title">Tabel Warta</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Konten</th>
                      <th>Kategori</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1; 
                      foreach($warta->result() as $key => $wartas ) : 
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $wartas->title; ?></td>
                      <td>
                        <?php $konten = $wartas->content;
                        $konten = character_limiter($konten,100); 
                        echo $konten; ?>

                      </td>
                      <td><?= $wartas->category_name; ?></td>
                      <td><?= $wartas->image; ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/warta/hapus/'.$wartas->blog_id) ?>"><i class='fas fa-trash'></i></a>
                        <a href="<?php echo base_url('admin/warta/edit/'.$wartas->blog_id) ?>"><i class='fas fa-edit'></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->

