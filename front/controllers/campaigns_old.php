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
            $amount = $this->input->post('amount');
            $currency = $this->input->post('currency');
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
            $this->payment_model->data['programme'] = $programme = $this->input->post('programme');
            $this->payment_model->data['payment_date'] = date('Y-m-d H:i:s');
            $this->payment_model->data['sem'] =   $sem = $this->input->post('sem');
            $sem = !empty($sem) ? "?sem=".$sem : '';
                $insert_id = $this->payment_model->insert($table_name);

            $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
    
            //
            // We create an razorpay order using orders api
            // Docs: https://docs.razorpay.com/docs/orders
            //
            $orderData = [
                'receipt'         => $receipt,
                'amount'          => $amount * 100, // 2000 rupees in paise
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
    

    function thmx_currency_convert($amount)
    {
        $url = 'https://api.exchangerate-api.com/v4/latest/INR';
        $json = file_get_contents($url);
        $exp = json_decode($json);

        $convert = $exp->rates->USD;

        return $convert * $amount;
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
   
    public function campaign() {
       
        $data = $this->data;
        $data['page_heading'] = 'Seva Page';
        $template_path = 'templates/campaigns/campaign_home';
        $data['view_path'] = 'campaigns/campaign';
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span> <span><a href="'.$this->class_name .'">'.ucfirst($this->class_name).'</a> - </span>Seva Page';
        // $data['scripts'] = array('assets/javascripts/seva_page.js');
        $this->load->view($template_path, $data);
    
    }
    public function diwali() {
        
        $data = $this->data;
        $data['page_heading'] = 'Seva Page';
        $template_path = 'templates/campaigns/diwali_home';
        $data['view_path'] = 'campaigns/diwali';
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span> <span><a href="'.$this->class_name .'">'.ucfirst($this->class_name).'</a> - </span>Seva Page';
        // $data['scripts'] = array('assets/javascripts/seva_page.js');
        $this->load->view($template_path, $data);
    
    }

    public function pay()
    {
       $data = $this->data;
        //print_r($this->input->post());exit;
        $citizen = $this->input->post('citizen');
        $dob = !empty($this->input->post('dob')) ? $this->input->post('dob') : '0000-00-00';
        $pan = $this->input->post('pan');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile_number = $this->input->post('mobile_number');
        $location = !empty($this->input->post('location')) ? $this->input->post('location') : 'N/A';
        $city = $this->input->post('city');
        $amount = $this->input->post('amount');
        $currency = $this->input->post('currency');
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $generated_key = substr(str_shuffle($str_result), 0, 4);
        $receipt = $generated_key . '_' . rand('127583123', '192474523');

        $this->payment_model->data['receipt'] = $receipt;
        $this->payment_model->data['name'] = $name = $this->input->post('name');
        $this->payment_model->data['email'] = $email = $this->input->post('email');
        $this->payment_model->data['mobile_number'] = $this->input->post('mobile_number');
        $this->payment_model->data['city'] = $this->input->post('city');
        $this->payment_model->data['amount'] = $amount = $this->input->post('amount');
        $this->payment_model->data['pan'] = $this->input->post('pan');
        $this->payment_model->data['dob'] = !empty($this->input->post('dob')) ? $this->input->post('dob') : '0000-00-00';
        $this->payment_model->data['save_the_date'] = $save_the_date = !empty($this->input->post('save_the_date')) ? $this->input->post('save_the_date') : 'NULL';
        $this->payment_model->data['savedate_check'] = $savedate_check = !empty($this->input->post('savedate') && $this->input->post('savedate') == 'on') ? 'on' : 'off';
        $this->payment_model->data['receive_updates'] = $receive_updates = !empty($this->input->post('receive_updates') && $this->input->post('receive_updates') == 'on') ? 'on' : 'off';
        $this->payment_model->data['whatsapp_number'] = $whatsapp_number = !empty($this->input->post('whatsapp_number')) ? $this->input->post('whatsapp_number') : 'NULL';
        $this->payment_model->data['citizen'] = $this->input->post('citizen');
        $this->payment_model->data['programme'] = $programme = $this->input->post('programme');
        $this->payment_model->data['sem'] =   $sem = $this->input->post('sem');
        $this->payment_model->data['payment_date'] = date('Y-m-d H:i:s');
        $this->payment_model->data['payment_status'] = 'Dropped';


        $insert_id = $this->payment_model->insert('payments');

        $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));

        //
        // We create an razorpay order using orders api
        // Docs: https://docs.razorpay.com/docs/orders
        //
        $orderData = [
            'receipt'         => $receipt,
            'amount'          => $amount * 100, // 2000 rupees in paise
            'currency'        => $currency,
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];

        if ($this->config->item('displayCurrency') !== $currency) {
            $url = "https://api.fixer.io/latest?symbols=$this->config->item('displayCurrency')&base=" . $orderData['currency'] . "";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$this->config->item('displayCurrency')] * $amount / 100;
        }

        $checkout = 'automatic';

        if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
            $checkout = $_GET['checkout'];
        }

        $data = [
            "key"               => $this->config->item('keyId'),
            "amount"            => $amount,
            "name"              => "Akshayachaitanya",
            "description"       => "Not-for-profit initiative to eradicate hunger",
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
            "savedate_check"         => $savedate_check,
            "save_the_date"         => $save_the_date,
            "receive_updates"         => $receive_updates,
            "whatsapp_number"         => $whatsapp_number,
            "programme"         => $programme
        ];

        if ($this->config->item('displayCurrency') !== $currency) {
            $data['display_currency']  = $this->config->item('displayCurrency');
            $data['display_amount']    = $displayAmount;
        }

        $json = json_encode($data);
        $data['view_path'] = $this->class_name . "/donate".$sem;
        $this->load->view('templates/campaigns/campaign_home', $data);
        // require(APPPATH."checkout/{$checkout}.php");
    }

    public function save_payment($insert_id,$table_name)
    {
      
        $this->payment_model->primary_key = array('donation_id'=>$insert_id);
        $payment_data = $this->payment_model->row_data($table_name);
        $this->payment_model->data['name'] =$name =  $payment_data->name;
        $this->payment_model->data['email'] =$email =  $payment_data->email;
        $this->payment_model->data['city'] =$city =  $payment_data->city;
        $this->payment_model->data['mobile_number'] =$mobile_number =  $payment_data->mobile_number;
        $this->payment_model->data['amount'] =$amount =  $payment_data->amount;
        $this->payment_model->data['savedate_check'] =$savedate_check =  $payment_data->savedate_check;
        $this->payment_model->data['save_the_date'] =$save_the_date =  $payment_data->save_the_date;
        $this->payment_model->data['programme'] =$programme =  $payment_data->programme;
        $this->payment_model->data['receive_updates'] =$receive_updates =  $payment_data->receive_updates;
        $this->payment_model->data['order_id'] =$order_id = (!empty($this->input->post('error')) ? json_decode($this->input->post('error')['metadata'])->payment_id : (!empty($this->input->post('razorpay_payment_id')) ? $this->input->post('razorpay_payment_id') : $payment_data->receipt.'RZP Id Not Found'));
        $this->payment_model->data['receipt'] =$receipt =  $payment_data->receipt;
        
        $this->payment_model->data['razorpay_payment_id'] = $razorpay_payment_id = (!empty($this->input->post('error')) ? json_decode($this->input->post('error')['metadata'])->payment_id : (!empty($this->input->post('razorpay_payment_id')) ? $this->input->post('razorpay_payment_id') : $payment_data->receipt.'RZP Id Not Found'));
        $this->payment_model->data['org_name'] = $org_name = $payment_data->org_name;
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
            redirect($this->class_name . '/donation_failed/'.$name);

        }else{    
        $this->payment_model->data['payment_status'] = 'success';
       
      
        $this->payment_model->primary_key = array('donation_id'=> $insert_id);
        if ($this->payment_model->update($table_name)) {

            // $this->html_to_pdf($receipt, $razorpay_payment_id, $org_name, $email,$mobile_number, $name, $amount, $address);
            if($savedate_check == 'on'){
                $this->sendwritemail($name,$email,$amount,$order_id,$receipt,$razorpay_payment_id,$save_the_date);
            }
            $this->sendmail($email, $name, $amount,$receipt, 1);
            $this->session->set_flashdata('order_id',$order_id);
            $this->session->set_flashdata('razorpay_payment_id',$razorpay_payment_id);
            $this->session->set_flashdata('receipt',$receipt);

            redirect($this->class_name . '/donation_success/' . $name . '/' . $amount);
        } 
    }
    }

