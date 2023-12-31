<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Login_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        $session    = session();
        $nik        = $this->request->getPost('nik');
        $password   = $this->request->getPost('password');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/Login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "nik" : "'.$nik.'",
            "password" : "'.$password.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url());
        }else {
            $ses_data = [
                'idPegawai'     => $hasilResponse['data']['idPegawai'],
                'nik'           => $hasilResponse['data']['nik'],
                'namaPegawai'   => $hasilResponse['data']['namaPegawai'],
                'status'        => $hasilResponse['data']['status'],
                'token'         => $hasilResponse['data']['token'],
                'login'         => 1,
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Dashboard');
        }
    }

    public function keluar()
    {
        $session     = session();
        $session->destroy();
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Anda telah keluar"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url());
    }
 
}