<?php

class Crocodoc { 
    public $api_key = 'Bo3uaQcNXrdhtCU17PMqkZsw';
		public $api_url = 'https://crocodoc.com/api/v2/';

	public function upload($file_url) {
		$url = $this->api_url.'document/upload';
		$data = array(
		'token' =>  $this->api_key,
		'url'   =>  $file_url
		);
		//this is a POST request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		echo "\ndoCurl status, ",$output;
		curl_close($ch);
		return $output;
	}
	public function getStatus($uuids){
	  echo "\ninside getStatus\n", $uuids;
	  echo "uuids : ", $uuids;
	  $url = $this->api_url.'document/status';
	  $token = $this->api_key;
	  $data_str = '?token='.$token.'&uuids='.$uuids;
	  // this is a GET request
	  $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url.$data_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		echo "\ndoCurl status, ",$output;
		curl_close($ch);
	  return $output;
	}
	
	public function delete($uuid) {
		$url = $this->api_url.'document/delete';
		$data = array(
		'token' =>  $this->api_key,
		'uuid'   =>  $uuid
		);
		//this is a POST request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		echo "\ndoCurl status, ",$output;
		curl_close($ch);
		return $output;
	}
	
}
$croco = new Crocodoc();
$uuid = $croco->upload('http://web.crocodoc.com/files/test-simple.pdf');
echo "\n\nreturned uuid : ",var_dump($uuid);
echo "\n----------------------------\n";
$uuid = json_decode($uuid, true);
echo "\n---extracting uid---\n";
var_dump($uuid);
$uuids = $uuid['uuid'];
echo "\nchecking status of : ", $uuids;

//$uuids = '['.$uuid.']';


echo "\n----------------------------\n";
echo $uuids;
$status = $croco->getStatus($uuids);
echo "\nstatus id : ", $status;
?>