public function sendwritemail($name,$email,$amount,$order_id,$receipt,$razorpay_payment_id,$save_the_date)
    {


        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'mail.akshayachaitanya.org';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'donations@akshayachaitanya.org';
        $config['smtp_pass']    = '@ksh@y@ch@it@ny@123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not 

        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->from('donations@akshayachaitanya.org', 'Akshaya Chaitanya');
        $this->email->to('write2us@akshayachaitanya.org');
        // $this->email->to('sathishds94@gmail.com');

        $this->payment_model->primary_key = array('template_id' => 3);
        $template = $this->payment_model->row_data('email_templates');
        $this->email->subject($template->template_title);
         $message = str_replace('####NAME####', $name, $template->template_content);
        $message = str_replace('####AMOUNT####', $amount, $message);
        $message = str_replace('####DATE####', $save_the_date, $message);
        
        $details = '<br>Name: '.$name;
        $details .= '<br>Email: '.$email;
        $details .= '<br>Amount: '.$amount;
        $details .= '<br>Order Id: '.$order_id;
        $details .= '<brReceipt: '.$receipt;
        $details .= '<br>Razorpay Payment Id: '.$razorpay_payment_id;
        $details .= '<br>Save The Date: '.$save_the_date;
        $message = str_replace('####DETAILS####', $details,$message);


        $this->email->message($message);

        $this->email->send();
      

    }
    public function sendmail($to_mail, $name, $amount,$receipt, $status)
    {
      

        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'mail.akshayachaitanya.org';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'donations@akshayachaitanya.org';
        $config['smtp_pass']    = '@ksh@y@ch@it@ny@123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        // $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not 

        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->from('donations@akshayachaitanya.org', 'Akshaya Chaitanya');
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

        // $body = '';
        //  $config = array (
        //           'mailtype' => 'html',
        //           'charset'  => 'utf-8',
        //           'priority' => '1'
        //           );
        // $this->email->initialize($config);
        // $this->email->from('info@Akshayachaitanya.in');
        // $this->email->to($to_mail);
        //     $data['name'] =  $name;
        //     $data['amount'] = $amount;

        // if($status == 1){
        //     $this->email->subject('DONATION SUCCESSFUL: Thank you for your generosity!');
        //     $body = $this->load->view('email_templates/success.php',$data,TRUE);
        // }elseif($status == 0){
        //     $this->email->subject('FAILED TRANSACTION: Your donation could not be processed.');
        //     $body = $this->load->view('email_templates/failed.php',$data,TRUE);
        // }
        // $this->email->message($body);

    }

    public function donation_success($res = '', $amount= '')
    {
        if(empty($res) || empty($amount)){
            redirect('donate');
        }
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_success';
        $data['name'] = urldecode($res);
        $data['amount'] = $amount;
      
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/campaigns/campaign_home', $data);
    }
    public function donation_failed($name)
    {
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_failed';
        $data['name'] = ucfirst($name);
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/campaigns/campaign_home', $data);
    }



