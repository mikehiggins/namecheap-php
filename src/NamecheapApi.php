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
	
	private $RequestUrl;
	
    public function __construct($ApiUser,$ApiKey,$UserName,$ClientIp){
        
		$this->ApiUser = $ApiUser;
		$this->ApiKey = $ApiKey;
		$this->UserName = $UserName;
		$this->ClientIp = $ClientIp;
		
		// settings initialization
		$this->RequestUrl = "https://api.namecheap.com/xml.response?";
		
		// object initialization
		$this->initializeObjects();
		
    }

	public function setSandboxMode($mode){
		if($mode == true){
			$this->RequestUrl = "https://api.sandbox.namecheap.com/xml.response?";
		} else {
			$this->RequestUrl = "https://api.namecheap.com/xml.response?";
		}
	}

	private function initializeObjects(){
		$this->Domains = new Domains($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->DomainsDns = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->DomainsNs = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->DomainsTransfer = new DomainsDns($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->Ssl = new Ssl($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->Users = new Users($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->UsersAddress = new Users($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
		$this->Whoisguard = new Whoisguard($this->ApiUser,$this->ApiKey,$this->UserName,$this->ClientIp,$this->RequestUrl);
	}

}
