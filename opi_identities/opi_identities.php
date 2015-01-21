<?php

require_once("opibackend.php");

class opi_identities extends rcube_plugin
{

	public function init()
	{
		$this->add_hook('identities_list', array($this, 'list_identities'));
	}


	public function list_identities($a)
	{
		$rcube   = rcube::get_instance();
		$userid = $rcube->get_user_name();
		$o = new OPIBackend();
		$o->login($userid , $rcube->get_user_password());

		list($status, $user) = $o->getuser($userid);
		list($status, $ids) = $o->getuseridentities($userid);
		foreach( $ids["identities"] as $id )
		{
			$a[] = array( "name" => $user["displayname"], "email" => $id);
		}

		return $a;
	}

}
