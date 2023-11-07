<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function login()
    {
        return view('login');
    }
    public function dashboard()
    {
        $session    = session();
        $login      = $session->get('login');
        $status     = $session->get('status');
        $idPegawai  = $session->get('idPegawai');
        if($login == 0){
          return redirect()->to(base_url());
        }
        if($status == "admin"){
            // Api Jumlah Kinerja Belum Diproses
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatus/4',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseBelumDiproses = json_decode($response,true);
            // Api Jumlah Kinerja Sedang di Proses 
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatus/5',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseSedangDiproses = json_decode($response,true);
            // Api Jumlah Kinerja Ditunda
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatus/6',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseDitunda = json_decode($response,true);
            // Api Jumlah Kinerja Selesai
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatus/7',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseSelesai = json_decode($response,true);
        // hasil response 
        }else if($status == "user"){
            // Api Jumlah Kinerja Belum Diproses
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatusDanPegawai/4/'.$idPegawai,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseBelumDiproses = json_decode($response,true);
            // Api Jumlah Kinerja Sedang di Proses 
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatusDanPegawai/5/'.$idPegawai,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseSedangDiproses = json_decode($response,true);
            // Api Jumlah Kinerja Ditunda
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatusDanPegawai/6/'.$idPegawai,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseDitunda = json_decode($response,true);
            // Api Jumlah Kinerja Selesai
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/JumlahKinerjaByStatusDanPegawai/7/'.$idPegawai,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseSelesai = json_decode($response,true);
        }

        $jumlahBelumDiproses    = $hasilResponseBelumDiproses['data'];
        $jumlahSedangDiproses   = $hasilResponseSedangDiproses['data'];
        $jumlahDitunda          = $hasilResponseDitunda['data'];
        $jumlahSelesai          = $hasilResponseSelesai['data'];
        return view('dashboard',compact('jumlahBelumDiproses','jumlahSedangDiproses','jumlahDitunda','jumlahSelesai'));
    }
    public function masterJabatan()
    {
        $session = session();
        $login   = $session->get('login');
        if($login == 0){
          return redirect()->to(base_url());
        }

        // Api Master Jabatan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilJabatan',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseJabatan   = json_decode($response,true);
        $dataJabatan            = $hasilResponseJabatan['data'];
        return view('masterJabatan',compact('dataJabatan'));
    }
    public function masterPekerjaan()
    {
        $session = session();
        $login   = $session->get('login');
        if($login == 0){
          return redirect()->to(base_url());
        }

        // Api Master Pekerjaan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilPekerjaan',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponsePekerjaan   = json_decode($response,true);
        
        // Api Master Jabatan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilJabatan',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseJabatan   = json_decode($response,true);
        $dataJabatan            = $hasilResponseJabatan['data'];
        $dataPekerjaan            = $hasilResponsePekerjaan['data'];

        return view('masterPekerjaan',compact('dataPekerjaan','dataJabatan'));
    }
    public function masterStatus()
    {
        $session = session();
        $login   = $session->get('login');
        if($login == 0){
          return redirect()->to(base_url());
        }
         // Api Master Status
         $curl = curl_init();
         curl_setopt_array($curl, array(
         CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilStatus',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => array(
             'Content-Type: application/json',
         ),
         ));
         $response = curl_exec($curl);
         $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
         curl_close($curl);
         $hasilResponseStatus   = json_decode($response,true);
         $dataStatus = $hasilResponseStatus['data'];
        return view('masterStatus',compact('dataStatus'));
    }
    public function masterPegawai()
    {
        $session = session();
        $login   = $session->get('login');
        $token   = $session->get('token');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Master Pegawai
         $curl = curl_init();
         curl_setopt_array($curl, array(
         CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilPegawai',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => array(
             'Content-Type: application/json',
             'Authorization: Bearer '.$token
         ),
         ));
         $response = curl_exec($curl);
         $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
         curl_close($curl);
         $hasilResponseStatus   = json_decode($response,true);
         // Api Master Jabatan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilJabatan',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseJabatan   = json_decode($response,true);

        $dataJabatan            = $hasilResponseJabatan['data'];
        $dataPegawai = $hasilResponseStatus['data'];
        return view('masterPegawai',compact('dataPegawai','dataJabatan'));
    }
    public function kinerja()
    {
        $session = session();
        $login      = $session->get('login');
        $token      = $session->get('token');
        $status     = $session->get('status');
        $idPegawai  = $session->get('idPegawai');
        if($login == 0){
          return redirect()->to(base_url());
        }

        if($status == "admin"){
            // Api Master Kinerja
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilKinerja',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseKinerja   = json_decode($response,true);

            // Api Master Pegawai
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilPegawai',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponsePegawai   = json_decode($response,true);

            // Api Master Status
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilStatus',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseStatus   = json_decode($response,true);

            // Api Master Pekerjaan
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilPekerjaan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponsePekerjaan   = json_decode($response,true);


            $dataKinerja            = $hasilResponseKinerja['data'];
            $dataPegawai            = $hasilResponsePegawai['data'];
            $dataStatus             = $hasilResponseStatus['data'];
            $dataPekerjaan          = $hasilResponsePekerjaan['data'];
            return view('kinerja',compact('dataKinerja','dataPegawai','dataStatus','dataPekerjaan'));
        }else if($status == "user"){
            // Api Master Kinerja
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilKinerjaByPegawai/'.$idPegawai,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            $hasilResponseKinerja   = json_decode($response,true);
            $dataKinerja            = $hasilResponseKinerja['data'];
            return view('kinerja',compact('dataKinerja'));
        }
        return "Berhasi;";
    }
    public function bukuTamuUser()
    {
        return view('bukuTamuUser');
    }
    public function bukuTamuAdmin()
    {
        $session = session();
        $login   = $session->get('login');
        if($login == 0){
          return redirect()->to(base_url());
        }
        // Api Master Buku tamu
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TampilBukuTamu',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponseBukuTamu   = json_decode($response,true);
        $dataBukuTamu            = $hasilResponseBukuTamu['data'];
        return view('bukuTamuAdmin',compact('dataBukuTamu'));
    }
}
