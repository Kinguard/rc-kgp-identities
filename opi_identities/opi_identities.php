<?php

class opi_identities extends rcube_plugin
{
	private $abook_id = 'static';
	private $abook_name = 'Static List';

	public function init()
	{
		$this->add_hook('identities_list', array($this, 'list_identities'));
		//$this->add_hook('message_compose', array($this, 'compose'));

	}

	public function compose( $a )
	{
		rcube::write_log("OPI","Compose message");
		//print "This is a test!!!<br/>";
		//$a["subject"] = "This is a test!";
		rcube::write_log("OPI",  print_r($a["param"], True) );
		return $a;
	}

	public function list_identities($a)
	{
		//print_r($a);
		//$a["list"][]=array(
		$a[] = array( "name" => "Tor Krill", "email" => "tor@openproducts.com" );
		$a[] = array( "name" => "Tor Krill", "email" => "tor@labb-opi.op-i.me" );
		//print_r($a);
		return $a;
	}

}
