            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Heartnalyze 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih Logout untuk mengakhiri sesi.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keterangan Modal -->
            <div class="modal fade" id="keteranganModal" tabindex="-1" role="dialog" aria-labelledby="keteranganModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="keteranganModalLabel">Keterangan Penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card">
                        <h2 class="card-header">
                            <input type="text" readonly class="form-control-plaintext font-weight-bold" id="penyakit">
                        </h2>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="16"></textarea>
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

            <!-- Edit Profil Modal -->
            <div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="editProfilModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfilModalLabel">Update Data Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/profile/edit" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="usernameProfile">Username</label>
                                <input type="text" class="form-control" id="usernameProfile" name="username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control" name="gender" id="genderEdit">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emailProfile">Email</label>
                                <input type="text" class="form-control" id="emailProfile" name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamatProfile">Alamat</label>
                                <input type="text" class="form-control" id="alamatProfile" name="alamat">
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
            <!-- Lihat Profil Modal -->
            <div class="modal fade" id="lihatProfilModal" tabindex="-1" role="dialog" aria-labelledby="lihatProfilModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatProfilModalLabel">Data Profil Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/profile/edit" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="usernameLihat">Username</label>
                                <input type="text" class="form-control" id="usernameLihat" name="username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="namaLihat">Nama</label>
                                <input type="text" class="form-control" id="namaLihat" name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahirLihat">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahirLihat" name="tempat_lahir" readonly> 
                                <input type="date" class="form-control" id="tanggal_lahirLihat" name="tanggal_lahir" readonly>
                            </div>
                            <div class="form-group">
                                <label for="genderLihat">Jenis Kelamin</label>
                                <select class="form-control" name="gender" id="genderLihat" readonly>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emailLihat">Email</label>
                                <input type="text" class="form-control" id="emailLihat" name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamatLihat">Alamat</label>
                                <input type="text" class="form-control" id="alamatLihat" name="alamat" readonly>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="/vendor/jquery/jquery.min.js"></script>
            <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="/js/sb-admin-2.min.js"></script>
            <script src="/js/script.js"></script>

            <!-- Page level plugins -->
            <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="/js/demo/datatables-demo.js"></script>

            </body>

            </html>