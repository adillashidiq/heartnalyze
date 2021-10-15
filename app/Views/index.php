<body>
    <!-- navbar -->
    <div class="col-12 bg-gradient-info" style="width: 100%;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-info ">
            <div class="container">
                <a class="text-decoration-none text-light sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
                    <div class="sidebar-brand-icon">
                        <img src="/img/logo heartnalyze.svg" style="width: 65px; border-radius: 15%;">
                    </div>
                    <div class="sidebar-brand-text mx-2">
                        <h3> Heartnalyze </h3>
                    </div>
                </a>
                <ul class="navbar-nav ml-auto float-right">
                    <li class="nav-item">
                        <?php if (logged_in()) : ?>
                            <a class="nav-link" href="/logout"><i class="fas fa-sign-in-alt mr-2"> logout</i></a>
                        <?php else : ?>
                            <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt mr-2"> login</i></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
    </div>
    </nav>
    </div>
    <!-- akhir navbar -->
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-4 text-dark font-weight-bold text-center">
                Cek Risiko Penyakit Jantung
            </h3>
            <h5 class="text-center">
                Ketahui tingkat risiko gangguan jantung
                dan pembuluh darah, disertai rekomendasi pola hidup sehat.
            </h5>
        </div>
        <img src="/img/foto1.png" class="rounded mx-auto d-block" alt="Responsive image" width="45%">

        <div class="container">
            <div class="card">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="text-dark font-weight-bold text-left">
                                        Tahukah Kamu Penyakit Jantung?
                                    </h5>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                Jantung adalah organ terpenting dalam tubuh manusia dan mempunyai ukuran sebesar
                                kepalan
                                tangan. Jantung berfungsi memompa dan menyebarkan darah dengan mengangkut oksigen ke
                                seluruh tubuh.
                                <br>
                                <br>
                                Penyakit jantung menggambarkan serangkaian kondisi yang memengaruhi jantung.
                                Beberapa
                                kondisi yang dapat memengaruhi kondisi kesehatan jantung adalah penyakit pembuluh
                                darah,
                                seperti penyakit arteri koroner, gangguan detak (irama) jantung, dan juga cacat
                                jantung
                                bawaan.
                                <br>
                                <br>
                                Istilah penyakit jantung juga kerap dikaitkan dengan penyakit kardiovaskular.
                                Penyakit
                                ini umumnya mengacu pada kondisi yang melibatkan penyempitan atau penyumbatan
                                pembuluh
                                darah yang dapat menyebabkan serangan jantung, nyeri dada (angina), atau stroke.

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="text-dark font-weight-bold text-left">
                                        Jenis Penyakit Jantung
                                    </h5>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <ul>1. Penyakit arteri koroner (penyakit jantung koroner) – penyempitan pembuluh darah
                                    jantung.</ul>
                                <ul>2. Aritmia – gangguan pada irama jantung. </ul>
                                <ul>3. Penyakit jantung bawaan – kelainan jantung sejak lahir.</ul>
                                <ul>4. Kardiomiopati – gangguan pada otot jantung.</ul>
                                <ul>5. Infeksi jantung – infeksi pada jantung akibat bakteri, virus, atau parasit.</ul>
                                <ul>6. Penyakit katup jantung – gangguan pada salah satu atau keempat katup jantung.
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5 class="text-dark font-weight-bold text-left">
                                        Penyebab Penyakit Jantung
                                    </h5>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <ul>Terdapat beberapa faktor yang menjadi penyebab penyakit jantung, seperti:</ul>
                                <ul>1. Kebiasaan merokok.</ul>
                                <ul>2. Kadar kolesterol yang tinggi.</ul>
                                <ul>3. Pola hidup tidak terjaga.</ul>
                                <ul>4. Hipertensi atau tekanan darah tinggi meningkat.</ul>
                                <ul>5. Kelebihan berat badan.</ul>
                                <ul>6. Adanya penyakit diabetes.</ul>
                                <ul>7. Faktor usia dan jenis kelamin.</ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="#"><br>
                        <h5 class="text-dark font-weight-bold text-left">
                            <span> Cek apakah anda menderita penyakit jantung</span>
                            <span style="float : right">
                                <button class="btn btn-info bg-gradient-info"><a href="/user/survey" class="text-light text-decoration-none">di sini</a>
                                </button>
                            </span>
                        </h5>
                    </div>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div>
                                <img src="/img/logo heartnalyze.svg" style="width: 65px;">
                            </div>
                            <div class="col-4 mt-2">
                                <h3 class="text-info"> Heartnalyze</h3>
                            </div>
                        </div>
                    </div> <br>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Heartnalyze merupakan sebuah sistem aplikasi berbasis website dalam bidang
                                    kesehatan terutama jantung. Sistem ini memiliki fungsi untuk mendiagnosis penyakit
                                    jantung. Cek kesehatan jantung anda sekarang. Hindari resiko sejak dini untuk
                                    meminimalisir kemungkinan terburuk yang akan terjadi!!
                                </p><br>
                                <h5 class="font-weight-bold text-dark">Sehat dari sekarang dengan Asisten Kesehatan bagi
                                    Keluargamu</h5>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

    </div>

    <!-- akhir jumbotron -->



</body>