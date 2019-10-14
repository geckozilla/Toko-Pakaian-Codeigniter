<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir_Model extends CI_Model
{

  private $apiRaja = 'd42e1d83854fba7dff785aa0cf76d85f';
  private $curl;

  public function __construct()
  {
    parent::__construct();
    $this->curl = curl_init();
  }

  public function index()
  {
      redirect('', 'refresh');
  }

  public function getProvinsi()
  {
    curl_setopt_array($this->curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }

  public function getKota()
  {
    curl_setopt_array($this->curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
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
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }

  public function cek_ongkir()
  {
    curl_setopt_array($this->curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=1&destination=2&weight=1000&courier=jne",
	    CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
        "key: $this->apiRaja"
      ),
    ));

    $response = curl_exec($this->curl);
    $err = curl_error($this->curl);

    curl_close($this->curl);

    if ($err) {
      echo "cURL Error # : " . $err;
    } else {
      var_dump(json_decode($response));
    }
  }
}
