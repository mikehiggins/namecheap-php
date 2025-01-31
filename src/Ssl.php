<?php

declare(strict_types=1);

namespace Mikehiggins\Namecheap;

class Ssl {
    
	protected $ApiUser;
	protected $ApiKey;
	protected $UserName;
	protected $ClientIp;
	protected $RequestUrl;
	
	public function __construct($ApiUser,$ApiKey,$UserName,$ClientIp,$RequestUrl){
        
		$this->ApiUser = $ApiUser;
		$this->ApiKey = $ApiKey;
		$this->UserName = $UserName;
		$this->ClientIp = $ClientIp;
		$this->RequestUrl = $RequestUrl;
		
    }
	
	// namecheap functions
	// create
	public function create($params){
		
		$url = $this->buildUrl("namecheap.ssl.create",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getList
	public function getList($params){
		
		$url = $this->buildUrl("namecheap.ssl.getList",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// parseCSR
	public function parseCSR($params){
		
		$url = $this->buildUrl("namecheap.ssl.parseCSR",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getApproverEmailList
	public function getApproverEmailList($params){
		
		$url = $this->buildUrl("namecheap.ssl.getApproverEmailList",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// activate
	public function activate($params){
		
		$url = $this->buildUrl("namecheap.ssl.activate",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// resendApproverEmail
	public function resendApproverEmail($params){
		
		$url = $this->buildUrl("namecheap.ssl.resendApproverEmail",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getInfo
	public function getInfo($params){
		
		$url = $this->buildUrl("namecheap.ssl.getInfo",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// renew
	public function renew($params){
		
		$url = $this->buildUrl("namecheap.ssl.renew",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// reissue
	public function reissue($params){
		
		$url = $this->buildUrl("namecheap.ssl.reissue",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// resendfulfillmentemail
	public function resendfulfillmentemail($params){
		
		$url = $this->buildUrl("namecheap.ssl.resendfulfillmentemail",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// purchasemoresans
	public function purchasemoresans($params){
		
		$url = $this->buildUrl("namecheap.ssl.purchasemoresans",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// revokecertificate
	public function revokecertificate($params){
		
		$url = $this->buildUrl("namecheap.ssl.revokecertificate",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// editDCVMethod
	public function editDCVMethod($params){
		
		$url = $this->buildUrl("namecheap.ssl.editDCVMethod",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// internal functions
	private function buildUrl($command,$additionalParams = array()){
		
		$url = $this->RequestUrl;
		
		// build query
		$params = array("ApiUser" => $this->ApiUser,"ApiKey" => $this->ApiKey,"UserName" => $this->UserName,"Command" => $command,"ClientIp" => $this->ClientIp);
		$params = array_merge($params,$additionalParams);
		
		$url = $url.http_build_query($params);
		
		return $url;
		
	}
	
	private function run($url){
		
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url
		]);
		
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		
		$xml = simplexml_load_string($resp);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);	
		
		return $array;
		
	}

}