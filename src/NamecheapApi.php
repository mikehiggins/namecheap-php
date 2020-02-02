<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class NamecheapApi {
    
	protected $ApiUser;
	protected $ApiKey;
	protected $UserName;
	protected $ClientIp;
	
	// object definition
	public $domains;
	public $domainsDns;
	
    public function __construct($ApiUser,$ApiKey,$UserName,$ClientIp){
        
		$this->ApiUser = $ApiUser;
		$this->ApiKey = $ApiKey;
		$this->UserName = $UserName;
		$this->ClientIp = $ClientIp;
		
		// object initialization
		$this->domains = new Domains($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->domainsDns = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		
    }

	

}
