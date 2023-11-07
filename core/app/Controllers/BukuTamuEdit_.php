<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class BukuTamuEdit_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session            = session();
        $idPegawaiAkses     = $session->get('idPegawai');
        $token              = $session->get('token');
        $statusLogin        = $session->get('login');
        $idBukuTamu         = $this->request->getPost('idBukuTamu');
        $tanggal            = $this->request->getPost('tanggal');
        $instansi           = $this->request->getPost('instansi');
        $nama               = $this->request->getPost('nama');
        $jabatan            = $this->request->getPost('jabatan');
        $nomorTelepon       = $this->request->getPost('nomorTelepon');
        $tujuan             = $this->request->getPost('tujuan');
        $keterangan         = $this->request->getPost('keterangan');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/EditBukuTamu/'.$idBukuTamu,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "tanggal" : "'.$tanggal.'",
            "instansi" : "'.$instansi.'",
            "nama" : "'.$nama.'",
            "jabatan" : "'.$jabatan.'",
            "nomorTelepon" : "'.$nomorTelepon.'",
            "tujuan" : "'.$tujuan.'",
            "keterangan" : "'.$keterangan.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'StatusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            if($statusLogin == null) {
                return redirect()->to(base_url().'BukuTamu');
            }else{
                return redirect()->to(base_url().'BukuTamuAdmin');
            }
        }else {
            $ses_data = [
                'StatusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            if($statusLogin == null) {
                return redirect()->to(base_url().'BukuTamu');
            }else{
                return redirect()->to(base_url().'BukuTamuAdmin');
            }
        }
    }
}