//     public function html_to_pdf(){
//         $tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $tcpdf->SetCreator(PDF_CREATOR);
// $tcpdf->SetAuthor('Muhammad Saqlain Arif');
// $tcpdf->SetTitle('TCPDF Example 001');
// $tcpdf->SetSubject('TCPDF Tutorial');
// $tcpdf->SetKeywords('TCPDF, PDF, example, test, guide');
// $tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,65,256), array(0,65,127));
// $tcpdf->setFooterData(array(0,65,0), array(0,65,127));
// $tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// $tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// $tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// $tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// $tcpdf->AddPage();

// $tcpdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,197,198), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
//         $html = <<<EOD
//         <html>
//         <head>
//         <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        
       
//      <style>
             
//      :root {
//          /* --thm-font: 'Nunito', sans-serif; */
//          --thm-font: 'Overpass', sans-serif;
//          --thm-gray: #707876;
//          --thm-gray-rgb: 112, 120, 118;
//          /* --thm-primary: #15c8a0; */
//          --thm-primary: #4db748;
//          --thm-primary-secondary: #1d6da0;
//          --thm-primary-rgb: 21, 200, 160;
//          --thm-black: #1f2230;
//          --thm-white: #ffffff;
//          --thm-light-grey: rgb(233, 233, 233);
//          --thm-black-rgb: 31, 34, 48;
//      }
     
