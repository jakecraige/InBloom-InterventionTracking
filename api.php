<?php
/**
* Very light API to interact with InBloom CURL calls.
*
* @author Hunter Skrasek
* @version 0.1
*/
class API
{
	private $base_url = null;
	private $token = null;
	private $code = null;

	/*
	* Construct
	* 
	* @param string $base_url Base API URL
	* @param string $token API Auth Token
	* @param string $code API Code
	*/
	public function __construct($base_url, $token, $code)
	{
		$this->base_url = $base_url;
		$this->token = $token;
		$this->code = $code;
	}

	/*
	* Execute
	*
	* Execute a CURL call
	* @param string $entity_url 
	*/
	public function execute($entity_url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->base_url . '/' . $entity_url);
		$headers = array(
			'Content-Type: application/vnd.slc+json',
  			'Accept: application/vnd.slc+json',
  			sprintf('Authorization: bearer %s', $this->token));

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		if (DISABLE_SSL_CHECKS == TRUE) { 
		  curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		  curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		}

		//execute post
		$result = curl_exec($ch);

		curl_close($ch);
		$json = json_decode($result);
		
		return $json;
	}
}
?>