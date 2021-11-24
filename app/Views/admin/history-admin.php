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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Gejala</th>
                            <th>Indikasi Penyakit</th>
                            <th>Waktu Pemeriksaan</th>
                            <th>Data Pengguna</th>
                            <th>Resep Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($history['history'] as $hs): ?>
                        <tr>
                            <?php if(!empty($hs)): ?>
                                <td><?= $i++;; ?></td>
                                <td><?= $hs['nama']; ?></td>
                                <td><?= $hs['gejala']; ?></td>
                                <td><?= $hs['penyakit']; ?></td>
                                <td><?= $hs['created_at']; ?></td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary tampilModalLihatProfil" data-toggle="modal" data-target="#lihatProfilModal" data-id="<?= $hs['id']; ?>">
                                    Lihat
                                    </button>
                                </td>
                                <td>
                                    <?php if ($hs['resep_dokter'] == null): ?>
                                        <button type="button" class="btn btn-primary tampilModalKonfirmasiResep" data-toggle="modal" data-target="#konfirmasiResepModal" data-id="<?= $hs['id']; ?>">
                                            Konfirmasi Resep
                                        </button>
                                    <?php endif; ?>
                                    
                                    <?php if ($hs['resep_dokter'] !== null): ?>
                                        <button type="button" class="btn btn-primary tampilModalResepDokter" data-toggle="modal" data-target="#resepDokterModal" data-id="<?= $hs['id']; ?>">
                                            Lihat
                                        </button>
                                    <?php endif; ?>                                        
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

<!-- Antrian Resep Modal -->
<div class="modal fade" id="konfirmasiResepModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiResepModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiResepModalLabel">Konfirmasi Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambah-resep" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group d-none">
                        <input type="text" class="idPemeriksaan" id="idPemeriksaan" name="idPemeriksaan" required>
                    </div>
                    <div class="form-group">
                        <label for="resep_dokter">Tambahkan Resep Dokter</label>
                        <textarea class="form-control" id="resep_dokter" name="resep_dokter" rows="8" required></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>            
        </div>
    </div>
</div>
<!-- Resep Dokter Modal -->
<div class="modal fade" id="resepDokterModal" tabindex="-1" role="dialog" aria-labelledby="resepDokterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resepDokterModalLabel">Resep Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control resep_dokter" id="resep_dokter" name="resep_dokter" rows="8"></textarea>
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