<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Kinerja_ extends ResourceController
{
    use ResponseTrait;
    public function create()
    { 
        $session        = session();
        $idPegawaiAkses = $session->get('idPegawai');
        $token          = $session->get('token');
        $pegawai        = $this->request->getPost('pegawai');
        $pekerjaan      = $this->request->getPost('pekerjaan');
        $keterangan     = $this->request->getPost('keterangan');        
        $status         = $this->request->getPost('status');
        $berkas         = $this->request->getFile('berkas');
        
        if(!$berkas->isValid()){
            if (function_exists('curl_file_create')) { // php 5.5+
                $berkasUpload = curl_file_create("https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/kinerja/kosong.pdf",'application/pdf','kosong.pdf');                
            }
        }else{
            $validasiBerkas = $this->validate([
                'berkas' => [
                    'uploaded[berkas]',
                    'mime_in[berkas,application/pdf]',
                    'max_size[berkas,2048]',
                ],
            ]);
            if ($validasiBerkas == false) {
                $ses_data = [
                    'statusTambah'  => "Gagal",
                    'keterangan'    => "File terlalu besar atau tipe file tidak sesuai, file max 1,5 mb dan tipe data pdf, silahkan coba lagi"
                ];
                $session->set($ses_data);
                return redirect()->back();
            }
            
            // proses API Kinerja
            $curl = curl_init();
            if (function_exists('curl_file_create')) { // php 5.5+
                $berkasUpload = curl_file_create($berkas->getRealPath(),'application/pdf',$berkas->getName());                
            }
        }
        $post = [
            'idPegawaiAkses'    => $idPegawaiAkses,
            'pegawai'           => $pegawai,
            'keterangan'        => $keterangan,
            'pekerjaan'         => $pekerjaan,
            'status'            => $status,
            'berkas'            => $berkasUpload
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/TambahKinerja',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,    
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $post,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),    
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $peraturan      = $hasilResponse['data'];
        

        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }
    }

    public function hapus($id=null)
    {
        $session        = session();
        $idPegawaiAkses = $session->get('idPegawai');
        $token          = $session->get('token');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/HapusKinerja/'.$id.'/'.$idPegawaiAkses,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
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
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }
    }

    public function GantiStatus($id=null,$status)
    {
        $session        = session();
        $idPegawaiAkses = $session->get('idPegawai');
        $token          = $session->get('token');
        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/GantiStatus/'.$id.'/'.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "idPegawaiAkses" : "'.$idPegawaiAkses.'"
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
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }else {
            $ses_data = [
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'Kinerja');
        }
    }
 
}