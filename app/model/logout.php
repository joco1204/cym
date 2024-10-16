<?php
class Logout{
	function __construct(){
		$this->business = new Business();
	}
	//logout method
	public function logout(){
		$session = $this->business->session;
		$session->start();
		if($session->destroy()){
			$this->business->return->bool = true;
			$this->business->return->msg = json_encode('Logout');
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = json_encode('No Logout');
		}
		return $this->business->return;
	}
}
?>