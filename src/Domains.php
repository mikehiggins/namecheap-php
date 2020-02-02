<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class Domains {
    
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
	
	public function getList(){
		
		$url = 'https://api.sandbox.namecheap.com/xml.response?ApiUser='.$this->ApiUser."&ApiKey=".$this->ApiKey."&UserName=".$this->UserName."&Command=namecheap.domains.getList&ClientIp=".$this->ClientIp;
		
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
	
	public function check($domainList){
		
		$url = 'https://api.sandbox.namecheap.com/xml.response?ApiUser='.$this->ApiUser."&ApiKey=".$this->ApiKey."&UserName=".$this->UserName."&Command=namecheap.domains.check&ClientIp=".$this->ClientIp."&DomainList=us.xyz";
		
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