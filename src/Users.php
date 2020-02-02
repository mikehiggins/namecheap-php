<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class Users {
    
	protected $ApiUser;
	protected $ApiKey;
	protected $UserName;
	protected $ClientIp;
	
	public function __construct($ApiUser,$ApiKey,$UserName,$ClientIp){
        
		$this->ApiUser = $ApiUser;
		$this->ApiKey = $ApiKey;
		$this->UserName = $UserName;
		$this->ClientIp = $ClientIp;
		
    }
	
	// namecheap functions
	// getPricing
	public function getPricing($params){
		
		$url = $this->buildUrl("namecheap.users.getPricing",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getBalances
	public function getBalances($params){
		
		$url = $this->buildUrl("namecheap.users.getBalances",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// changePassword
	public function changePassword($params){
		
		$url = $this->buildUrl("namecheap.users.changePassword",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// update
	public function update($params){
		
		$url = $this->buildUrl("namecheap.users.update",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// createaddfundsrequest
	public function createaddfundsrequest($params){
		
		$url = $this->buildUrl("namecheap.users.createaddfundsrequest",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getAddFundsStatus
	public function getAddFundsStatus($params){
		
		$url = $this->buildUrl("namecheap.users.getAddFundsStatus",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// create
	public function create($params){
		
		$url = $this->buildUrl("namecheap.users.create",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// login
	public function login($params){
		
		$url = $this->buildUrl("namecheap.users.login",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// resetPassword
	public function resetPassword($params){
		
		$url = $this->buildUrl("namecheap.users.resetPassword",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// internal functions
	private function buildUrl($command,$additionalParams = array()){
		
		$url = "https://api.sandbox.namecheap.com/xml.response?";
		
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