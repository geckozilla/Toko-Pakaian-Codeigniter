<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
{
  private $apiRaja = 'd42e1d83854fba7dff785aa0cf76d85f';
  private $curl;

  public function __construct()
  {
    parent::__construct();
    $this->curl = curl_init();
  }

  public function data_kota($pilih = null){
    $pilih =$this->uri->segment(3);
    switch ($pilih) {
    
      case'kotatujuan':
      curl_setopt_array($this->curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->apiRaja"
        ),
      ));
      $response = curl_exec($this->curl);
      $err = curl_error($this->curl);
      curl_close($this->curl);
      $data = json_decode($response, true);
      echo "<option></option>";
      for($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
          echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
      }
      break;
    }
  }

  public function cek_ongkir()
  {
    $kota_tujuan = $_POST['kota_tujuan'];
    $kurir = $_POST['kurir'];
    $berat = $_POST['berat']*1000;

    curl_setopt_array($this->curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=419&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->apiRaja"
      ),
    ));
    $response = curl_exec($this->curl);
    $err = curl_error($this->curl);
    curl_close($this->curl);
    $data= json_decode($response, true);
    $kurir=$data['rajaongkir']['results'][0]['name'];
    $kotaasal=$data['rajaongkir']['origin_details']['city_name'];
    $provinsiasal=$data['rajaongkir']['origin_details']['province'];
    $kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
    $provinsitujuan=$data['rajaongkir']['destination_details']['province'];
    $berat=$data['rajaongkir']['query']['weight']/1000;
    
  
          foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
            echo "<tr>";
            echo "<td>".$value['service']."</td>";
            foreach ($value['cost'] as $tarif) {
            echo "<td align='right'>Rp ". number_format($tarif['value'],2,',','.')."</td>";
            echo "<td>".$tarif['etd']." D</td>";
            }
            
            echo "</tr>";
          }
  }

}