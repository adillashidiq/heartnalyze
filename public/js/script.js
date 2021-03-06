const btnMulai = document.querySelector('.btnMulai');
const formSurvey = document.querySelector('.formSurvey');

$('.btnMulai').click(function () {
  formSurvey.classList.toggle('d-none');
  btnMulai.classList.toggle('d-none');
});

$(function () {
  $('.tampilModalKeterangan').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/user/history/getDataPenyakit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#penyakit').val(data.penyakit);
        $('#keterangan').val(data.keterangan);
      },
    });
  });
});

$(function () {
  $('.tampilModalResepDokterUser').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/user/history/getDataPenyakit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('.penyakit').val(data.penyakit);
        $('.resep_dokter_user').val(data.resep_dokter);
      },
    });
  });
});
$(function () {
  $('.tampilModalKonfirmasiResep').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/history/getDataPemeriksaan',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#idPemeriksaan').val(data.id);
      },
    });
  });
});
$(function () {
  $('.tampilModalResepDokter').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/history/getDataPemeriksaan',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('.resep_dokter').val(data.resep_dokter);
      },
    });
  });
});
$(function () {
  $('.tampilModalEditProfil').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/user/profile/getDataUser',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#usernameProfile').val(data.username);
        $('#nama').val(data.nama);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tanggal_lahir').val(data.tanggal_lahir);
        $('#genderEdit').val(data.gender);
        $('#emailProfile').val(data.email);
        $('#alamatProfile').val(data.alamat);
      },
    });
  });
});
$(function () {
  $('.tampilModalLihatProfil').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/history/getDataUser',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#usernameLihat').val(data.username);
        $('#namaLihat').val(data.nama);
        $('#tempat_lahirLihat').val(data.tempat_lahir);
        $('#tanggal_lahirLihat').val(data.tanggal_lahir);
        $('#genderLihat').val(data.gender);
        $('#emailLihat').val(data.email);
        $('#alamatLihat').val(data.alamat);
      },
    });
  });
});

$(function () {
  $('.modal-tampilKeterangan').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/data-gejala/getKeteranganPenyakit',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#lihatNamaPenyakit').val(data.penyakit);
        $('#lihatKeterangan').val(data.keterangan);
      },
    });
  });
});
$(function () {
  $('.modal-editDataGejala').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/data-gejala/editDataGejala',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#editIdPenyakit').val(data.id);
        $('#editNamaPenyakit').val(data.penyakit);
        $('#editGejala1').val(data.gejala1);
        $('#editGejala2').val(data.gejala2);
        $('#editGejala3').val(data.gejala3);
        $('#editGejala4').val(data.gejala4);
        $('#editKeterangan').val(data.keterangan);
      },
    });
  });
});
$(function () {
  $('.modal-editLevelPengguna').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/admin/data-user/editLevelPengguna',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#editIdPengguna').val(data.user_id);
        $('#editLevel').val(data.group_id);
      },
    });
  });
});
