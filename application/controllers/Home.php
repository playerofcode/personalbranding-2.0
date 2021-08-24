<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
	}
	public function getName($id)
	{
	$this->model->getName($id);
	}
	public function getAddress($id)
	{
	$this->model->getAddress($id);
	}
	public function getNumber($id)
	{
	$this->model->getNumber($id);
	}
	public function getEmail($id)
	{
	$this->model->getEmail($id);
	}
	public function getShortBio($id)
	{
	$this->model->getShortBio($id);
	}
	public function getProfilePicture($id)
	{
	$this->model->getProfilePicture($id);
	}
	public function index()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$this->load->view('home/header',$data);
		$this->load->view('home/index',$data);
		$this->load->view('home/footer',$data);
	}
	public function biography()
		{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$this->load->view('home/header',$data);
		$this->load->view('home/biography',$data);
		$this->load->view('home/footer',$data);
		}
	public function contact()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$this->load->view('home/header',$data);
		$this->load->view('home/contact',$data);
		$this->load->view('home/footer',$data);
	}
	public function speeches()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$data['speeches']=$this->model->getSpeeches();
		$this->load->view('home/header',$data);
		$this->load->view('home/speeches',$data);
		$this->load->view('home/footer',$data);
	}
	public function media_coverage()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$this->load->view('home/header',$data);
		$this->load->view('home/media_coverage');
		$this->load->view('home/footer',$data);
	}
	public function videos()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$data['videos']=$this->model->getVideos();
		$this->load->view('home/header',$data);
		$this->load->view('home/videos',$data);
		$this->load->view('home/footer',$data);
	}
	public function photos()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$data['images']=$this->model->getImages();
		$this->load->view('home/header',$data);
		$this->load->view('home/photos',$data);
		$this->load->view('home/footer',$data);
	}
	public function getEnquiry()
	{
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$name=$fname.' '.$lname; 
		$email=$this->input->post('email');
		$mobno=$this->input->post('mobno');
		$subject=$this->input->post('subject');
		$message=$this->input->post('message');
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'mobno'=>$mobno,
			'subject'=>$subject,
			'message'=>$message
		);
		if($this->model->getEnquiry($data)):
  	 	$this->session->set_flashdata('msg', "Thank for enquiry with us. We will contact you soon.");
		return redirect(base_url().'home/contact');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again");
			return redirect(base_url().'home/contact');
  		endif;
	}
	public function register()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$this->load->view('home/header',$data);
		$this->load->view('home/register');
		$this->load->view('home/footer',$data);
	}
	public function authUser()
	{
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address
		);
		if($this->model->authUser($data))
		{
	  	 	$this->session->set_flashdata('msg', "Registration Successfully");
				return redirect(base_url().'home/register');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong. Try again later");
				return redirect(base_url().'home/register');
		}
	}
	public function blog()
	{
		$data['name']=$this->model->getName(1);
		$data['mobno']=$this->model->getNumber(1);
		$data['email']=$this->model->getEmail(1);
		$data['address']=$this->model->getAddress(1);
		$data['short_bio']=$this->model->getShortBio(1);
		$data['profile_picture']=$this->model->getProfilePicture(1);
		$data['blog']=$this->model->getBlog();
		$this->load->view('home/header',$dat);
		$this->load->view('home/blog',$data);
		$this->load->view('home/footer',$data);
	}
}
