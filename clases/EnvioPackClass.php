<?php

Class EnvioPack {

	const BASE_URL = "https://api.enviopack.com/";

	private $apiKey = "b2769847a503b5bee4aee758493acee9001eb210";
	private $secretKey = "d2ff5919cc19009ae720db3d909bc383e3bd5a2e";
	private $accessToken;
	private $refreshtoken;

	function __construct(){
		//se inicializa el manipulador de la solicitud HTTP
		$ch = curl_init( self::BASE_URL . "auth" );
		//se setea el tipo POST
		curl_setopt($ch, CURLOPT_POST, 1);
		//se establecen los parametros
		curl_setopt($ch, CURLOPT_POSTFIELDS, "api-key=" . $this->apiKey . "&secret-key=" . $this->secretKey);
		//se informa que se espera una respuesta
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$respuesta = json_decode( curl_exec($ch) );
		curl_close ($ch);
		$this->accessToken = $respuesta->token;
		$this->refreshtoken = $respuesta->refresh_token;
	}

	public function getAccessToken(){
		return $this->accessToken;
	}

	public function getProvincias(){
		//se inicializa el manipulador de la solicitud HTTP
		$ch = curl_init( self::BASE_URL . "provincias?access_token=" . $this->accessToken );
		
		//se informa que se espera una respuesta
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close ($ch);
		return json_decode( $output );
	}

	public function getLocalidades( $idProvincia ){
		//se inicializa el manipulador de la solicitud HTTP
		$ch = curl_init( self::BASE_URL . "localidades?access_token=" . $this->accessToken . "&id_provincia=" . $idProvincia );
		
		//se informa que se espera una respuesta
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec($ch);
		curl_close ($ch);
		return json_decode( $output );
	}
	
}