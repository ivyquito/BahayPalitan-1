<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaypalPayment extends CI_Controller {

  function __construct(){
    parent::__construct();
    //$this->load->model('pipols_model');
    //$this->load->library('cart');
    $this->load->model('common');

  }
  function testpay(){


    //$num = $this->pipols_model->set_invoice_number();

    $invoice_number =  rand(10000,99999);



    $config['business']       = 'bahaypalitan.dev-facilitator@gmail.com';
    $config['cpp_header_image']   = ''; //Image header url [750 pixels wide by 90 pixels high]
    $config['return']         = base_url().'index.php/paypalpayment/notify_payment';
    $config['cancel_return']    = base_url().'index.php/paypalpayment/cancel_payment';
    $config["currency_code"]        = 'PHP';
    $config['notify_url']       = 'process_payment.php'; //IPN Post
    $config['production']       = false; //Its false by default and will use sandbox

    $config["invoice"]        = $invoice_number; //The invoice id

    $this->load->library('paypal',$config);

    $_SESSION['new_info']['status'] = 1;
    $_SESSION['new_info']['planID'] = $_POST['subscription'];
    $_SESSION['new_info']['started'] = date("Y-m-d H:i:s");

    $subData = $this->common->getrow('plans', array('planID' => $_POST['subscription']));


    $startDate = time();
    $endDate = date("Y-m-d H:i:s",strtotime($subData->planDesc,$startDate));
    $_SESSION['new_info']['planEnd'] = $endDate;
    $this->paypal->add($subData->planName."-".$subData->planDesc,$subData->planAmount,1); //First item

    $this->paypal->pay(); //Proccess the payment


  }

  function notify_payment(){

    $data = $this->input->post();

    if(!empty($data)){ // check if paypal has returned a data

      $this->common->insert('subscribers',$_SESSION['new_info']);
      unset($_SESSION['new_info']);
      echo 'A payment has been successful .. you may login with your account <a href="'.base_url().'">here.</>..';

    }


  }
  function cancel_payment(){


    //$data = print_r($this->input->post(),TRUE);

    redirect('pipolscontroller/home');
  }
}