<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- DataTales Example -->
    <?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('msg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Indikasi Penyakit</th>
                            <th>Waktu Pemeriksaan</th>
                            <th>Keterangan Penyakit</th>
                            <th>Resep Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($history as $hs): ?>
                        <tr>
                            <?php if(!empty($hs)): ?>
                                <?php if($hs['nama'] == $user):?>
                                    <td><?= $i++;; ?></td>
                                    <td><?= $hs['gejala']; ?></td>
                                    <td><?= $hs['penyakit']; ?></td>
                                    <td><?= $hs['created_at']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary tampilModalKeterangan" data-toggle="modal" data-target="#keteranganModal" data-id="<?= $hs['id']; ?>">
                                        Lihat
                                        </button>
                                    </td>
                                    <td>
                                        <?php if ($hs['resep_dokter'] == null): ?>
                                            <button type="button" class="btn btn-sm btn-secondary">
                                                Menunggu Konfirmasi
                                            </button>
                                        <?php endif; ?>
                                        
                                        <?php if ($hs['resep_dokter'] !== null): ?>
                                            <button type="button" class="btn btn-primary tampilModalResepDokterUser" data-toggle="modal" data-target="#resepDokterUserModal" data-id="<?= $hs['id']; ?>">
                                                Lihat
                                            </button>
                                        <?php endif; ?>                                        
                                    </td>
                                <?php endif; ?>
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

<!-- Button trigger modal -->

<!-- Modal menampilkan resep dokter-->
<div class="modal fade" id="resepDokterUserModal" tabindex="-1" role="dialog" aria-labelledby="resepDokterUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="resepDokterUserModalLabel">Resep Dokter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="card">
            <h2 class="card-header">
                <input type="text" readonly class="penyakit form-control-plaintext font-weight-bold">
            </h2>
            <div class="card-body">
                <div class="form-group">
                    <textarea class="form-control resep_dokter_user" name="resep_dokter" rows="8"></textarea>
                </div>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>