//      .thm-text {
//          color: var(--thm-primary) !important;
//      }
     
//      .thead-thm-blue th{
//          background: var(--thm-primary-secondary);
//          color: #fff;
//      }
//      </style>
//      </head>
//      <body>
//      <section class="col-sm-11 col-md-11 col-lg-8 mx-auto my-5">
//      <div class="container">
//          <div class="row">
//              <div class="col-sm-12 col-md-12 col-lg-5">
//                  <img src="https://akshayachaitanya.org/wp-content/uploads/2021/07/logo_ac-768x273.png"
//                      class="img-fluid img-thumbnail">
//                  <address>
//                      <strong class="thm-text">Visit Office</strong><br>
//                      Akshaya Chaitanya Kitchen, <br>
//                      JAK Compound,<br>
//                      Dadoji Konddeo Cross Lane, <br>
//                      Byculla, Mumbai 400027 <br>
//                      <abbr title="Phone">Call :</abbr> +918928991161 <br>
//                      <abbr title="Email">Email :</abbr> write2us@akshayachaitanya.org
//                  </address>
//              </div>
//              <div class="col-lg-2"></div>
//              <div class="col-sm-12 col-md-12 col-lg-5">
//                  <h4 class="thm-text">Donation Info</h4>
//                  <table class="table table-bordered">
//                      <thead class="thead-thm-blue">
//                          <tr>
//                              <th>Date</th>
//                              <th>Invoice Number</th>
//                          </tr>
//                          <tr>
//                              <td>####DATE####</td>
//                              <td>####ORDERID####</td>
//                          </tr>
     
//                      </thead>
//                  </table>
//                  <table class="table table-bordered">
//                      <thead class="thead-thm-blue">
//                          <tr>
//                              <th colspan="2">Donor Info</th>
     
//                          </tr>
     
//                      </thead>
//                      <tr>
     
//                          <th><strong>Name : </strong> </th>
//                          <td>####NAME####,</td>
//                      </tr>
//                      <tr>
//                          <th><strong>Email : </strong> </th>
//                          <td> ####EMAIL####,</td>
//                      </tr>
//                      <tr>
//                          <th><strong>Phone : </strong></th>
//                          <td> ####PHONE####,</td>
//                      </tr>
//                      <tr>
//                          <th><strong>Address : </strong></th>
//                          <td> ####ADDRESS####</td>
//                      </tr>
//                  </table>
//              </div>
//          </div>
//          <div class="row">
//              <div class="col-sm-12">
//                  <table class="table table-bordered">
//                      <thead class="thead-thm-blue">
//                          <tr>
//                              <th >Transaction Id</th>
//                              <th >RazorPay Id</th>
//                              <th>Amount</th>
//                          </tr>
     
//                      </thead>
//                      <tbody>
//                          <tr>
//                              <td>####TRANSACTIONID####</td>
//                              <td>####RAZORPAYID####</td>
//                              <td>####AMOUNT####</td>
//                          </tr>
//                      </tbody>
//              </div>
//          </div>
//      </div>
//      </section>
//      </body>
//      </html>
//      EOD; 

//         $tcpdf->writeHTML($html, true, false, true, false, '');
//         ob_end_clean();
//         $tcpdf->Output('tcpdfexample-onlinecode.pdf', 'I');
 
    
//        }

}