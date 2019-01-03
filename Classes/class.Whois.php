<?php
/**
 * User: Snir Sofer
 * Date: 03/01/2019
 * Domain Whois PHP Class
 *
 * @author Snir Sofer, SecurePress.co.il
 * @copyright Copyright (c) 2019, Snir Sofer
 * @link https://github.com/SnirSofer/
 */
 
class Whois
{
	private $WHOIS_SERVERS = [
	"com"               =>  ["whois.verisign-grs.com","whois.crsnic.net"],
	"net"               =>  ["whois.verisign-grs.com","whois.crsnic.net"],
	"org"               =>  ["whois.pir.org","whois.publicinterestregistry.net"],
	"info"              =>  ["whois.afilias.info","whois.afilias.net"],
	"biz"               =>  ["whois.neulevel.biz"],
	"us"                =>  ["whois.nic.us"],
	"uk"                =>  ["whois.nic.uk"],
	"ca"                =>  ["whois.cira.ca"],
	"tel"               =>  ["whois.nic.tel"],
	"ie"                =>  ["whois.iedr.ie","whois.domainregistry.ie"],
	"it"                =>  ["whois.nic.it"],
	"li"                =>  ["whois.nic.li"],
	"no"                =>  ["whois.norid.no"],
	"cc"                =>  ["whois.nic.cc"],
	"eu"                =>  ["whois.eu"],
	"nu"                =>  ["whois.nic.nu"],
	"au"                =>  ["whois.aunic.net","whois.ausregistry.net.au"],
	"de"                =>  ["whois.denic.de"],
	"ws"                =>  ["whois.worldsite.ws","whois.nic.ws","www.nic.ws"],
	"sc"                =>  ["whois2.afilias-grs.net"],
	"mobi"              =>  ["whois.dotmobiregistry.net"],
	"pro"               =>  ["whois.registrypro.pro","whois.registry.pro"],
	"edu"               =>  ["whois.educause.net","whois.crsnic.net"],
	"tv"                =>  ["whois.nic.tv","tvwhois.verisign-grs.com"],
	"travel"            =>  ["whois.nic.travel"],
	"name"              =>  ["whois.nic.name"],
	"in"                =>  ["whois.inregistry.net","whois.registry.in"],
	"me"                =>  ["whois.nic.me","whois.meregistry.net"],
	"at"                =>  ["whois.nic.at"],
	"be"                =>  ["whois.dns.be"],
	"cn"                =>  ["whois.cnnic.cn","whois.cnnic.net.cn"],
	"asia"              =>  ["whois.nic.asia"],
	"ru"                =>  ["whois.ripn.ru","whois.ripn.net"],
	"ro"                =>  ["whois.rotld.ro"],
	"aero"              =>  ["whois.aero"],
	"fr"                =>  ["whois.nic.fr"],
	"se"                =>  ["whois.iis.se","whois.nic-se.se","whois.nic.se"],
	"nl"                =>  ["whois.sidn.nl","whois.domain-registry.nl"],
	"nz"                =>  ["whois.srs.net.nz","whois.domainz.net.nz"],
	"mx"                =>  ["whois.nic.mx"],
	"tw"                =>  ["whois.apnic.net","whois.twnic.net.tw"],
	"ch"                =>  ["whois.nic.ch"],
	"hk"                =>  ["whois.hknic.net.hk"],
	"ac"                =>  ["whois.nic.ac"],
	"ae"                =>  ["whois.nic.ae"],
	"af"                =>  ["whois.nic.af"],
	"ag"                =>  ["whois.nic.ag"],
	"al"                =>  ["whois.ripe.net"],
	"am"                =>  ["whois.amnic.net"],
	"as"                =>  ["whois.nic.as"],
	"az"                =>  ["whois.ripe.net"],
	"ba"                =>  ["whois.ripe.net"],
	"bg"                =>  ["whois.register.bg"],
	"bi"                =>  ["whois.nic.bi"],
	"bj"                =>  ["www.nic.bj"],
	"br"                =>  ["whois.nic.br"],
	"bt"                =>  ["whois.netnames.net"],
	"by"                =>  ["whois.ripe.net"],
	"bz"                =>  ["whois.belizenic.bz"],
	"cd"                =>  ["whois.nic.cd"],
	"ck"                =>  ["whois.nic.ck"],
	"cl"                =>  ["nic.cl"],
	"coop"              =>  ["whois.nic.coop"],
	"cx"                =>  ["whois.nic.cx"],
	"cy"                =>  ["whois.ripe.net"],
	"cz"                =>  ["whois.nic.cz"],
	"dk"                =>  ["whois.dk-hostmaster.dk"],
	"dm"                =>  ["whois.nic.cx"],
	"dz"                =>  ["whois.ripe.net"],
	"ee"                =>  ["whois.eenet.ee"],
	"eg"                =>  ["whois.ripe.net"],
	"es"                =>  ["whois.ripe.net"],
	"fi"                =>  ["whois.ficora.fi"],
	"fo"                =>  ["whois.ripe.net"],
	"gb"                =>  ["whois.ripe.net"],
	"ge"                =>  ["whois.ripe.net"],
	"gl"                =>  ["whois.ripe.net"],
	"gm"                =>  ["whois.ripe.net"],
	"gov"               =>  ["whois.nic.gov"],
	"gr"                =>  ["whois.ripe.net"],
	"gs"                =>  ["whois.adamsnames.tc"],
	"hm"                =>  ["whois.registry.hm"],
	"hn"                =>  ["whois2.afilias-grs.net"],
	"hr"                =>  ["whois.ripe.net"],
	"hu"                =>  ["whois.ripe.net"],
	"il"                =>  ["whois.isoc.org.il"],
	"int"               =>  ["whois.isi.edu"],
	"iq"                =>  ["vrx.net"],
	"ir"                =>  ["whois.nic.ir"],
	"is"                =>  ["whois.isnic.is"],
	"je"                =>  ["whois.je"],
	"jp"                =>  ["whois.jprs.jp"],
	"kg"                =>  ["whois.domain.kg"],
	"kr"                =>  ["whois.nic.or.kr"],
	"la"                =>  ["whois2.afilias-grs.net"],
	"lt"                =>  ["whois.domreg.lt"],
	"lu"                =>  ["whois.restena.lu"],
	"lv"                =>  ["whois.nic.lv"],
	"ly"                =>  ["whois.lydomains.com"],
	"ma"                =>  ["whois.iam.net.ma"],
	"mc"                =>  ["whois.ripe.net"],
	"md"                =>  ["whois.nic.md"],
	"mil"               =>  ["whois.nic.mil"],
	"mk"                =>  ["whois.ripe.net"],
	"ms"                =>  ["whois.nic.ms"],
	"mt"                =>  ["whois.ripe.net"],
	"mu"                =>  ["whois.nic.mu"],
	"my"                =>  ["whois.mynic.net.my"],
	"nf"                =>  ["whois.nic.cx"],
	"pl"                =>  ["whois.dns.pl"],
	"pr"                =>  ["whois.nic.pr"],
	"pt"                =>  ["whois.dns.pt"],
	"sa"                =>  ["saudinic.net.sa"],
	"sb"                =>  ["whois.nic.net.sb"],
	"sg"                =>  ["whois.nic.net.sg"],
	"sh"                =>  ["whois.nic.sh"],
	"si"                =>  ["whois.arnes.si"],
	"sk"                =>  ["whois.sk-nic.sk"],
	"sm"                =>  ["whois.ripe.net"],
	"st"                =>  ["whois.nic.st"],
	"su"                =>  ["whois.ripn.net"],
	"tc"                =>  ["whois.adamsnames.tc"],
	"tf"                =>  ["whois.nic.tf"],
	"th"                =>  ["whois.thnic.net"],
	"tj"                =>  ["whois.nic.tj"],
	"tk"                =>  ["whois.nic.tk"],
	"tl"                =>  ["whois.domains.tl"],
	"tm"                =>  ["whois.nic.tm"],
	"tn"                =>  ["whois.ripe.net"],
	"to"                =>  ["whois.tonic.to"],
	"tp"                =>  ["whois.domains.tl"],
	"tr"                =>  ["whois.nic.tr"],
	"ua"                =>  ["whois.ripe.net"],
	"uy"                =>  ["nic.uy"],
	"uz"                =>  ["whois.cctld.uz"],
	"va"                =>  ["whois.ripe.net"],
	"vc"                =>  ["whois2.afilias-grs.net"],
	"ve"                =>  ["whois.nic.ve"],
	"vg"                =>  ["whois.adamsnames.tc"],
	"yu"                =>  ["whois.ripe.net"],
	];
	public function whoislookup($domain)
	{
		$domain = trim($domain); //remove space from start and end of domain
		if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7); // remove http:// if included
		if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);//remove www from domain
		if(preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/",$domain))
		return $this->queryWhois("whois.lacnic.net",$domain);
		if(!preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i",$domain))return "Invalid Input";
		$domain_parts = explode(".", $domain);
		$tld = strtolower(array_pop($domain_parts));
		$server = $this->WHOIS_SERVERS[$tld][0];
		if(!$server) {
			return "Error: No appropriate Whois server found for $domain domain!";
		}
		$res = $this-> queryWhois($server,$domain);
		while(preg_match_all("/Whois Server: (.*)/", $res, $matches))
		{
			$server = array_pop($matches[1]);
			$res = $this-> queryWhois($server,$domain);
		}
		return $res;
	}

	private function queryWhois($server,$domain)
	{
		$fp = @fsockopen($server, 43, $errno, $errstr, 20) or die("Socket Error " . $errno . " - " . $errstr);
		if($server=="whois.verisign-grs.com") $domain="=".$domain;
			
		fputs($fp, $domain . "\r\n");
		$out = "";
		while(!feof($fp)){
			$out .= fgets($fp);
		}
		fclose($fp);
		return $out;
	}
	public function is_valid_domain_name($domain_name)
	{
	    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
	            && preg_match("/^.{1,253}$/", $domain_name) //overall length check
	            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
	}
} 