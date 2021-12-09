<?php

namespace App\Controllers;

use App\Models\User;
use Myth\Auth\Models\UserModel;
use App\Models\Profile;
use App\Controllers\BaseController;
use App\Models\AuthGroupsUsers;
use App\Models\Gejala;

class Admin extends BaseController
{
    public function index()
    {
        $user = new UserModel();

        $dataHistory = $this->historyModel();
        $dataGejala = $this->gejala();
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $AllUser = $user->findAll();
        $data = [
            'title' => 'Admin Dashboard',
            'gejala' => $dataGejala,
            'history' => $dataHistory,
            'AllUser' => $AllUser,
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/index');
        echo view('templates/footer');
    }


    public function dataUser()
    {
        $user = new UserModel();
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $data = [
            'title' => 'Data Pengguna',
            'user' => $dataUser->username,
            'AllUser' => $user->getLevelId()
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');

        echo view('admin/data-user');

        echo view('templates/footer');
    }

    public function dataGejala()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();
        $data = [
            'title' => 'Data Gejala',
            'gejala' => $dataGejala,
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/data-gejala');
        echo view('templates/footer');
    }
    public function history()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataHistory = $this->historyModel();
        $resep_request = $this->historyModel->where('resep_dokter',null)->findAll();
        $data = [
            'title' => 'Data Pemeriksaan',
            'history' => $dataHistory,
            'user' => $dataUser->username,
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/history-admin');
        echo view('templates/footer');
    }
    public function tambahGejala()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();

        $data = [
            'title' => 'Tambah Data Gejala',
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/tambah-gejala');
        echo view('templates/footer');
    }

    public function tambahResep()
    {
        $id = $this->request->getVar('idPemeriksaan');
        $resepDokter = $this->request->getVar('resep_dokter');

        $tambahResep = $this->historyModel->update($id,[
            'resep_dokter' => $resepDokter
        ]);
        session()->setFlashdata('msg', 'Resep dokter berhasil dikonfirmasi');
        return redirect('admin/history');
    }
    public function saveTambahGejala()
    {
        $data = $this->request->getVar();
        $penyakit = $data['penyakit'];
        $gejala1 = strtolower($data['gejala1']);
        $gejala2 = strtolower($data['gejala2']);
        $gejala3 = strtolower($data['gejala3']);
        $gejala4 = strtolower($data['gejala4']);
        $keterangan = $data['keterangan'];
        $dataGejala = $this->gejalaModel->save([
            'penyakit' => $penyakit,
            'gejala1' => $gejala1,
            'gejala2' => $gejala2,
            'gejala3' => $gejala3,
            'gejala4' => $gejala4,
            'keterangan' => $keterangan,
        ]);
        if ($dataGejala == true) {
            session()->setFlashdata('msg', 'Tambah data gejala berhasil');
            return redirect('admin/data-gejala');
        } else {
            session()->setFlashdata('error', 'Tambah data gejala gagal');
            return redirect('admin/tambah-data-gejala');
        }
        
    }

    public function getDataUser()
    {
        $id =  $_POST['id'];
        $dataHistory = $this->historyModel();
        foreach ($dataHistory['history'] as $hs) {
            if ($hs['id'] == $id) {
                $username = $hs['nama'];
                if ($username = $hs['nama']) {
                    foreach ($this->profileModel->find() as $key) {
                        if ($key['username'] == $username) {
                            echo json_encode($key);
                        }
                    }
                }
            }
        }
    }
    public function getDataPemeriksaan()
    {
        $id =  $_POST['id'];
        $dataHistory = $this->historyModel();
        foreach ($dataHistory['history'] as $hs) {
            if ($hs['id'] == $id) {
                echo json_encode($hs);
            }
        }
    }
    public function getDataPenyakit()
    {
        $id =  $_POST['id'];
        $dataPenyakit = $this->gejalaModel->where('id',$id)->first();
        echo json_encode($dataPenyakit);
    }
    public function getDataPengguna()
    {
        $id =  $_POST['id'];
        $levelUser = new AuthGroupsUsers;

        $getLevelUser = $levelUser->where('user_id',$id)->first();

        echo json_encode($getLevelUser);
    }
    public function delDatagejala()
    {
        $data = $this->request->getVar();
        $id = $data['id'];
        $del = $this->gejalaModel->where('id',$id)->delete();

        if ($del == true) {
            session()->setFlashdata('msg', 'Hapus data berhasil');
            return redirect('admin/data-gejala');    
        } else {
            session()->setFlashdata('error', 'Hapus data gagal');
            return redirect('admin/data-gejala');    
        }
        
    }
    public function editDatagejala()
    {
        $data = $this->request->getVar();
        $id = $data['id'];
        $penyakit = $data['namaPenyakit'];
        $gejala1 = strtolower($data['gejala1']);
        $gejala2 = strtolower($data['gejala2']);
        $gejala3 = strtolower($data['gejala3']);
        $gejala4 = strtolower($data['gejala4']);
        $keterangan = $data['keterangan'];

        $update = $this->gejalaModel->update($id,[
            'penyakit' => $penyakit,
            'gejala1' => $gejala1,
            'gejala2' => $gejala2,
            'gejala3' => $gejala3,
            'gejala4' => $gejala4,
            'keterangan' => $keterangan,
        ]);


        if ($update == true) {
            session()->setFlashdata('msg', 'Edit data berhasil');
            return redirect('admin/data-gejala');    
        } else {
            session()->setFlashdata('error', 'Edit data gagal');
            return redirect('admin/data-gejala');    
        }
        
    }
    public function delDataPengguna()
    {
        $data = $this->request->getVar();
        $id = $data['id'];
        $del = $this->userModel->where('id',$id)->delete();

        if ($del == true) {
            session()->setFlashdata('msg', 'Hapus data pengguna berhasil');
            return redirect('admin/data-user');    
        } else {
            session()->setFlashdata('error', 'Hapus data pengguna gagal');
            return redirect('admin/data-user');    
        }
        
    }
    public function editDataPengguna()
    {
        $levelUser = new AuthGroupsUsers;
        $data = $this->request->getVar();
        $id = $data['id'];
        $level = $data['level'];
        $update = $levelUser->set('group_id', $level)->where('user_id',$id)->update();

        if ($update == true) {
            session()->setFlashdata('msg', 'Edit data berhasil');
            return redirect('admin/data-user');    
        } else {
            session()->setFlashdata('error', 'Edit data gagal');
            return redirect('admin/data-user');    
        }
        
    }
}
