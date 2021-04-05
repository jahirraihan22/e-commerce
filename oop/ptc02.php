<?php

	abstract class FaceBookAPI{
		
		public abstract function Appkey($key);
		
	}
	class AppVerifyByFacebook extends FaceBookAPI{
		public function Appkey($key){
			echo "Your app key is ".$key;
		}
		public function AppSecret(){
			echo "Your Secret key is ";
		}
		public function AppId(){
			echo "Your AppId key is";
		}
	}
	
	$ins = new AppVerifyByFacebook;
	$ins->Appkey("345678909876yh");

?>