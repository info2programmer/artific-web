<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Booking extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set('Asia/Kolkata');
        $this->load->helper(array('cookie', 'url')); 
		if(get_cookie("locationId") == "" || get_cookie('locationId') == "" ||get_cookie('locationName') == "" ||get_cookie('locationPhone') == ""){
			set_cookie('locationId','2','36000000'); 
			set_cookie('locationPin','733129','36000000'); 
			set_cookie('locationName','Kaliyaganj','36000000'); 
			set_cookie('locationPhone','9474551212','36000000'); 
		}
    }

    // This function for gust checkout 
    public function index()
    {
        if($this->cart->contents()){
             // All Category
             $categoryList = $this->common_model->find_data(['name' => 'ju_category'],'array','',['status' => 1],'','','',[['field' => 'serialNo', 'type' => "ASC"]]);

            $data = array(
                'mainContent' => 'ecommmerce/gust-checkout-view',
                'category' => $categoryList,
                'pageName' => 'checkout  - The Good Cow Company',
                
            );
            $this->load->view('ecommmerce/layouts/layout', $data);
        }
        else{
            redirect('cart','refresh');
        }
    }


    // This function For User Checkout
    public function checkout()
    {
        if($this->session->userdata('goodcowuser') != 1 && $this->cart->total() < 1){
			redirect('cart');
		}
        if($this->cart->contents()){
            
            // All Category
            $categoryList = $this->common_model->find_data(['name' => 'ju_category'],'array','',['status' => 1],'','','',[['field' => 'serialNo', 'type' => "ASC"]]);

            // Get User Details
            $userInfo = $this->common_model->find_Data(['name' => 'ju_customer'],'row','',['phone' => $this->session->userdata('token')]);
            

            $addressList = $this->common_model->find_data(['name' => 'ju_custaddress'],'array','',['userId' => $userInfo->Sno ]);

            
           
            if($addressList){
                $pincode = $addressList[0]->pin;
                $cgsts = array();
                $igsts = array(); 
               
                // Get all cart contents
                foreach($this->cart->contents() as $list){
                    //    Insert To Order Item Table
                    $cgsts[] = $list['options']['cgstsgst'] * $list['qty'] * $list['price'] /  100;
                    $igsts[] = $list['options']['igst'] * $list['qty'] * $list['price'] /  100;
                }

                if($pincode > 699999 && $pincode < 749999) {
                    //    This pincode belongs to west bengal
                    $this->session->set_userdata(['tax' => number_format(array_sum($cgsts),2)]);
                    
                    if($this->cart->total() > 800){
                        $this->session->set_userdata([
                            'deliveryCharge' => 0
                        ]);
                    }
                    else{
                        $this->session->set_userdata([
                            'deliveryCharge' => 50.00
                        ]);
                    }
                }
                else{
                    if($this->cart->total() > 800){
                        $this->session->set_userdata([
                            'deliveryCharge' => 0
                        ]);
                    }
                    else{
                        $this->session->set_userdata([
                            'deliveryCharge' => 70.00
                        ]);
                    }
                    $this->session->set_userdata(['tax' => number_format(array_sum($igsts),2)]);
                }
            }
            else{
                $this->session->set_userdata(['tax' => 0]); 
            }
            
            $data = array(
                'mainContent' => 'ecommmerce/checkout-view',
                'category' => $categoryList,
                'pageName' => 'checkout  - The Good Cow Company',
                'addressList' => $addressList,
                'userInfo' => $userInfo
            );
            $this->load->view('ecommmerce/layouts/layout', $data);
        }
        else{
            redirect('cart','refresh');
        }
    }

        // This function for send notification admin
    private function orderNotification($locationId)
    {
        // Get notify email
        $notifyEmail = $this->common_model->find_data(['name' => 'os_locations'],'row', '', ['id' => $locationId], 'email');

        $subject = "New order notification ". date('Y-m-d h:i:s a');
        $mailBody = "Please check admin panel for new order.";
        $this->common_model->send_smtpmail($notifyEmail->email, $subject, $mailBody);
    }

    // This Function For Order Place
    public function orderPlace()
    {
        
        if(base_url() == "http://localhost/thegoodcowcompany/")
            {
                $api = new Api(RAZOR_TEST_KEY_ID, RAZOR_TEST_KEY_SECRET);
            }
            else{
                $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
            }
            
            $razorpayOrder = $api->order->create(array(
                'receipt'         => time(),
                'amount'          => $this->cart->format_number($this->cart->total()+ $this->session->userdata('tax')+$this->session->userdata('deliveryCharge')) * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ));
            $amount = $razorpayOrder['amount'];
            $razorpayOrderId = $razorpayOrder['id'];
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            $data = $this->prepareData($amount,$razorpayOrderId);
            $userInfo = $this->common_model->find_Data(['name' => 'ju_customer'],'row','',['phone' => $this->session->userdata('token')]);
            $object = array(
                'buyerName' => $this->input->post('txtName',true),
                'mobileNumber' => $this->input->post('txtMobileNumber',true),
                'email' => $this->input->post('txtEmail',true),
                'buyerId' => null,
                'address1' => $this->input->post('address1',true),
                'address2' => $this->input->post('adress2',true),
                'city' => $this->input->post('city',true),
                'pin' => $this->input->post('pin',true),
                'note' => $this->input->post('message',true),
                'amount' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + $this->session->userdata('tax')),
                'deliveryCharge' => $this->session->userdata('deliveryCharge'),
                'totalOrderAmount' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + $this->session->userdata('tax')),
                'orderDateTime' => date('Y-m-d h:i:sa'),
                'orderStatus' => 0,
                'payment_response' => $razorpayOrderId,
                'paymentMode' => 'online',
                'gstno' => $this->input->post('gstno'),
                'comanyname' => $this->input->post('comanyname'),
            );
           $orderId = $this->common_model->insert_record('ju_order', $object);
           $paymentId = "TGCC".date('Y')."online".sprintf('%04u', $orderId);
           $orderIdUpdate = array(
            'payment_id' => $paymentId
           );
           $this->common_model->updateData($orderId, 'id', $orderIdUpdate, 'ju_order');
            $this->load->view('ecommmerce/rezorpay-view',array('data' => $data));
        
    }


    // This Function For Order Submit For Register User
    public function orderSubmit()
    { 
      
        
        if($this->input->post('checkNewAddress') != null && $this->input->post('checkNewAddress') =="on"){

            // Get User Details
            $userInfo = $this->common_model->find_Data(['name' => 'ju_customer'],'row','',['phone' => $this->session->userdata('token')]);
            
            $object = array(
                'userId' => $userInfo->Sno,
                'address1' => $this->input->post('address1',true),
                'address2' => $this->input->post('adress2',true),
                'city' => $this->input->post('city',true),
                'pin' => $this->input->post('pin',true),
                'addressType' => $this->input->post('ddlAddresType',true)
            );
            $this->common_model->insert_record('ju_custaddress', $object);
            $address1 = $this->input->post('address1',true);
            $address2 = $this->input->post('adress2',true);
            $city = $this->input->post('city',true);
            $pin = $this->input->post('pin',true);
        }
        else{
            if($this->input->post('address')){
                $addressId = $this->input->post('address');
                $addressData = $this->common_model->find_data(['name' => 'ju_custaddress'],'row','',['id' => $addressId]);
                $address1 = $addressData->address1;
                $address2 = $addressData->address2;
                $city = $addressData->city;
                $pin = $addressData->pin;
            }
            else{
                
                $this->session->set_flashdata('err_log', 'Please select address or create new location');
                redirect('checkout');
                
            }
            
        }
        
        if($this->input->post('paymentMode') == "cod"){
            $object = array(
                'buyerName' => $this->input->post('txtName',true),
                'mobileNumber' => $this->input->post('txtMobileNumber',true),
                'email' => $this->input->post('txtEmail',true),
                'buyerId' => $this->session->userdata('member_id'),
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'pin' => $pin,
                'note' => $this->input->post('message',true),
                'amount' => $this->cart->total(),
                'deliveryCharge' => 0.00,
                'totalOrderAmount' => $this->cart->total() + 0.00,
                'orderDateTime' => date('Y-m-d h:i:sa'),
                
                'orderStatus' => 1,
                'paymentMode' => 'cod',
            );
           $orderId = $this->common_model->insert_record('ju_order', $object);
           $paymentId = "TGCC".date('Y')."cod".sprintf('%04u', $orderId);
           $orderIdUpdate = array(
            'payment_id' => $paymentId,
            'payment_response' => $paymentId,
           );
           $this->common_model->updateData($orderId, 'id', $orderIdUpdate, 'ju_order');  

            foreach($this->cart->contents() as $list){
                //    Insert To Order Item Table
                $object = array(
                    'orderId' => $orderId,
                    'itemId' => $list['id'],
                    'itemName' => $list['name'],
                    'itemSellingPrice' => $list['price'],
                    'itemWeight' => $list['options']['weightName'],
                    'itemQty' => $list['qty'],
                );
                $this->common_model->insert_record('ju_orderitem', $object);
            }
            $this->cart->destroy();
            
            $redirect = 'order-success'.$paymentId;
            redirect($redirect,'refresh');
            
        }
        else{
            if(base_url() == "http://localhost/thegoodcowcompany/")
            {
                $api = new Api(RAZOR_TEST_KEY_ID, RAZOR_TEST_KEY_SECRET);
            }
            else{
                $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
            }
            
            $razorpayOrder = $api->order->create(array(
                'receipt'         => time(),
                'amount'          => $this->cart->format_number($this->cart->total()+ $this->session->userdata('tax')+$this->session->userdata('deliveryCharge')) * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ));
            $amount = $razorpayOrder['amount'];
            $razorpayOrderId = $razorpayOrder['id'];
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            $data = $this->prepareData($amount,$razorpayOrderId);
            $userInfo = $this->common_model->find_Data(['name' => 'ju_customer'],'row','',['phone' => $this->session->userdata('token')]);
            $object = array(
                'buyerName' => $this->input->post('txtName',true),
                'mobileNumber' => $this->input->post('txtMobileNumber',true),
                'email' => $this->input->post('txtEmail',true),
                'buyerId' => $userInfo->Sno,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'pin' => $pin,
                'note' => $this->input->post('message',true),
                'amount' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + $this->session->userdata('tax')),
                'deliveryCharge' => $this->session->userdata('deliveryCharge'),
                'totalOrderAmount' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + $this->session->userdata('tax')),
                'orderDateTime' => date('Y-m-d h:i:sa'),
                'orderStatus' => 0,
                'payment_response' => $razorpayOrderId,
                'paymentMode' => 'online',
                'gstno' => $this->input->post('gstno'),
                'comanyname' => $this->input->post('comanyname'),
            );
           $orderId = $this->common_model->insert_record('ju_order', $object);
           $paymentId = "TGCC".date('Y')."online".sprintf('%04u', $orderId);
           $orderIdUpdate = array(
            'payment_id' => $paymentId
           );
           $this->common_model->updateData($orderId, 'id', $orderIdUpdate, 'ju_order');
            $this->load->view('ecommmerce/rezorpay-view',array('data' => $data));
        }
        
    }

    /**
   * This function preprares payment parameters
   * @param $amount
   * @param $razorpayOrderId
   * @return array
   */
    public function prepareData($amount,$razorpayOrderId)
    {
        $data = array(
        "key" => base_url() == "http://localhost/thegoodcowcompany/" ? RAZOR_TEST_KEY_ID : RAZOR_KEY_ID,
        "amount" => $amount,
        "name" => "The Good Cow Company",
        "description" => "A2 Milk Goodness Now At Your Doorstep",
        "image" => "https://www.thegoodcowcompany.com/tgcc-payment.jpg",
        "prefill" => array(
            "name"  => $this->input->post('txtName'),
            "email"  => $this->input->post('txtEmail'),
            "contact" => $this->input->post('txtMobileNumber'),
        ),
        "notes"  => array(
            "address"  => "Hello World",
            "merchant_order_id" => rand(),
        ),
        "theme"  => array(
            "color"  => "#fab416"
        ),
        "order_id" => $razorpayOrderId,
        );
        return $data;
    }

      /**
   * This function verifies the payment,after successful payment
   */
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
        if(base_url() == "http://localhost/thegoodcowcompany/")
        {
            $api = new Api(RAZOR_TEST_KEY_ID, RAZOR_TEST_KEY_SECRET);
        }
        else{
            $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
        }
    try {
        $attributes = array(
          'razorpay_order_id' => $_SESSION['razorpay_order_id'],
          'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
      } catch(SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay_Error : ' . $e->getMessage();
      }
    }
    if ($success === true) {
      /**
       * Call this function from where ever you want
       * to save save data before of after the payment
       */
      $this->setRegistrationData();
      redirect(base_url().'order-success');
    }
    else {
      redirect(base_url().'payment-failed');
    }
  }

    /**
   * This function saves your form data to session,
   * After successfull payment you can save it to database
   */
  public function setRegistrationData()
  {
    $orderIdUpdate = array(
        'orderStatus' => 1
    );
    $this->common_model->updateData($_SESSION['razorpay_order_id'], 'payment_response', $orderIdUpdate, 'ju_order');

    // Get Order Data 
    $orderDetails = $this->common_model->find_data(['name' => 'ju_order'],'row','',['payment_response' => $_SESSION['razorpay_order_id']]);
    $type="IGST";
    

    if((int)$orderDetails->pin > 699999 && (int)$orderDetails->pin < 749999) {
        $type="CGST + SGST";
    }

    foreach($this->cart->contents() as $list){
        //    Insert To Order Item Table
        $tax =   $list['options']['igst'];
        if((int)$orderDetails->pin > 699999 && (int)$orderDetails->pin < 749999) {
            $tax =   $list['options']['cgstsgst'];
        }
        $object = array(
            'orderId' => $orderDetails->id,
            'itemId' => $list['id'],
            'itemName' => $list['name'],
            'itemSellingPrice' => $list['price'],
            'itemWeight' => $list['options']['weightName'],
            'itemQty' => $list['qty'],
            'taxType' => $type,
            'tax'     => $tax,
            'hsnc'     => $list['options']['hsnc'],
        );
        $this->common_model->insert_record('ju_orderitem', $object);
    }
    $this->cart->destroy();
  }


    // This function for order success
    public function orderSuccess()
    {
       // All Category
       $categoryList = $this->common_model->find_data(['name' => 'ju_category'],'array','',['status' => 1],'','','',[['field' => 'serialNo', 'type' => "ASC"]]);
        $data = array(
            'mainContent' => 'ecommmerce/order-success-view',
            'category' => $categoryList,
            'pageName' => 'Thanks for shoping with us  - The Good Cow Company'
        );
        $this->load->view('ecommmerce/layouts/layout', $data);
    }


    // This function for order cancel
    public function orderCancel()
    {
       // All Category
       $categoryList = $this->common_model->find_data(['name' => 'ju_category'],'array','',['status' => 1],'','','',[['field' => 'serialNo', 'type' => "ASC"]]);
        $data = array(
            'mainContent' => 'ecommmerce/order-cancel-view',
            'category' => $categoryList,
            'pageName' => 'Thanks for shoping with us  - The Good Cow Company'
        );
        $this->load->view('ecommmerce/layouts/layout', $data);
    }


    // This function for cancel data
    public function calculateGST()
    {
       $pincode = $this->input->post('pincode');
       $cgsts = array();
       $igsts = array();
       $shipping = 0;
    
        // Get all cart contents
        foreach($this->cart->contents() as $list){
            //    Insert To Order Item Table
            $cgsts[] = $list['options']['cgstsgst'] * $list['qty'] * $list['price'] /  100;
            $igsts[] = $list['options']['igst'] * $list['qty'] * $list['price'] /  100;
        }
       if($pincode > 699999 && $pincode < 749999) {
        //    This pincode belongs to west bengal
        if($this->cart->total() > 800){
            $this->session->set_userdata([
                'deliveryCharge' => 0
            ]);
        }
        else{
            $this->session->set_userdata([
                'deliveryCharge' => 50.00
            ]);
            $shipping = 50.00;
        }
        $this->session->set_userdata(['tax' => number_format(array_sum($cgsts),2)]);    
        echo json_encode(['status' => 1, 'totaltax' => number_format(array_sum($cgsts),2), 'total' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + array_sum($cgsts)), 'sipping' => $shipping]);  
        return;
       }
       if($this->cart->total() > 800){
        $this->session->set_userdata([
            'deliveryCharge' => 0
        ]);
        }
        else{
            $this->session->set_userdata([
                'deliveryCharge' => 70.00
            ]);
            $shipping = 70.00;
        }
       $this->session->set_userdata(['tax' => number_format(array_sum($igsts),2)]);
       echo json_encode(['status' => 1, 'totaltax' => number_format(array_sum($igsts),2), 'total' => $this->cart->format_number($this->cart->total() + $this->session->userdata('deliveryCharge') + array_sum($igsts)), 'sipping' => $shipping]);
        return;
    }

    public function invoice($orderId)
    {
        $orderDetails =   $this->common_model->find_data(['name' => 'ju_order'],'row','',['payment_id' => $orderId]);
        $this->load->view('invoice/invoice_view',[
            'orderDetails' => $orderDetails ,
            'orderItems' => $this->common_model->find_data(['name' => 'ju_orderitem'],'array','',['orderId' => $orderDetails->id]),
        ]);
    }


    

   

}

/* End of file Booking.php */