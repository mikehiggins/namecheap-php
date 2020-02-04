<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class Whoisguard {
    
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
	// changeemailaddress
	public function changeemailaddress($params){
		
		$url = $this->buildUrl("namecheap.whoisguard.changeemailaddress",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// enable
	public function enable($params){
		
		$url = $this->buildUrl("namecheap.whoisguard.enable",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// disable
	public function disable($params){
		
		$url = $this->buildUrl("namecheap.whoisguard.disable",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getList
	public function getList($params){
		
		$url = $this->buildUrl("namecheap.whoisguard.getList",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// renew
	public function renew($params){
		
		$url = $this->buildUrl("namecheap.whoisguard.renew",$params);
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