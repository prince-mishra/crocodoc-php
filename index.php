<?php

class Crocodoc { 
	public $api_key = 'Bo3uaQcNXrdhtCU17PMqkZsw';
	public $api_url = 'https://crocodoc.com/api/v2/';
	
	private function doCurlPost($url, $data){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
	private function doCurlGet($url, $dataStr) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url.$dataStr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
	public function upload($file_url) {
		$url = $this->api_url.'document/upload';
		$data = array(
		'token' =>  $this->api_key,
		'url'   =>  $file_url
		);
		//this is a POST request
		$output = $this->doCurlPost($url, $data);
		return $output;
	}
	public function getStatus($uuids){
		$url = $this->api_url.'document/status';
		$token = $this->api_key;
		$dataStr = '?token='.$token.'&uuids='.$uuids;
		// this is a GET request
		$output = $this->doCurlGet($url, $dataStr);
		return $output;
	}
	
	public function delete($uuid) {
		$url = $this->api_url.'document/delete';
		$data = array(
		'token' =>  $this->api_key,
		'uuid'   =>  $uuid
		);
		//this is a POST request
		$output = $this->doCurlPost($url, $data);
		return $output;
	}
	
	public function createSession($uuid) {
		$url = $this->api_url.'session/create';
		$data = array(
		'token' =>  $this->api_key,
		'uuid'   =>  $uuid);
		//this is a POST request
		$output = $this->doCurlPost($url, $data);
		return $output;
  }
}
?>
