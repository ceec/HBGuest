<?php

//PHP wrapper for HBGuest service

class HBGuestAuth 
{
        
        //HBGuest requires a token
        protected $token;

        //it also requires a UserID which is not mentioned in its documentation so I made one up

        public function __construct($token)
        {
            $this->Token = $token;
            $this->UserID = 5;
        }


}

    //your user token
    $token = '';

    //create the auth
    $auth = new HBGuestAuth($token);

    //create the header
    $header = new SoapHeader('http://www.dwr.state.co.us/','HBAuthenticationHeader',$auth,false);

    //url for the WSDL
    $url = 'http://www.dwr.state.co.us/HBGuest/HBGuestWebService.asmx?WSDL';

    //create the soap client
    $client = new SoapClient($url,array('trace' => TRUE));

    //add the header
    $client->__setSoapHeaders($header);    

    //can call any of the HBGuest calls like this
    $result = $client->GetHBGuestCounty();