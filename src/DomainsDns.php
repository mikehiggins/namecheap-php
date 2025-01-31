<?php

declare(strict_types=1);

namespace Mikehiggins\Namecheap;

class DomainsDns {
    
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
	// setDefault
	public function setDefault($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.setDefault",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// setCustom
	public function setCustom($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.setCustom",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getList
	public function getList($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.getList",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getHosts
	public function getHosts($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.getHosts",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// getEmailForwarding
	public function getEmailForwarding($domain){
		
		$url = $this->buildUrl("namecheap.domains.dns.getEmailForwarding",array("DomainName" => $domain));
		$result = $this->run($url);
		return $result;
		
	}
	
	// setEmailForwarding
	public function setEmailForwarding($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.setEmailForwarding",$params);
		$result = $this->run($url);
		return $result;
		
	}
	
	// setHosts
	public function setHosts($params){
		
		$url = $this->buildUrl("namecheap.domains.dns.setHosts",$params);
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