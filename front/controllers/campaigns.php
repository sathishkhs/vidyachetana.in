<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'vendor/autoload.php';
// require(APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php');
// require_once 'vendor/dompdf/autoload.inc.php';
// print_r(get_included_files());exit;
use Razorpay\Api\Api;
class Campaigns extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->config->load('razorpay-config');
      
       
        $this->load->model('payment_model');
    }

  public function index($slug) {
        if($slug == 'sponsor-a-child'){
            redirect('sponsor-for-education');
        }
    //   print_r($_POST);exit;
        if(!empty($this->input->post())){
            $data = $this->data;
            $table_name = $this->input->post('table_name');
          
            $citizen = $this->input->post('citizen');
            $dob = !empty($this->input->post('dob')) ? $this->input->post('dob') : '0000-00-00';
            $pan = $this->input->post('pan');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mobile_number = $this->input->post('mobile_number');
            $location = !empty($this->input->post('location')) ? $this->input->post('location') : 'N/A';
            $city = $this->input->post('city');
            // $amount = $this->input->post('amount');
            // $amount = $this->input->post('payble_amount');
            
            $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generated_key = substr(str_shuffle($str_result), 0, 4);
            $receipt = $generated_key . '_' . rand('127583123', '192474523');
            
            $this->payment_model->data['receipt'] = $receipt;
            $this->payment_model->data['name'] = $name = $this->input->post('name');
            $this->payment_model->data['email'] = $email = $this->input->post('email');
            $this->payment_model->data['mobile_number'] = $this->input->post('mobile_number');
            $this->payment_model->data['city'] = $this->input->post('city');
            $this->payment_model->data['amount'] = $amount = $this->input->post('amount');
            $this->payment_model->data['pan'] = $pan = $this->input->post('pan');
            
            $this->payment_model->data['citizen'] = $this->input->post('citizen');
            $this->payment_model->data['currency'] = $currency = $this->input->post('currency');
            $this->payment_model->data['programme'] = $programme = $this->input->post('programme');
            $this->payment_model->data['payment_date'] = date('Y-m-d H:i:s');
            $this->payment_model->data['sem'] =   $sem = $this->input->post('sem');
            $sem = !empty($sem) ? "?sem=".$sem : '';
                $insert_id = $this->payment_model->insert($table_name);
                if($currency == 'INR' ){
                    $rzp_amount = $amount * 100;
                    $keyId = $this->config->item('keyId');
                    $keySecret = $this->config->item('keySecret');
     
                }else{
                    $rzp_amount = $amount;
                    $keyId = $this->config->item('foreign_keyId');
                    $keySecret = $this->config->item('foreign_keySecret');
                }

            $api = new Api($keyId, $keySecret);
    
          
            //
            // We create an razorpay order using orders api
            // Docs: https://docs.razorpay.com/docs/orders
            //
            $orderData = [
                'receipt'         => $receipt,
                'amount'          => $rzp_amount, // 2000 rupees in paise
                'currency'        => $currency,
                'payment_capture' => 1, // auto capture
                'notes'           => array(
                    "name"  =>  $name,
                    "email"             => $email,
                    "contact"           => $mobile_number,
                    "pan"               => $pan,
                    "dob"               => $dob,
                    "citizen"           => $citizen,
                )

            ];
    
            $razorpayOrder = $api->order->create($orderData);
              
            $razorpayOrderId = $razorpayOrder['id'];
    
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    
            $displayAmount = $amount = $orderData['amount'];
    
            // if ($this->config->item('displayCurrency') !== $currency) {
            //     $url = "https://api.fixer.io/latest?symbols=$this->config->item('displayCurrency')&base=" . $orderData['currency'] . "";
            //     $exchange = json_decode(file_get_contents($url), true);
    
            //     $displayAmount = $exchange['rates'][$this->config->item('displayCurrency')] * $amount / 100;
            // }
    
            $checkout = 'automatic';
    
            if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
                $checkout = $_GET['checkout'];
            }
    
            $data += [
                "key"               => $this->config->item('keyId'),
                "amount"            => $amount,
                "name"              => "Vidya Chetana",
                "description"       => "Vidya Chetana Scholarship Program",
                "image"             => "https://s3.amazonaws.com/assets.reachapp.co/assets/000/019/820/VC_YFS_logo_(1).original.png?1596717275",
                "prefill"           => [
                    "name"              => $name,
                    "email"             => $email,
                    "contact"           => $mobile_number,
                    "pan"               => $pan,
                    "dob"               => $dob,
                    "citizen"           => $citizen,
                ],
                "notes"             => [
                    "address"           => $city,
                    "location"          => $city,
                    "city"              => $city,
                    "merchant_order_id" => $receipt,
                ],
                "theme"             => [
                    "color"             => "#5ab941"
                ],
                "order_id"          => $razorpayOrderId,
                "insert_id"         => $insert_id,
                "programme"         => $programme,
                "table_name"              =>$table_name
            ];
    
            if ($this->config->item('displayCurrency') !== $currency) {
                $data['display_currency']  = $this->config->item('displayCurrency');
                $data['display_amount']    = $displayAmount;
            }
          
            $json = json_encode($data);
            $data['view_path'] = "campaigns/$slug";
            $this->load->view('templates/custom_page', $data);


        }else{
        $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        $data['view_path'] = "campaigns/$slug"; 
        $data['page_heading'] = $data['page_items']->page_title;
        $data['breadcrumb'] = '<b><a href="" class="thm-text">BACK TO HOME</a></b> ';
        // $data['scripts'] = array('assets/javascripts/campaign_page.js');
        $this->load->view($template_path, $data);
        }
    
    }
    

    function currency_convert($amount,$currency)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/INR";
        $json = file_get_contents($url);
        $exp = json_decode($json);

        $convert = $exp->rates->$currency;

        // return $convert * $amount;
        echo json_encode(round($convert * $amount));
    }
    // echo thmx_currency_convert(1000);


    public function html_to_pdf($receipt, $razorpay_payment_id, $org_name, $email,$mobile_number, $name, $amount, $address){
        $mpdf = new \Mpdf\Mpdf();
    //   $html = $this->load->view('invoice_templates/donation_success',[],true);
        $this->payment_model->primary_key = array('template_id' => 4);
        $template = $this->payment_model->row_data('email_templates');
      $html = str_replace('####NAME####',$name,$template->template_content);
      $html = str_replace('####EMAIL####',$email,$html);
      $html = str_replace('####ORGNAME####',$org_name,$html);
      $html = str_replace('####ORDERID####',$receipt,$html);
      $html = str_replace('####TRANSACTIONID####',$razorpay_payment_id,$html);
      $html = str_replace('####AMOUNT####',$amount,$html);
      $html = str_replace('####ADDRESS####',$address,$html);
      $html = str_replace('####DATE####',date('Y-m-d'),$html);
      $html = str_replace('####MOBILE####',$mobile_number,$html);
    
      $mpdf->SetDisplayMode('fullpage','single');
   
        $mpdf->WriteHTML($html);
    //   $mpdf->WriteHTML($html);
        $mpdf->Output(INVOICE_PDF_PATH."$receipt.pdf",'F');
        return true;
       }
   


    public function save_payment($insert_id,$table_name)
    {
      
        $this->payment_model->primary_key = array('donation_id'=>$insert_id);
        $payment_data = $this->payment_model->row_data($table_name);
        // print_r($payment_data);exit;
        $this->payment_model->data['name'] =$name =  $payment_data->name;
        $this->payment_model->data['email'] =$email =  $payment_data->email;
        $this->payment_model->data['city'] =$city =  $payment_data->city;
        $this->payment_model->data['mobile_number'] =$mobile_number =  $payment_data->mobile_number;
        $this->payment_model->data['amount'] =$amount =  $payment_data->amount;
        
        $this->payment_model->data['programme'] =$programme =  $payment_data->programme;
      
        $this->payment_model->data['order_id'] =$order_id = (!empty($this->input->post('error')) ? json_decode($this->input->post('error')['metadata'])->payment_id : (!empty($this->input->post('razorpay_payment_id')) ? $this->input->post('razorpay_payment_id') : $payment_data->receipt.'RZP Id Not Found'));
        $this->payment_model->data['receipt'] =$receipt =  $payment_data->receipt;
        
        $this->payment_model->data['razorpay_payment_id'] = $razorpay_payment_id = (!empty($this->input->post('error')) ? json_decode($this->input->post('error')['metadata'])->payment_id : (!empty($this->input->post('razorpay_payment_id')) ? $this->input->post('razorpay_payment_id') : $payment_data->receipt.'RZP Id Not Found'));
      
        $pan = $payment_data->pan;
        $payment_date = date('Y-m-d H:i:s');

        $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
        $api->payment->fetch($order_id)->edit(array('notes'=> array('name'=>$name, 'mobile_number'=>$mobile_number,'receipt'=>$receipt,'pan'=>$pan,'payment_date'=>$payment_date)));

        if(!empty($this->input->post('error'))){
            $this->payment_model->data['payment_status'] = 'Failed';
            $this->payment_model->data['razorpay_payment_id'] = json_decode($this->input->post('error')['metadata'])->payment_id;
            $this->payment_model->primary_key = array('donation_id'=>$insert_id);
            $this->payment_model->update($table_name);
            $this->sendmail($email, $name, $amount,$receipt, 0);
            redirect($this->class_name . '/donation_failed/');

        }else{    
        $this->payment_model->data['payment_status'] = 'success';
       
      
        $this->payment_model->primary_key = array('donation_id'=> $insert_id);
        if ($this->payment_model->update($table_name)) {

           
            $this->sendmail($email, $name, $amount,$receipt, 1);
            $this->session->set_flashdata('name',$name);
            $this->session->set_flashdata('amount',$amount);
            $this->session->set_flashdata('order_id',$order_id);
            $this->session->set_flashdata('razorpay_payment_id',$razorpay_payment_id);
            $this->session->set_flashdata('receipt',$receipt);
            
            redirect($this->class_name . "/donation_success/$name/$amount/$razorpay_payment_id");
        } 
    }
    }

    public function sendmail($to_mail, $name, $amount,$receipt, $status)
    {
      

        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'mail.vidyachetana.in';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'donations@vidyachetana.in';
        $config['smtp_pass']    = 'vidyachetana';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        // $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not 

        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->from('donations@vidyachetana.in', 'Vidya Chetana');
        $this->email->to($to_mail);

        if ($status == 1) {
            $this->payment_model->primary_key = array('template_id' => 1);
            $template = $this->payment_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;
            $message = str_replace('####NAME####', $name, $template->template_content);
             $message = str_replace('####RECEIPT####', $receipt, $message);
        } elseif ($status == 0) {
            $this->payment_model->primary_key = array('template_id' => 2);
            $template = $this->payment_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;

            $message = str_replace('####NAME####', $name, $template->template_content);
            $message = str_replace('####RECEIPT####', $receipt, $message);
            // $message = $this->load->view('email_templates/failed.php',$data,true);
        }


        $this->email->message($message);
       
        $q = $this->email->send();

        
    }

    public function donation_success($res = '', $amount= '', $razorpay_payment_id = '')
    {
        $data = $this->data ;
        // if(empty($res) || empty($amount)){
        //     redirect('donate');
        // }
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_success';
        $data['name'] = urldecode($res);
        $data['amount'] = $amount;
        $data['razorpay_payment_id'] = $razorpay_payment_id;
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/custom_page', $data);
    }
    public function donation_failed($name)
    {
        $data = $this->data;
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_failed';
        $data['name'] = ucfirst($name);
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/custom_page', $data);
    }




}