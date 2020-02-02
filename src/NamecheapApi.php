<?php

declare(strict_types=1);

namespace Wirecore\Namecheap;

class NamecheapApi {
    
	protected $ApiUser;
	protected $ApiKey;
	protected $UserName;
	protected $ClientIp;
	
	// object definition
	public $Domains;
	public $DomainsDns;
	public $DomainsNs;
	public $DomainsTransfer;
	public $Ssl;
	public $Users;
	public $UsersAddress;
	public $Whoisguard;
	
    public function __construct($ApiUser,$ApiKey,$UserName,$ClientIp){
        
		$this->ApiUser = $ApiUser;
		$this->ApiKey = $ApiKey;
		$this->UserName = $UserName;
		$this->ClientIp = $ClientIp;
		
		// object initialization
		$this->Domains = new Domains($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->DomainsDns = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->DomainsNs = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->DomainsTransfer = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->Ssl = new Ssl($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->Users = new Users($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->UsersAddress = new Users($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		$this->Whoisguard = new Whoisguard($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp);
		
    }

	

}
