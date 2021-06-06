<?php
namespace app\classes;

class RemotePost
{
    public $UserName;
    public $Password;
    public $Footer;
    function __construct($usernmae,$password){
        $this->UserName=$usernmae;
        $this->Password=$password;
    }
    
    function SendCode($mobileNumber,$footer){
        $Url="http://smspanel.Trez.ir/AutoSendCode.ashx";
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$Url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query(array('Username' => $this->UserName,
        'Password'=>$this->Password,
        'Mobile'=>$mobileNumber,
        'Footer'=>$footer)));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);
        return $server_output;
        
    }
    
    function IsCodeValid($mobileNumber,$code){
         $Url="http://smspanel.Trez.ir/CheckSendCode.ashx";
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$Url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query(array('Username' => $this->UserName,
        'Password'=>$this->Password,
        'Mobile'=>$mobileNumber,
        'Code'=>$code)));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);
        return $server_output;
        
    }

    function SendCustomMessage($mobileNumber,$message)
    {
        $Url="http://smspanel.Trez.ir/SendMessageWithCode.ashx";

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$Url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query(array('Username' => $this->UserName,
        'Password'=>$this->Password,
        'Mobile'=>$mobileNumber,
        'Message'=>$message)));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);
        return $server_output;

    }
    
}


?>