<?php

namespace JaredDmz\LaravelInfobipSMS;

class SMSIFacade
{
    public static function enviar($telefono,$mensaje){
    	if (strlen($telefono) == 12 && $mensaje != '') {
          $username = env('SMS_USERNAME',false);
          $password = env('SMS_PASSWORD',false);
	        if($username != false && $password != false) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://nn6x8.api.infobip.com/sms/2/text/single",
                  CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => '{"from":"ALIVIANATE","to":"'.$telefono.'","text":"'.$mensaje.'"}',
                  CURLOPT_USERPWD => ($username . ":" . $password),
                  CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "Cache-Control: no-cache",
                    "Content-Type: application/json"
                  )
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                return ['estatus'=>'si','mensaje'=>'SMS enviado.'];
            }else{
                return ['estatus'=>'no','mensaje'=>'Agrega tus variables de sesión en el archivo .env de la aplicación.'];
            }
	    }else{
	    	return ['estatus'=>'no','mensaje'=>'El teléfono debe estar a 12 dígitos y el mensaje con algo escrito.'];
	    }
    }
}
