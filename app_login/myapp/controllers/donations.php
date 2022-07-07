<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	// require(APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php');

	use Razorpay\Api\Api;
class Donations extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('payments_model');
		$this->load->model('gallery_model');
		$this->config->load('razorpay-config');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		
		$data['view'] = 'donations/donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Donations List';
		$data['breadcrumb'] = 'Donations List';
		$data['scripts'] = array('assets/javascripts/donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function donations_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$payments = $this->payments_model->get_pagination('payments');

		$data = array();
		foreach ($payments->result() as $row) {
		if(!empty($row->payment_status) ){
			if($row->payment_status == 'success'){
		    $status = '<span class="text-success">Success</span>';
			}else{
			$status = 	'<span class="text-danger">Failed</span>';
			}
		}else{
		    $status = '<span class="text-warning">Dropped</span>';
		}
			$data[] = array(
				$row->name,
				$row->email,
				$row->mobile_number,
				$row->city,
				$row->amount,
				$row->razorpay_payment_id,
				$status,
				$row->payment_date
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $payments->num_rows(),
			"recordsFiltered" => $payments->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function download_donations(){
		
		$download = $this->input->post('download');
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		// print_R($download); exit;
		if($download == 'Download Donations'){
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';
		
		$donations = $this->payments_model->view_donations('payments',$from_date,$to_date);
	
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Receipt No", "Order Id", "Name", "Email", "Mobile Number", "Location", "City", "Amount", "Save Date Check", "Save the Date", "Pan Number", "D.O.B", "Citizen", "Receive Updates", "Whatsapp Number", "Razorpay Payment Id", "Programme", "Payment Status", "Payment Date");
		$sheet = $spreadsheet->getActiveSheet()
								->fromArray(
									$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->receipt);
			$sheet->setCellValue('C'.$key, $row->order_id);
			$sheet->setCellValue('D'.$key, $row->name);
			$sheet->setCellValue('E'.$key, $row->email);
			$sheet->setCellValue('F'.$key, $row->mobile_number);
			$sheet->setCellValue('G'.$key, $row->location);
			$sheet->setCellValue('H'.$key, $row->city);
			$sheet->setCellValue('I'.$key, $row->amount);
			$sheet->setCellValue('J'.$key, $row->savedate_check);
			$sheet->setCellValue('K'.$key, $row->save_the_date);
			$sheet->setCellValue('L'.$key, $row->pan);
			$sheet->setCellValue('M'.$key, $row->dob);
			$sheet->setCellValue('N'.$key, $row->citizen);
			$sheet->setCellValue('O'.$key, $row->receive_updates);
			$sheet->setCellValue('P'.$key, $row->whatsapp_number);
			$sheet->setCellValue('Q'.$key, $row->razorpay_payment_id);
			$sheet->setCellValue('R'.$key, $row->programme);
			$sheet->setCellValue('S'.$key, $row->payment_status);
			$sheet->setCellValue('T'.$key, $row->payment_date);
			
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}elseif($download == 'Download Donations for ATG'){
		$this->atg_download_donations($from_date,$to_date);
	}

	}
	public function atg_download_donations($from_date,$to_date){
		$donations = $this->payments_model->view_donations('payments',$from_date,$to_date);
	
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Receipt No", "Order Id", "Name", "Email", "Mobile Number", "Amount", "Pan Number", "Razorpay Payment Id", "Programme", "Payment Status", "Payment Date");
		$sheet = $spreadsheet->getActiveSheet()
								->fromArray(
									$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->receipt);
			$sheet->setCellValue('C'.$key, $row->order_id);
			$sheet->setCellValue('D'.$key, $row->name);
			$sheet->setCellValue('E'.$key, $row->email);
			$sheet->setCellValue('F'.$key, $row->mobile_number);
			$sheet->setCellValue('G'.$key, $row->amount);
			$sheet->setCellValue('H'.$key, $row->pan);
			$sheet->setCellValue('I'.$key, $row->razorpay_payment_id);
			$sheet->setCellValue('J'.$key, $row->programme);
			$sheet->setCellValue('K'.$key, $row->payment_status);
			$sheet->setCellValue('L'.$key, $row->payment_date);
			
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}

	public function new_year_donations(){
		
		$data['view'] = 'donations/new_year_donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'New Year Donations List';
		$data['breadcrumb'] = 'New Year Donations List';
		$data['scripts'] = array('assets/javascripts/donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function new_year_donations_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$payments = $this->payments_model->get_pagination('new_year_donations');

		$data = array();
		foreach ($payments->result() as $row) {
		if(!empty($row->payment_status) ){
			if($row->payment_status == 'success'){
		    $status = '<span class="text-success">Success</span>';
			}else{
			$status = 	'<span class="text-danger">Failed</span>';
			}
		}else{
		    $status = '<span class="text-warning">Dropped</span>';
		}
			$data[] = array(
				$row->name,
				$row->email,
				$row->mobile_number,
				$row->city,
				$row->amount,
				$row->razorpay_payment_id,
				$status,
				$row->payment_date
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $payments->num_rows(),
			"recordsFiltered" => $payments->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
		public function new_year_download_donations(){
		
 
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';
		
		$donations = $this->payments_model->view('new_year_donations');
	
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Receipt No", "Order Id", "Name", "Email", "Mobile Number", "Location", "City", "Amount", "Save Date Check", "Save the Date", "Pan Number", "D.O.B", "Citizen", "Receive Updates", "Whatsapp Number", "Razorpay Payment Id", "Programme", "Payment Status", "Payment Date");
		$sheet = $spreadsheet->getActiveSheet()
								->fromArray(
									$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->receipt);
			$sheet->setCellValue('C'.$key, $row->order_id);
			$sheet->setCellValue('D'.$key, $row->name);
			$sheet->setCellValue('E'.$key, $row->email);
			$sheet->setCellValue('F'.$key, $row->mobile_number);
			$sheet->setCellValue('G'.$key, $row->location);
			$sheet->setCellValue('H'.$key, $row->city);
			$sheet->setCellValue('I'.$key, $row->amount);
			$sheet->setCellValue('J'.$key, $row->savedate_check);
			$sheet->setCellValue('K'.$key, $row->save_the_date);
			$sheet->setCellValue('L'.$key, $row->pan);
			$sheet->setCellValue('M'.$key, $row->dob);
			$sheet->setCellValue('N'.$key, $row->citizen);
			$sheet->setCellValue('O'.$key, $row->receive_updates);
			$sheet->setCellValue('P'.$key, $row->whatsapp_number);
			$sheet->setCellValue('Q'.$key, $row->razorpay_payment_id);
			$sheet->setCellValue('R'.$key, $row->programme);
			$sheet->setCellValue('S'.$key, $row->payment_status);
			$sheet->setCellValue('T'.$key, $row->payment_date);
			
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}
	

	public function rp_donations(){
		
		$data['view'] = 'donations/rp_donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'RazorPay Donations List';
		$data['breadcrumb'] = 'RazorPay Donations List';
		$data['scripts'] = array('assets/javascripts/donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function rp_donations_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
		// $api->order->fetch('pay_IomnPCQv8YVQpM'));
		$donations = $api->payment->all(['count'=>100]);
		// echo '<pre>';
		// print_R($donations);
		$data = array();
		foreach ($donations['items'] as $row) {
			
			// $this->payments_model->primary_key = array('razorpay_payment_id'=>$row->id);
			// $payments = $this->payments_model->get_rp_payments($row->id);
			// $this->payments_model->primary_key = array('razorpay_payment_id'=>$row->id);
			// $payments = $this->payments_model->get_row('payments');
			// echo '<pre>';
			// print_R($payments);
			// print_R($row);exit;
	
			$data[] = array(
				!empty($row->notes['name']) ? $row->notes['name'] : 'N/A',
				$row->email,
				$row->contact,
				!empty($row->notes['pan']) ? $row->notes['pan'] : 'N/A',
				$row->amount/100,
				$row->id,
				$row->status,
				!empty($row->notes['payment_date']) ? $row->notes['payment_date'] : 'N/A'
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($donations),
			"recordsFiltered" => count($donations),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function rp_download_donations(){
		
 
		$rand = rand(100,999999);
		$filename = 'donations_'.$rand.'.xls';
		
		// $donations = $this->payments_model->view('payments');
		$api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
		// $api->order->fetch('pay_IomnPCQv8YVQpM'));
		$donations = $api->payment->all(['count'=>100]);
// 		echo '<pre>';
// print_r($donations);
// 		foreach($donations['items'] as $row){
// 			echo '<pre>';
// 			print_r($row->notes['payment_date']);
// 		}
// 	 exit;
		$spreadsheet = new Spreadsheet();
		$table_columns = array("S.No","Razorpay Id", "Order Id", "Name", "Email", "Mobile Number", "Payment Method", "Pan", "Amount", "Payment Date", "Status", "Error Code", "Error Description", "Error Reason", "Card Id");
		$sheet = $spreadsheet->getActiveSheet()
								->fromArray(
									$table_columns,   // The data to set
									NULL,        // Array values with this value will not be set
									'A1'         // Top left coordinate of the worksheet range where
												//    we want to set these values (default is A1)
								);
		$key = 2;
		foreach($donations['items'] as $row){
			$sheet->setCellValue('A'.$key, $key);
			$sheet->setCellValue('B'.$key, $row->id);
			$sheet->setCellValue('C'.$key, !empty($row->order_id) ? $row->order_id : 'N/A');
			$sheet->setCellValue('D'.$key, !empty($row->notes['name']) ? $row->notes['name'] : 'N/A');
			$sheet->setCellValue('E'.$key, !empty($row->email) ? $row->email : 'N/A');
			$sheet->setCellValue('F'.$key, !empty($row->contact) ? $row->contact : 'N/A');
			$sheet->setCellValue('G'.$key, !empty($row->method) ? $row->method : 'N/A');
			$sheet->setCellValue('H'.$key, !empty($row->notes['pan']) ? $row->notes['pan'] : 'N/A');
			$sheet->setCellValue('I'.$key, $row->amount/100);
			$sheet->setCellValue('J'.$key, !empty($row->notes['payment_date']) ? $row->notes['payment_date'] : 'N/A');
			$sheet->setCellValue('K'.$key, !empty($row->status) ? $row->status : 'N/A');
			$sheet->setCellValue('L'.$key, !empty($row->error_code) ? $row->error_code : 'N/A');
			$sheet->setCellValue('M'.$key, !empty($row->error_description) ? $row->error_description : 'N/A');
			$sheet->setCellValue('N'.$key, !empty($row->error_reason) ? $row->error_reason : 'N/A');
			$sheet->setCellValue('O'.$key, !empty($row->card_id) ? $row->card_id : 'N/A');
			// $sheet->setCellValue('P'.$key, !empty($row->notes['payment_date']) ? $row->notes['payment_date'] : 'N/A');
			
			
			$key++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save(DONATIONS_PATH.$filename);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename(DONATIONS_PATH.$filename).'"');
		header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(DONATIONS_PATH.$filename));
            flush(); // Flush system output buffer
            readfile(DONATIONS_PATH.$filename);
		die();
	}



}