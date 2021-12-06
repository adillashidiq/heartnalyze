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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Waktu Pendaftaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                        <?php foreach ($AllUser as $all): ?>
                        <tr>
                            <?php if(!empty($all)): ?>
                                <td><?= $i++;; ?></td>
                                <td><?= $all['username']; ?></td>
                                <td><?= $all['email']; ?></td>

                                <?php if($all['active']==1): ?>
                                    <td>Aktif</td>
                                <?php endif; ?>
                                <?php if($all['active']==0): ?>
                                    <td>Nonaktif</td>
                                <?php endif; ?>

                                <?php if($all['group_id']==1): ?>
                                    <td>Admin</td>
                                <?php endif; ?>
                                <?php if($all['group_id']==2): ?>
                                    <td>Member</td>
                                <?php endif; ?>

                                <td><?= $all['created_at']; ?></td>

                                <td>
                                <div class="row m-1 ">
                                    <div class="col-12">
                                    <button type="button" class="btn btn-sm btn-primary modal-editLevelPengguna" data-toggle="modal" data-target="#modal-editLevelPengguna" data-id="<?= $all['id']; ?>">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-editLevelPengguna">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Level Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="/admin/data-user/edit" method="post">
                                                <?= csrf_field(); ?>
                                                <!-- id -->
                                                <input id="editIdPengguna" type="text" class="d-none" name="id" required>
                                                <!-- Edit Level -->
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label for="pilihLevel" class="form-label">Pilih Level</label>
                                                        <select class="form-control" name="level" id="editLevel">
                                                            <option value="1">Admin</option>
                                                            <option value="2">Member</option>
                                                        </select>                              
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
                                <div class="row m-1">
                                    <div class="col-12">
                                    <form action="/admin/data-user/delete" method="POST">
                                        <?= csrf_field(); ?>                              
                                        <!-- id -->
                                        <input id="editIdPengguna" type="text" class="d-none" name="id" value="<?= $all['id']; ?>" required>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    </div>
                                </div>
                            </td>

                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->