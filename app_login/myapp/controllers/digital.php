<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	// require(APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php');

	use Razorpay\Api\Api;
class Digital extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('digital_model');
		$this->load->model('gallery_model');
		$this->config->load('razorpay-config');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function sem_donations(){
		
		$data['view'] = 'digital/sem_donations';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'SEM Donations';
		$data['breadcrumb'] = 'SEM Donations';
		$this->digital_model->primary_key = array('sem'=>1);
        $data['attempts'] = $this->digital_model->view_data('payments');
        $this->digital_model->primary_key = array('sem'=>1,'payment_status'=>'failed');
        $data['failed'] = $this->digital_model->view_data('payments');
        $this->digital_model->primary_key = array('sem'=>1,'payment_status'=>'success');
        $data['donations'] = $this->digital_model->view_data('payments');
        $this->digital_model->primary_key = array('sem'=>1,'payment_status'=>'success');
        $donation = $this->digital_model->min_donation('payments');
        $this->digital_model->primary_key = array('sem'=>1,'payment_status'=>'success');
        $data['frequent_donation'] = $this->digital_model->frequent_donation('payments');
        $data['min_donation'] = $donation->min_donation;
        $data['max_donation'] = $donation->max_donation;
        $data['avg_donation'] = round($donation->avg_donation);
		$data['scripts'] = array('assets/javascripts/digital.js');
		$this->load->view('templates/dashboard', $data);
	}



}