<?php
interface PaymentMethod {
	
	public function getConfig();
	public function getButton($products);
	/*public function sendRequest();
	public function parseResponse($response);   */
}