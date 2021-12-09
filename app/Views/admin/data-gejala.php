<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Indikasi Penyakit</th>
                            <th>Gejala 1</th>
                            <th>Gejala 2</th>
                            <th>Gejala 3</th>
                            <th>Gejala 4</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0;
                            foreach ($gejala['gejala'] as $gj): 
                                $i++;
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $gj['penyakit']; ?></td>
                            <td><?= $gj['gejala1']; ?></td>
                            <td><?= $gj['gejala2']; ?></td>
                            <td><?= $gj['gejala3']; ?></td>
                            <td><?= $gj['gejala4']; ?></td>
                            <td>
                                <div class="row m-1">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary modal-tampilKeterangan" data-toggle="modal" data-target="#modal-lihatKeterangan" data-id="<?= $gj['id']; ?>">
                                            Lihat
                                        </button>
                                        <div class="modal fade" id="modal-lihatKeterangan">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Keterangan Penyakit</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <input type="text" readonly class="form-control-plaintext font-weight-bold" id="lihatNamaPenyakit">
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="lihatKeterangan" class="form-label">Keterangan</label>
                                                                        <textarea id="lihatKeterangan" rows="16" class="form-control" name="keterangan"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <div class="row float-right">
                                                        <div class="col">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row m-1">
                                    <div class="col-12">
                                    <button type="button" class="btn btn-sm btn-primary modal-editDataGejala" data-toggle="modal" data-target="#modal-editDataGejala" data-id="<?= $gj['id']; ?>">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-editDataGejala">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Gejala</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="/admin/data-gejala/edit" method="post">
                                                <?= csrf_field(); ?>
                                                <!-- id -->
                                                <input id="editIdPenyakit" type="text" class="d-none" name="id" required>
                                                <!-- nama penyakit -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editNamaPenyakit" class="form-label">Nama Penyakit</label>
                                                        <input id="editNamaPenyakit" type="text" class="form-control" name="namaPenyakit" required>
                                                    </div>
                                                </div>
                                                <!-- gejala1 -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editGejala1" class="form-label">Gejala 1</label>
                                                        <input id="editGejala1" type="text" class="form-control" name="gejala1" required>
                                                    </div>
                                                </div>
                                                <!-- gejala2 -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editGejala2" class="form-label">Gejala 2</label>
                                                        <input id="editGejala2" type="text" class="form-control" name="gejala2" required>
                                                    </div>
                                                </div>
                                                <!-- gejala3 -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editGejala3" class="form-label">Gejala 3</label>
                                                        <input id="editGejala3" type="text" class="form-control" name="gejala3" required>
                                                    </div>
                                                </div>
                                                <!-- gejala4 -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editGejala4" class="form-label">Gejala 4</label>
                                                        <input id="editGejala4" type="text" class="form-control" name="gejala4" required>
                                                    </div>
                                                </div>
                                                <!-- keterangan -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="editKeterangan" class="form-label">Keterangan</label>
                                                        <textarea id="editKeterangan" rows="16" class="form-control" name="keterangan" required></textarea>
                                                    </div>
                                                </div>
                        
                                                <div class="modal-footer">
                                                    <div class="row float-right">
                                                        <div class="col px-0 ml-3 mr-1">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                        <div class="col px-0 mx-0">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    </div>
                                </div>
                                <div class="row m-1 text-center">
                                    <div class="col-12">
                                    <form action="/admin/data-gejala/delete" method="POST">
                                        <?= csrf_field(); ?>                              
                                        <!-- id -->
                                        <input id="editIdPenyakit" type="text" class="d-none" name="id" value="<?= $gj['id']; ?>" required>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->