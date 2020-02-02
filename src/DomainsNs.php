<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class DomainsNs {
    
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
	// create
	public function create($params){
		
		$url = $this->buildUrl("namecheap.domains.ns.create",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// delete
	public function delete($params){
		
		$url = $this->buildUrl("namecheap.domains.ns.delete",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getInfo
	public function getInfo($params){
		
		$url = $this->buildUrl("namecheap.domains.ns.getInfo",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// update
	public function update($params){
		
		$url = $this->buildUrl("namecheap.domains.ns.update",$params);
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