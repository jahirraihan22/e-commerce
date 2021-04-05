<?php

	interface FaceBookAPI{
		public function Appkey($key);
		public function AppSecret();
		public function AppId();
		
	}
	class AppVerifyByFacebook implements FaceBookAPI{
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