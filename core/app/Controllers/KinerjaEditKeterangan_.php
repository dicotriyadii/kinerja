<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class KinerjaEditKeterangan_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session            = session();
        $idPegawaiAkses     = $session->get('idPegawai');
        $token              = $session->get('token');
        $idKinerja          = $this->request->getPost('idKinerja');
        $keteranganDitunda  = $this->request->getPost('keteranganDitunda');

        // proses API Kinerja
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/EditKeteranganDitunda/'.$idKinerja,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,    
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "idPegawaiAkses" : "'.$idPegawaiAkses.'",
            "keteranganDitunda" : "'.$keteranganDitunda.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ),    
         ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $kinerja      = $hasilResponse['data'];

        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'StatusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }else {
            $ses_data = [
                'StatusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }
    }
}