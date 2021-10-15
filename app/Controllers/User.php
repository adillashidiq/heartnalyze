<?php

namespace App\Controllers;
use App\Models\Profile;
use App\Models\AuthGroupsUsers;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();
        $dataHistory = $this->historyModel->findColumn('nama');
        $i=0;
        foreach ($dataHistory as $hs){
            if($hs == $dataUser->username){
                $i++;
            }
        }
        $data=[
            'title'=>'User Dashboard',
            'gejala' => $dataGejala, 
            'history' => $i,
            'user' => $dataUser->username
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/index');
        
        echo view('templates/footer');
    }


    public function profile()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataProfile = $this->getDataProfile('username', $dataUser->username);

        if (!empty($dataProfile)) {
            $data=[
                'title'=>'Profile',
                'id' => $dataProfile[0]['id'],
                'user' => $dataProfile[0]['username'],
                'email' => $dataProfile[0]['email'],
                'nama' => $dataProfile[0]['nama'],
                'tempat_lahir' => $dataProfile[0]['tempat_lahir'],
                'tanggal_lahir' => $dataProfile[0]['tanggal_lahir'],
                'gender' => $dataProfile[0]['gender'],
                'alamat' => $dataProfile[0]['alamat'],
            ]; 
        }        
        elseif (empty($dataProfile)) {
            $msg = 'null';
            $data=[
                'title'=>'Profile',
                'id' => $dataUser->id,
                'user' => $dataUser->username,
                'email' => $dataUser->email,
                'nama' => $msg,
                'tempat_lahir' => $msg,
                'tanggal_lahir' => $msg,
                'gender' => $msg,
                'alamat' => $msg,
            ]; 
        }        

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/profile');
        
        echo view('templates/footer');
    }

    public function survey()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();
        $dataProfile = $this->getDataProfile('username', $dataUser->username);

        $data=[
            'title'=>'Cek Kesehatan',
            'gejala' => $dataGejala,
            'user' => $dataUser->username
        ];
        if (!empty($dataProfile)) {
            echo view('templates/header', $data);
            echo view('templates/sidebar-user');
            echo view('templates/topbar');
            echo view('user/survey');
            echo view('templates/footer');
        }
        if (empty($dataProfile)){
            session()->setFlashdata('msg','Silahkan lengkapi data profil terlebih dahulu');
            return redirect('user/profile');
        }
    }

    public function history()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataHistory = $this->historyModel();
        $data=[
            'title'=>'Riwayat Pemeriksaan',
            'history' => $dataHistory['history'],
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/history');
        
        echo view('templates/footer');
    }

    public function save(){
        $cek = $this->request->getVar();
        $input1 = $cek['gejala1'];
        $input2 = $cek['gejala2'];
        $input3 = $cek['gejala3'];
        $input4 = $cek['gejala4'];
        $keterangan='';
        $gejalaUser='';
        $hasil='';

        if($input1 && $input2 && $input3 && $input4){
            $diagnosa = $this->gejalaModel->where([
                'gejala1' => $input1,
                'gejala2' => $input2,
                'gejala3' => $input3,
                'gejala4' => $input4,
            ],$input1)
            ->findAll();
    
            if (!empty($diagnosa)) {
                $hasil = $diagnosa[0]['penyakit'];
                $keterangan = $diagnosa[0]['keterangan'];
                $gejalaUser = ($input1. ", " . $input2. ", " . $input3 . ", " . $input4);            
            }
    
            if(empty($diagnosa)){
                $hasil = 'Tidak Teridentifikasi';
                $keterangan = 'Tidak ada penyakit yang sesuai dalam database kami. Namun, bila sakit berlanjut, harap segera hubungi dokter.';
                $gejalaUser = ($input1. ", " . $input2. ", " . $input3 . ", " . $input4);
            }
        }

        elseif ($input1 || $input2 || $input3 || $input4) {
            $hasil = 'Tidak Terindikasi';
            $keterangan = 'Anda tidak terindikasi penyakit jantung';
            $gejalaUser = ($input1. " " . $input2. " " . $input3 . " " . $input4);            
        }
        
        $this->historyModel->save([
            'nama' =>$this->request->getVar('namaUser'),
            'gejala' => $gejalaUser,
            'penyakit' => $hasil,
            'keterangan' => $keterangan
        ]);
        session()->setFlashdata('msg','Cek kesehatan telah selesai!');
        return redirect('user/history');
    }

    public function edit(){
        $cek = $this->request->getVar();
        $username = $this->request->getVar('username');
        $dataProfile = $this->getDataProfile('username', $username);

        if (!empty($dataProfile)) {
            $id = $dataProfile[0]['id'];
            $this->profileModel->update($id, [
                'username' =>$this->request->getVar('username'),
                'nama' =>$this->request->getVar('nama'),
                'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
                'tanggal_lahir' =>$this->request->getVar('tanggal_lahir'),
                'gender' =>$this->request->getVar('gender'),
                'email' =>$this->request->getVar('email'),
                'alamat' =>$this->request->getVar('alamat'),
            ]);
        }  
        elseif (empty($dataProfile)) {
            $this->profileModel->save([
                'username' =>$this->request->getVar('username'),
                'nama' =>$this->request->getVar('nama'),
                'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
                'tanggal_lahir' =>$this->request->getVar('tanggal_lahir'),
                'gender' =>$this->request->getVar('gender'),
                'email' =>$this->request->getVar('email'),
                'alamat' =>$this->request->getVar('alamat'),
            ]);
        }

        session()->setFlashdata('msg','Update data profil telah berhasil');
        return redirect('user/profile');

    }

    public function getDataKeterangan(){
        $id =  $_POST['id'];
        $dataHistory = $this->historyModel();
        foreach ($dataHistory['history'] as $hs) {
            if ($hs['id'] == $id) {
                echo json_encode($hs);
            }
        }
    }

    public function getDataUser(){
        $id =  $_POST['id'];
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataProfile = $this->getDataProfile('username', $dataUser->username);

        if (!empty($dataProfile)) {
            echo json_encode($dataProfile[0]);
        }
        if (empty($dataProfile)) {
            $data = [
                'id' => $dataUser->id,
                'username' => $dataUser->username,
                'email' => $dataUser->email,
            ];   
            echo json_encode($data);
        }
    }
}
