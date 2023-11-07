<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PegawaiEdit_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session            = session();
        $idPegawaiAkses     = $session->get('idPegawai');
        $token              = $session->get('token');
        $idPegawai          = $this->request->getPost('idPegawai');
        $namaPegawai        = $this->request->getPost('namaPegawai');
        $nip                = $this->request->getPost('nip');
        $nik                = $this->request->getPost('nik');
        $jabatan            = $this->request->getPost('idJabatan');
        $status             = $this->request->getPost('status');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/EditDataPegawai/'.$idPegawai,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "idPegawaiAkses" : "'.$idPegawaiAkses.'",
            "namaPegawai" : "'.$namaPegawai.'",
            "nip" : "'.$nip.'",
            "nik" : "'.$nik.'",
            "jabatan" : "'.$jabatan.'",
            "status" : "'.$status.'"
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
            return redirect()->to(base_url().'MasterPegawai');
        }else {
            $ses_data = [
                'StatusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'MasterPegawai');
        }
    }
}