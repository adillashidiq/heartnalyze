<!-- Begin Page Content -->
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <h2 class="card-header"><?= $title; ?></h2>
                <div class="card-body">

                    <!-- Page Heading -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-6 text-center">
                            <button class="btn btn-primary bg-gradient-primary btnMulai" name="btnMulai">Mulai</button>
                            <form action="/user/survey/save" method="POST" class="formSurvey text-left d-none">
                                <?= csrf_field(); ?>
                                <h5><strong>Pilih gejala yang anda rasakan</strong></h5>
                                <div class="form-group">
                                    <label for="gejala1">Gejala 1</label>
                                    <select class="form-control" name="gejala1" id="gejala1">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    $i=0;
                                    foreach ($gejala1 as $gj1): 
                                        $i++;
                                    ?>
                                        <option value="<?= $gj1; ?>"><?= $gj1; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gejala2">Gejala 2</label>
                                    <select class="form-control" name="gejala2" id="gejala2">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    $i=0;
                                    foreach ($gejala2 as $gj2): 
                                        $i++;
                                    ?>
                                        <option value="<?= $gj2; ?>"><?= $gj2; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gejala3">Gejala 3</label>
                                    <select class="form-control" name="gejala3" id="gejala3">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    $i=0;
                                    foreach ($gejala3 as $gj3): 
                                        $i++;
                                    ?>
                                        <option value="<?= $gj3; ?>"><?= $gj3; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gejala4">Gejala 4</label>
                                    <select class="form-control" name="gejala4" id="gejala4">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    $i=0;
                                    foreach ($gejala4 as $gj4): 
                                        $i++;
                                    ?>
                                        <option value="<?= $gj4; ?>"><?= $gj4; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary" name="namaUser" value="<?= $user; ?>">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->