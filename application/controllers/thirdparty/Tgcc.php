<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';



class Tgcc extends RestController
{
    public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		header("Access-Control-Allow-Methods: GET, POST, PUT");
		date_default_timezone_set("Asia/Calcutta");
    }
    
    public function webhookVerifyUpate_post()
    {
        $json = file_get_contents('php://input');
		
        error_reporting(0);
		$sig = $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'];
        // $email = "info2programmer@gmail.com";
        // $subject = "Hye,You got an enquery from ". base_url();
        // $mailBody = '';
        // $mailBody .= "<b>Json : </b> {$json} &nbsp; {$sig} <br/>";
       
        // $this->common_model->send_smtpmail($email, $subject, $mailBody);

        // $url = 'https://www.thegoodcowcompany.com/crm/API/razorpayHook/webhookVerifyUpate';

        // // Create a new cURL resource
        // $ch = curl_init($url);
        // // Attach encoded JSON string to the POST fields
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        // // Set the content type to application/json
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-RAZORPAY-SIGNATURE:'.$sig));
        // // Return response instead of outputting
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // Execute the POST request
        // $result = curl_exec($ch);
        // // Close cURL resource
        // curl_close($ch);     
        $header = [
			'Content-Type:application/json',
			'X-RAZORPAY-SIGNATURE:'.$sig
		];

		// $httpUrl = 'https://api.ipify.org/';
		$httpUrl = 'https://www.thegoodcowcompany.com/crm/API/razorpayHook/webhookVerifyUpate';
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $httpUrl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false
		));

		curl_exec($curl);
		curl_close($curl);  
        $this->response(['status' => 1], RestController::HTTP_OK);
    }
}