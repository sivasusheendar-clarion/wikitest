<?php
interface PaymentMethod {
	
	public function getConfig();
	public function getButton();
	public function sendRequest();
	public function parseResponse(); 
}