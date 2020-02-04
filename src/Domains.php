<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class Domains {
    
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
	// getList
	public function getList(){
		
		$url = $this->buildUrl("namecheap.domains.getList");
		$result = $this->run($url);
		return $result;
		
	}
	
	// getContacts
	public function getContacts($domain){
		
		$url = $this->buildUrl("namecheap.domains.getContacts",array("DomainName" => $domain));
		$result = $this->run($url);
		return $result;
		
	}
	
	// create
	public function create($params){
		
		$url = $this->buildUrl("namecheap.domains.create",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getTldList
	public function getTldList(){
		
		$url = $this->buildUrl("namecheap.domains.gettldlist");
		$result = $this->run($url);
		return $result;
		
	}
	
	// setContacts
	public function setContacts($params){
		
		$url = $this->buildUrl("namecheap.domains.setContacts",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// check
	public function check($domain){
		
		$url = $this->buildUrl("namecheap.domains.check",array("DomainList" => $domain));
		$result = $this->run($url);
		return $result;
		
	}
	
	// reactivate
	public function reactivate($params){
		
		$url = $this->buildUrl("namecheap.domains.reactivate",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// renew
	public function renew($params){
		
		$url = $this->buildUrl("namecheap.domains.renew",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getRegistrarLock
	public function getRegistrarLock($domain){
		
		$url = $this->buildUrl("namecheap.domains.getRegistrarLock",array("DomainName" => $domain));
		$result = $this->run($url);
		return $result;
		
	}
	
	// setRegistrarLock
	public function setRegistrarLock($params){
		
		$url = $this->buildUrl("namecheap.domains.setRegistrarLock",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getInfo
	public function getInfo($domain){
		
		$url = $this->buildUrl("namecheap.domains.getinfo",array("DomainName" => $domain));
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