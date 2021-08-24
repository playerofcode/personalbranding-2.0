<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0)
			{
				$this->session->set_userdata('email', $email);
		  	 	return redirect(base_url().'admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
  				return redirect(base_url().'admin/index');
			}
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'admin/index');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'admin/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function category()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}
	public function add_category()
	{
		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|is_unique[product_category.cat_name]');
		if($this->form_validation->run() && $this->upload->do_upload('cat_image'))
		{
			if($this->upload->do_upload('cat_image')):
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
			endif;
			if($this->upload->do_upload('banner')):
			$image=$this->upload->data();
			$banner="upload/product_image/".$image['raw_name'].$image['file_ext'];
			else:
			$banner='';
			endif;
			$cat_name=$this->input->post('cat_name');
			$cat_status=$this->input->post('cat_status');
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image,
				'banner'=>$banner
			);
			if($this->model->add_category($data))
			{
		  	 	$this->session->set_flashdata('msg', "Category Added successfully");
  				return redirect(base_url().'admin/category');
			}
			else
			{
				$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
  				return redirect(base_url().'admin/category');
			}
			
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category',$data);
		$this->load->view('admin/footer');
		}

	}

	public function all_category()
	{
		$this->check_login();
		$data['category']=$this->model->get_category();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/allcategory',$data);
		$this->load->view('admin/footer');
	}
	public function delete_category($cat_id)
	{
		$data=$this->model->get_category($cat_id);
		$cat_image=$data[0]->cat_image;
		$banner=$data[0]->banner;
		if(!empty($cat_image))
		{
			unlink($cat_image);
		}
		if(!empty($banner))
		{
			unlink($banner);
		}
		if($this->model->delete_category($cat_id))
			{
		  	 	$this->session->set_flashdata('msg', "Category deleted successfully");
  				return redirect(base_url().'admin/all_category');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_category');
			}
	}
	public function edit_category($cat_id)
	{
		$this->check_login();
		$data['category']=$this->model->get_category($cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editcategory',$data);
		$this->load->view('admin/footer');
	}
	public function update_category()
	{
		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$cat_name=$this->input->post('cat_name');
		$cat_status=$this->input->post('cat_status');
		$cat_id=$this->input->post('cat_id');
		$data=$this->model->get_category($cat_id);
		$old_cat_image=$data[0]->cat_image;
		$old_banner_image=$data[0]->banner;
		if($this->upload->do_upload('cat_image'))
		{
			if(!empty($old_cat_image))
			{
				unlink($old_cat_image);
			}
			$image=$this->upload->data();
			$cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$cat_image=$old_cat_image;
		}
		if($this->upload->do_upload('banner'))
		{
			if(!empty($old_banner_image))
			{
				unlink($old_banner_image);
			}
			$image=$this->upload->data();
			$banner="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$banner=$old_banner_image;
		}
			
			$data=array(
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status,
				'cat_image'=>$cat_image,
				'banner'=>$banner
			);
			if($this->model->update_category($data,$cat_id))
			{
		  	 	$this->session->set_flashdata('msg', "Category updated successfully");
  				return redirect(base_url().'admin/all_category');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_category');
			}
	}
	public function sub_category()
 	{
 		$this->check_login();
 		$data['category']=$this->model->get_category();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/sub_category',$data);
 		$this->load->view('admin/footer');
 	}
 	public function product_category()
 	{
 		$this->check_login();
 		$data['category']=$this->model->get_category();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/product_category',$data);
 		$this->load->view('admin/footer');
 	}
 	public function add_product_category()
 	{
 		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('p_cat_image'))
		{
			$image=$this->upload->data();
			$p_cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_cat_image='';
		}
 		$cat_id=$this->input->post('cat_id');
 		$sub_cat_id=$this->input->post('sub_cat_id');
 		$p_cat_name=$this->input->post('p_cat_name');
 		$data=array(
 			'cat_id'=>$cat_id,
 			'sub_cat_id'=>$sub_cat_id,
 			'p_cat_name'=>$p_cat_name,
 			'p_cat_image'=>$p_cat_image
 		);
 		if($this->model->insertProductCategory($data))
 		{
 			$this->session->set_flashdata('msg','Product Category added successfully.');
 			return redirect(base_url().'admin/product_category');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/product_category');
 		}
 	}
 	public function add_sub_category()
 	{
 		$config=[
	 	'upload_path'=>'./upload/product_image/',
	 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
	 ];
	 $this->load->library('upload',$config);
		if($this->upload->do_upload('photo')):
		$image=$this->upload->data();
		$photo="upload/product_image/".$image['raw_name'].$image['file_ext'];
		else:
		$photo='';
		endif;
 		$cat_id=$this->input->post('cat_id');
 		$sub_cat_name=$this->input->post('sub_cat_name');
 		$data=array(
 			'cat_id'=>$cat_id,
 			'sub_cat_name'=>$sub_cat_name,
 			'photo'=>$photo
 		);
 		if($this->model->insert_sub_category($data))
 		{
 			$this->session->set_flashdata('msg','Sub Category added successfully.');
 			return redirect(base_url().'admin/sub_category');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/sub_category');
 		}
 	}
 	public function all_sub_category()
 	{
 		$this->check_login();
 		$data['sub_category']=$this->model->get_sub_category();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/all_sub_category',$data);
 		$this->load->view('admin/footer');
 	}
 	public function all_product_category()
 	{
 		$this->check_login();
 		$data['product_category']=$this->model->getProductWiseCategory();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/all_product_category',$data);
 		$this->load->view('admin/footer');
 		
 	}
 	public function delete_sub_category($sub_cat_id)
 	{
 		if($this->model->delete_sub_category($sub_cat_id))
 		{
 			$this->session->set_flashdata('msg',"Sub category deleted successfully");
 			return redirect(base_url().'admin/all_sub_category');	
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_sub_category');
 		}
 	}
 	public function delete_product_category($p_cat_id)
 	{
 	    $old=$this->model->getProductWiseCategory($p_cat_id);
 		$old_image=$old[0]->p_cat_image;
 		if(!empty($old_image))
 		{
 			unlink($old_image);
 		}
 		if($this->model->delete_product_category($p_cat_id))
 		{
 			$this->session->set_flashdata('msg',"Product Category deleted successfully");
 			return redirect(base_url().'admin/all_product_category');	
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_product_category');
 		}
 	}
 	public function edit_sub_category($sub_cat_id)
 	{
 		$data['category']=$this->model->get_category();
 		$data['sub_category']=$this->model->get_sub_category($sub_cat_id);
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/edit_sub_category',$data);
 		$this->load->view('admin/footer');
 	}
 	public function edit_product_category($p_cat_id)
 	{
 		$data['category']=$this->model->get_category();	
 		$cat_id=$this->model->getExactCatID($p_cat_id);
 		$data['sub_category']=$this->model->getSubCategoryByCatID($cat_id);
 		$data['product_category']=$this->model->getProductWiseCategory($p_cat_id);
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/edit_product_category',$data);
 		$this->load->view('admin/footer');
 	}
 	public function update_sub_category($sub_cat_id) 
 	{
 		$data=$this->model->get_sub_category($sub_cat_id);
 		$old_photo=$data[0]->photo;
 		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('photo'))
		{
			if(file_exists($old_photo))
			{
				unlink($old_photo);
			}
			$image=$this->upload->data();
			$photo="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$photo=$old_photo;
		}
 		$cat_id=$this->input->post('cat_id');
 		$sub_cat_name=$this->input->post('sub_cat_name');
 		$data=array(
 			'cat_id'=>$cat_id,
 			'sub_cat_name'=>$sub_cat_name,
 			'photo'=>$photo
 		);
 		if($this->model->update_sub_category($sub_cat_id,$data))
 		{
 		$this->session->set_flashdata('msg',"Sub Category updated successfully");
 		return redirect(base_url().'admin/all_sub_category');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_sub_category');
 		}
 	}
 	public function update_product_category($p_cat_id)
 	{
 	$old=$this->model->getProductWiseCategory($p_cat_id);
 		$old_image=$old[0]->p_cat_image;
 		$cat_id=$this->input->post('cat_id');
 		$sub_cat_id=$this->input->post('sub_cat_id');
 		$p_cat_name=$this->input->post('p_cat_name');
 		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('p_cat_image'))
		{
			if(!empty($old_image))
			{
				unlink($old_image);
			}
			$image=$this->upload->data();
			$p_cat_image="upload/product_image/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$p_cat_image=$old_image;
		}
 		$data=array(
 			'cat_id'=>$cat_id,
 			'sub_cat_id'=>$sub_cat_id,
 			'p_cat_name'=>$p_cat_name,
 			'p_cat_image'=>$p_cat_image
 		);
 		if($this->model->update_product_category($p_cat_id,$data))
 		{
 		$this->session->set_flashdata('msg',"Product Category updated successfully");
 		return redirect(base_url().'admin/all_product_category');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_product_category');
 		}
 	}
 	public function fetch_sub_cat()
 	{
 		$cat_id=$this->input->post('cat_id');
 		echo $this->model->fetch_sub_cat($cat_id);
 	}
 	public function fetch_product_cat()
 	{
 		$sub_cat_id=$this->input->post('sub_cat_id');
 		echo $this->model->fetch_product_cat($sub_cat_id);
 	}
	public function product()
	{
		$this->check_login();
		$data['category']=$this->model->get_category();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/product',$data);
		$this->load->view('admin/footer');
	}
	public function add_product()
	{
		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->form_validation->run('products') && $this->upload->do_upload('p_img1'))
		{
			$cat_id=$this->input->post('cat_id');
			$sub_cat_id=$this->input->post('sub_cat_id');
			$p_name=$this->input->post('p_name');
			$p_qty=$this->input->post('p_qty');
			$m_price=$this->input->post('m_price');
			$d_price=$this->input->post('d_price');
			$h_price=$this->input->post('h_price');
			$p_unit=$this->input->post('p_unit');
			$availability=$this->input->post('availability');
			$status=$this->input->post('status');
			$p_description=$this->input->post('p_description');
			$p_cat_id=$this->input->post('p_cat_id');
			$d=$m_price-$d_price;
			$offer=($d/$m_price)*100;
			$image=$this->upload->data();
			$p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 if($this->upload->do_upload('p_img2'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img2='';	
			 }
			 if($this->upload->do_upload('p_img3'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img3='';	
			 }
			 if($this->upload->do_upload('p_img4'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img4='';	
			 }
			 if($this->upload->do_upload('p_img5'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img5="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img5='';	
			 }
			 if($this->upload->do_upload('p_img6'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img6="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img6='';	
			 }
			 if($this->upload->do_upload('p_img7'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img7="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img7='';	
			 }
			 if($this->upload->do_upload('p_img8'))
			 {
			 	 $image=$this->upload->data();
			 	 $p_img8="upload/product_image/".$image['raw_name'].$image['file_ext'];
			 }
			 else
			 {
			 	$p_img8='';	
			 }

			$data=array(
				'cat_id'=>$cat_id,
				'sub_cat_id'=>$sub_cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'h_price'=>$h_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4,
				'p_img5'=>$p_img5,
				'p_img6'=>$p_img6,
				'p_img7'=>$p_img7,
				'p_img8'=>$p_img8,
				'p_cat_id'=>$p_cat_id
			);
			if($this->model->add_product($data))
			{
		  	 	$this->session->set_flashdata('msg', "Product added successfully");
  				return redirect(base_url().'admin/product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/product');
			}
		}
		else
		{
			$this->check_login();
			$data['category']=$this->model->get_category();
			$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/product',$data);
			$this->load->view('admin/footer');
		}
	}
	public function all_product()
	{
		$this->check_login();
		$data['product']=$this->model->get_product();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/allproduct',$data);
		$this->load->view('admin/footer');
	}
	public function delete_product($p_id)
	{
		$data=$this->model->get_product($p_id);
		$p_img1=$data[0]->p_img1;
		$p_img2=$data[0]->p_img2;
		$p_img3=$data[0]->p_img3;
		$p_img4=$data[0]->p_img4;
		$p_img5=$data[0]->p_img5;
		$p_img6=$data[0]->p_img6;
		$p_img7=$data[0]->p_img7;
		$p_img8=$data[0]->p_img8;
		if($p_img1){unlink($p_img1);}
		if($p_img2){unlink($p_img2);}
		if($p_img3){unlink($p_img3);}
		if($p_img4){unlink($p_img4);}
		if($p_img5){unlink($p_img5);}
		if($p_img6){unlink($p_img6);}
		if($p_img7){unlink($p_img7);}
		if($p_img8){unlink($p_img8);}
		if($this->model->delete_product($p_id))
			{
		  	 	$this->session->set_flashdata('msg', "Product deleted successfully");
  				return redirect(base_url().'admin/all_product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_product');
			}
	}
	public function edit_product($p_id)
	{
		$this->check_login();
		$data['product_info']=$this->model->get_product($p_id);
		$data['category']=$this->model->get_category();
		$cat_id=$this->model->getExactCatIdByProductID($p_id);
		$data['sub_category']=$this->model->getSubCategoryByCatID($cat_id);
		$sub_cat_id=$this->model->getExactSubCatIdByProductID($p_id);
		$data['product_category']=$this->model->getProductCategoryBySubCatId($sub_cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editproduct',$data);
		$this->load->view('admin/footer');
	}
	public function update_product()
	{
		$config=[
		 	'upload_path'=>'./upload/product_image/',
		 	'allowed_types'=>'gif|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		$p_id=$this->input->post('p_id');
		$data=$this->model->get_product($p_id);
		$old_p_img1=$data[0]->p_img1;
		$old_p_img2=$data[0]->p_img2;
		$old_p_img3=$data[0]->p_img3;
		$old_p_img4=$data[0]->p_img4;
		$old_p_img5=$data[0]->p_img5;
		$old_p_img6=$data[0]->p_img6;
		$old_p_img7=$data[0]->p_img7;
		$old_p_img8=$data[0]->p_img8;
		$cat_id=$this->input->post('cat_id');
		$sub_cat_id=$this->input->post('sub_cat_id');
		$p_name=$this->input->post('p_name');
		$p_qty=$this->input->post('p_qty');
		$m_price=$this->input->post('m_price');
		$d_price=$this->input->post('d_price');
		$h_price=$this->input->post('h_price');
		$p_unit=$this->input->post('p_unit');
		$availability=$this->input->post('availability');
		$status=$this->input->post('status');
		$p_description=$this->input->post('p_description');
		$p_cat_id=$this->input->post('p_cat_id');
		$d=$m_price-$d_price;
		$offer=($d/$m_price)*100;
		if($this->upload->do_upload('p_img1'))
		 {
		 	if(!empty($old_p_img1))
		 	{unlink($old_p_img1);}
		 	$image=$this->upload->data();
		 	 $p_img1="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img1=$old_p_img1;	
		 }
		 if($this->upload->do_upload('p_img2'))
		 {
		 	if(!empty($old_p_img2))
		 	{unlink($old_p_img2);}
		 	 $image=$this->upload->data();
		 	 $p_img2="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img2=$old_p_img2;	
		 }
		 if($this->upload->do_upload('p_img3'))
		 {
		 	if(!empty($old_p_img3))
		 	{unlink($old_p_img3);}
		 	 $image=$this->upload->data();
		 	 $p_img3="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img3=$old_p_img3;	
		 }
		 if($this->upload->do_upload('p_img4'))
		 {
		 	if(!empty($old_p_img4))
		 	{unlink($old_p_img4);}
		 	 $image=$this->upload->data();
		 	 $p_img4="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img4=$old_p_img4;	
		 }
		 if($this->upload->do_upload('p_img5'))
		 {
		 	if(!empty($old_p_img5))
		 	{unlink($old_p_img5);}
		 	 $image=$this->upload->data();
		 	 $p_img5="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img5=$old_p_img5;	
		 }
		 if($this->upload->do_upload('p_img6'))
		 {
		 	if(!empty($old_p_img6))
		 	{unlink($old_p_img6);}
		 	 $image=$this->upload->data();
		 	 $p_img6="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img6=$old_p_img6;	
		 }
		 if($this->upload->do_upload('p_img7'))
		 {
		 	if(!empty($old_p_img7))
		 	{unlink($old_p_img7);}
		 	 $image=$this->upload->data();
		 	 $p_img7="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img7=$old_p_img7;	
		 }
		 if($this->upload->do_upload('p_img8'))
		 {
		 	if(!empty($old_p_img8))
		 	{unlink($old_p_img8);}
		 	 $image=$this->upload->data();
		 	 $p_img8="upload/product_image/".$image['raw_name'].$image['file_ext'];
		 }
		 else
		 {
		 	$p_img8=$old_p_img8;	
		 }
		 $data=array(
				'cat_id'=>$cat_id,
				'sub_cat_id'=>$sub_cat_id,
				'p_name'=>$p_name,
				'p_qty'=>$p_qty,
				'p_unit'=>$p_unit,
				'm_price'=>$m_price,
				'd_price'=>$d_price,
				'h_price'=>$h_price,
				'offer'=>number_format($offer),
				'availability'=>$availability,
				'status'=>$status,
				'p_description'=>$p_description,
				'p_img1'=>$p_img1,
				'p_img2'=>$p_img2,
				'p_img3'=>$p_img3,
				'p_img4'=>$p_img4,
				'p_img5'=>$p_img5,
				'p_img6'=>$p_img6,
				'p_img7'=>$p_img7,
				'p_img8'=>$p_img8,
				'p_cat_id'=>$p_cat_id
			);
			if($this->model->update_product($data,$p_id))
			{
		  	 	$this->session->set_flashdata('msg', "Product updated successfully");
  				return redirect(base_url().'admin/all_product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_product');
			}

		}
		public function customer_list()
		{
			$this->check_login();
			$data['customer_list']=$this->model->customer_list();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/customer_list',$data);
			$this->load->view('admin/footer');
		}
		public function all_customer_list()
		{
			$this->check_login();
			$data['customer_list']=$this->model->all_customer_list();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/all_customer_list',$data);
			$this->load->view('admin/footer');
		}
		public function new_order()
		{
			$this->check_login();
			$data['order']=$this->model->new_order();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/order',$data);
			$this->load->view('admin/footer');	
		}
		public function complete_order()
		{
			$this->check_login();
			$data['order']=$this->model->complete_order();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/complete_order',$data);
			$this->load->view('admin/footer');
		}
		public function confirm_order()
		{
			$this->check_login();
			$data['order']=$this->model->confirm_order();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/confirm_order',$data);
			$this->load->view('admin/footer');
		}
		public function order_item_info($order_id)
	{
		$this->load->library('pdf');
		if($order_id)
		{
			$html_content='<h1 align="center" style="color:orange;">Panini Ayurveda</h1>';
			$html_content.=$this->model->orderItem($order_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("Order",array("Attachment"=>0));
		}
		else
		{
		$this->session->set_flashdata('msg', "Unable to find Order");
			return redirect(base_url().'delivery/order');	
		}
		
	}
		public function availability()
		{
			$this->check_login();
			$data['availability']=$this->model->fetchAvailability();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/availability',$data);
			$this->load->view('admin/footer');
		}
		public function distributor_list()
		{
			$this->check_login();
			$data['distributor_list']=$this->model->distributor_list();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/distributor_list',$data);
			$this->load->view('admin/footer');
		}
		public function change_distributor_status()
		{
			$id=$this->input->post('id');
			$status=$this->input->post('status');
			if($status=='active')
			{
				$this->session->set_flashdata('msg', "Already Activated");
  				return redirect(base_url().'admin/distributor_list');
			}
			else
			{
				if($this->model->changeDistributorStatus($id))
				{
					$this->session->set_flashdata('msg', "Distributor Activated Successfully");
  					return redirect(base_url().'admin/distributor_list');
				}
				else
				{
					$this->session->set_flashdata('msg', "Something went wrong.");
  					return redirect(base_url().'admin/distributor_list');
				}
			}

		}
		public function delivery_list()
		{
			$this->check_login();
			$data['delivery_list']=$this->model->delivery_list();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/delivery_list',$data);
			$this->load->view('admin/footer');
		}
		public function enquiry()
		{
			$this->check_login();
			$data['enquiry']=$this->model->enquiry();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/enquiry',$data);
			$this->load->view('admin/footer');
		}
		public function delete_enquiry($id)
		{
			if($this->model->deleteEnquiry($id))
			{
				$this->session->set_flashdata('msg', "Enquiry Deleted Successfully");
  				return redirect(base_url().'admin/enquiry');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.");
  				return redirect(base_url().'admin/enquiry');
			}

		}
		//14 June, 2021
		public function blog()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog');
		$this->load->view('admin/footer');
	}
	public function checkblog()
	{
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image'))
		 {
		 	$title=$this->input->post('title');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'title'=>$title,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->bloginsert($data))
			{
				 $this->session->set_flashdata('msg', "Blog Posted Successfully."); 
   				 redirect(base_url().'admin/blog');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/blog');
			}
		 }
		 else
		 {
		 	$upload_error=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/blog',compact('upload_error'));
			$this->load->view('admin/footer');
		 }
	}
	public function bloglist()
	{
		$this->check_login();
		$data['blog']=$this->model->bloglist();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/bloglist',$data);
		$this->load->view('admin/footer');	
	}
	public function deleteblog()
	{
		$id=$this->uri->segment(3);
		if($this->model->deleteblog($id))
		{
		$this->session->set_flashdata('msg', " Blog Deleted Successfully."); 
   		redirect(base_url().'admin/bloglist');
		}
		else
		{
		$this->session->set_flashdata('msg', " Something went wrong!"); 
   		redirect(base_url().'admin/bloglist');
		}

	}
	public function editblog($id)
	{
		$this->check_login();
		$data['bloginfo']=$this->model->get_blog_info($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editblog',$data);
		$this->load->view('admin/footer');
	}
	public function updateblog()
	{
		if(!$_FILES['image']['name'])
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			 $data=array(
					 'title'=>$title,
					 'description'=>$description
					 );
                 $res=$this->model->UpdateBlog($data,$id);
                 if($res)
                 {
                 	$this->session->set_flashdata('msg', " Blog Updated Successfully"); 
   					redirect(base_url().'admin/bloglist');
                 }
                 else
                 {
                 	$this->session->set_flashdata('msg', " Something went wrong!"); 
   					redirect(base_url().'admin/bloglist');
                 }
		}
		else
		{
			// echo "Image choosen";
			$id=$this->input->post('id');	
			$res=$this->model->get_blog_info($id);
			$image_path=$res[0]->image;
			unlink($image_path);
			$config=[
		 	'upload_path'=>'./upload',
		 	'allowed_types'=>'gif|jpg|png'
		 ];
		 $this->load->library('upload',$config);
			 if($this->upload->do_upload('image'))
			 {
			 	$title=$this->input->post('title');
				$description=$this->input->post('description');
				$image=$this->upload->data();
				$image_path="upload/".$image['raw_name'].$image['file_ext'];
				$data=array(
						 'title'=>$title,
						 'description'=>$description,
						 'image'=>$image_path
						 );
				if($this->model->UpdateBlog($data,$id))
				{
					 $this->session->set_flashdata('msg', "Blog updated Successfully.");
	   				 redirect(base_url().'admin/bloglist');
				}
				else
				{
					$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
	   				redirect(base_url().'admin/bloglist');
				}
			}
	}
	}
	public function reply($id)
	{
		$data['enquiry']=$this->model->enquiry($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/reply',$data);
		$this->load->view('admin/footer');
	}
	public function add_reply($id)
	{
		$email=$this->input->post('email');
		$reply=$this->input->post('reply');
				$data=array(
			'reply'=>$reply
		);
		if($this->model->addReply($data,$id))
		{
			 include APPPATH . 'third_party/phpmailer/PHPMailerAutoload.php';//new
						$mail=new PHPMailer;
					$mail->Host='smtp.gmail.com';
					$mail->Port=587;
					//$mail->isSMTP();
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='tls';
					$mail->Username='paniniayurveda@gmail.com/';//sender
					$mail->Password='Paniniayurveda@2233';//password here
					$mail->setFrom('paniniayurveda@gmail.com','Panini Ayurveda');
					$mail->addAddress($email);//receiver
					$mail->addReplyTo('noreply@paniniayurveda.com','noReply');
					$mail->isHTML(true);
					$mail->Subject='Reply from Panini Ayurveda';
					$mail->Body=$reply;
					if(!$mail->send())
					{
    				$this->session->set_flashdata('msg', $mail->ErrorInfo); 
			 		redirect(base_url().'admin/enquiry');
					}
					else
					{
					$this->session->set_flashdata('msg', "Reply sent successfully."); 
			 		redirect(base_url().'admin/enquiry');
					}
			
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
			redirect(base_url().'admin/enquiry');
		}
	}
	//03 July, 2021
	public function removeBannerImage($cat_id)
	{
	$data=$this->model->get_category($cat_id);
	$banner=$data[0]->banner;
	if(!empty($banner))
	{
		@unlink($banner);
	}
	if($this->model->removeBannerImage($cat_id))
	{
		 $this->session->set_flashdata('msg', "Banner deleted Successfully.");
			 redirect(base_url().'admin/all_category');
	}
	else
	{
		$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
			redirect(base_url().'admin/all_category');
	}
	}
	public function change_product_status($p_id)
	{
		$current_status=$this->model->checkCurrentStatus($p_id);
		if($current_status == 1)
		{
			if($this->model->change_product_status($p_id,0))
			{
				$this->session->set_flashdata('msg', "Product status updated successfully");
				return redirect(base_url().'admin/all_product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong. Try again");
				return redirect(base_url().'admin/all_product');
			}
		}
		else
		{
			if($this->model->change_product_status($p_id,1))
			{
				$this->session->set_flashdata('msg', "Product status updated successfully");
				return redirect(base_url().'admin/all_product');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong. Try again");
				return redirect(base_url().'admin/all_product');
			}
		}
	}
	//08 July, 2021
	public function raise_ticket()
	{
		$data['ticket']=$this->model->getRaiseTicket();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/raise_ticket',$data);
		$this->load->view('admin/footer');
	}
	public function deleteTicket($id)
	{
		if($this->model->deleteTicket($id)):
			$this->session->set_flashdata('msg', "Raised Ticket deleted successfully");
			return redirect(base_url().'admin/raise_ticket');
		else:
			$this->session->set_flashdata('msg', "Something went wrong. Try again");
			return redirect(base_url().'admin/raise_ticket');
		endif;
	}
	public function ticketReply($id)
	{
		$data['ticket']=$this->model->getRaiseTicket($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/ticket_reply',$data);
		$this->load->view('admin/footer');
	}
	public function addTicketReply($id)
	{
		$distributor=$this->input->post('distributor');
		$reply=$this->input->post('reply');
			$data=array(
			'reply'=>$reply
		);
		if($this->model->addTicketReply($data,$id))
		{
			 include APPPATH . 'third_party/phpmailer/PHPMailerAutoload.php';//new
						$mail=new PHPMailer;
					$mail->Host='smtp.gmail.com';
					$mail->Port=587;
					//$mail->isSMTP();
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='tls';
					$mail->Username='paniniayurveda@gmail.com/';//sender
					$mail->Password='Paniniayurveda@2233';//password here
					$mail->setFrom('paniniayurveda@gmail.com','Panini Ayurveda');
					$mail->addAddress($distributor);//receiver
					$mail->addReplyTo('noreply@paniniayurveda.com','noReply');
					$mail->isHTML(true);
					$mail->Subject='Ticket Reply from Panini Ayurveda';
					$mail->Body=$reply;
					if(!$mail->send())
					{
    				$this->session->set_flashdata('msg', $mail->ErrorInfo); 
			 		redirect(base_url().'admin/raise_ticket');
					}
					else
					{
					$this->session->set_flashdata('msg', "Ticket Reply sent successfully."); 
			 		redirect(base_url().'admin/raise_ticket');
					}
			
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
			redirect(base_url().'admin/raise_ticket');
		}
	}
	//14 July,2021
	public function all_pending_products()
	{
		$this->check_login();
		$data['product']=$this->model->get_pending_product();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_pending_products',$data);
		$this->load->view('admin/footer');
	}
	public function getProductCategoryBySideBar()
	{
		echo $this->model->getProductCategoryBySideBar();
	}
	public function category_wise_product($cat_id)
	{
		$this->check_login();
		$data['product']=$this->model->getCategoryWiseProduct($cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category_wise_product',$data);
		$this->load->view('admin/footer');
	}
	public function profile_update_request()
	{
		$data['distributor']=$this->model->getProfileUpdateRequest();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/profile_update_request',$data);
		$this->load->view('admin/footer');	
	}
	public function approveProfileChangeRequest($id)
	{
		$record=$this->model->getPreviousProfileUpdateRequest($id);
		$distributor=$record[0]->email;
		$data=array(
			'store_name'=>$record[0]->store_name,
			'gstin'=>$record[0]->gstin,
			'name'=>$record[0]->name,
			'mobno'=>$record[0]->mobno,
			'email'=>$record[0]->email,
			'pincode'=>$record[0]->pincode,
			'address'=>$record[0]->address,
			'state'=>$record[0]->state,
			'city'=>$record[0]->city
		);
		if($this->model->approveProfileChangeRequest($data,$distributor)):
			if($this->model->removeProfileUpdateRequest($id))
			{
			$this->session->set_flashdata('msg', "Profile update request approved successfully."); 
		    redirect(base_url().'admin/profile_update_request');
			}
			else
			{
			$this->session->set_flashdata('msg', "Unable to remove profile update request!"); 
		    redirect(base_url().'admin/profile_update_request');
			}
		else:
		$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
		redirect(base_url().'admin/profile_update_request');
		endif;
	}
	//10 Aug, 2021
	public function wholesalers()
	{
		$data['wholesalers']=$this->model->getWholesalers();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/wholesaler',$data);
		$this->load->view('admin/footer');
	}
	public function changeWholesalerAccountStatus($wholesaler_id)
	{
		$current_status=$this->model->getWholesalerAccountCurrentStatus($wholesaler_id);
		if($current_status=='active'):
		$set_status='deactive';
		else:
		$set_status='active';
		endif;
		 $data=array(
		 	'status'=>$set_status
		 );
		 if($this->model->changeWholesalerAccountStatus($data,$wholesaler_id)):
		 $this->session->set_flashdata('msg', "Wholesaler status updated successfully."); 
	  	 redirect(base_url().'admin/wholesalers');	
	 	else:
		 $this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/wholesalers');
		endif;
	}
	public function filter_sub_category()
	{
		$this->check_login();
 		$data['category']=$this->model->get_category();
 		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/filter_sub_category',$data);
		$this->load->view('admin/footer');
	}
	public function getFilterSubCategory()
	{
		$cat_id=$this->input->post('cat_id');
		echo $this->model->getFilterSubCategory($cat_id);
	}
	//19 Aug, 2021
	public function speeches()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/speeches');
		$this->load->view('admin/footer');
	}
	public function addSpeeches()
	{
		$this->form_validation->set_rules('title', 'Speech Title', 'trim|required');
		$this->form_validation->set_rules('link', 'Youtube Link', 'trim|required');
		if ($this->form_validation->run()):
			$title=$this->input->post('title');
			$link=$this->input->post('link');
			$data=array(
				'title'=>$title,
				'link'=>$link
			);
		if($this->model->addSpeeches($data)):
		 $this->session->set_flashdata('msg', "Speech added successfully."); 
	  	 redirect(base_url().'admin/speeches');	
	 	else:
		 $this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/speeches');
		endif;
		else:
			$this->speeches();
		endif;
	}
	public function all_speeches()
	{
		$data['speeches']=$this->model->getSpeeches();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_speeches',$data);
		$this->load->view('admin/footer');
	}
	public function edit_speech($id)
	{
		$data['speeches']=$this->model->getSpeeches($id);
				$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_speech',$data);
		$this->load->view('admin/footer');
	}
	public function updateSpeech($id)
	{
		$title=$this->input->post('title');
		$link=$this->input->post('link');
		$data=array(
			'title'=>$title,
			'link'=>$link
		);
		if($this->model->updateSpeech($data,$id)):	
		$this->session->set_flashdata('msg', "Speech updated successfully."); 
	    redirect(base_url().'admin/all_speeches');
		else:	
		$this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/all_speeches');
		endif;
	}
	public function delete_speech($id)
	{
		if($this->model->deleteSpeech($id)):	
		$this->session->set_flashdata('msg', "Speech deleted successfully."); 
	    redirect(base_url().'admin/all_speeches');
		else:	
		$this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/all_speeches');
		endif;
	}
	public function videos()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/videos');
		$this->load->view('admin/footer');
	}
	public function addVideo()
	{
		$this->form_validation->set_rules('title', 'Speech Title', 'trim|required');
		$this->form_validation->set_rules('link', 'Youtube Link', 'trim|required');
		if ($this->form_validation->run()):
			$title=$this->input->post('title');
			$link=$this->input->post('link');
			$data=array(
				'title'=>$title,
				'link'=>$link
			);
		if($this->model->addVideo($data)):
		 $this->session->set_flashdata('msg', "Video added successfully."); 
	  	 redirect(base_url().'admin/videos');	
	 	else:
		 $this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/videos');
		endif;
		else:
			$this->videos();
		endif;	
	}
	public function all_videos()
	{
		$data['videos']=$this->model->getVideos();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_videos',$data);
		$this->load->view('admin/footer');
	}
	public function delete_video($id)
	{
		if($this->model->deleteVideo($id)):	
		$this->session->set_flashdata('msg', "Video deleted successfully."); 
	    redirect(base_url().'admin/all_videos');
		else:	
		$this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/all_videos');
		endif;
	}
	public function edit_video($id)
	{
	$data['videos']=$this->model->getVideos($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_video',$data);
	$this->load->view('admin/footer');
	}
	public function updateVideo($id)
	{
		$title=$this->input->post('title');
		$link=$this->input->post('link');
		$data=array(
			'title'=>$title,
			'link'=>$link
		);
		if($this->model->updateVideo($data,$id)):	
		$this->session->set_flashdata('msg', "Video updated successfully."); 
	    redirect(base_url().'admin/all_videos');
		else:	
		$this->session->set_flashdata('msg', "Something went wrong"); 
	    redirect(base_url().'admin/all_videos');
		endif;
	}
	public function images()
	{
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/images');
	$this->load->view('admin/footer');
	}
	public function addImage()
	{
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('photo'))
		{
			$image=$this->upload->data();
			$photo="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'photo'=>$photo
			);
			if($this->model->addImage($data))
			{
		  	 	$this->session->set_flashdata('msg', "Image uploaded successfully");
  				return redirect(base_url().'admin/images');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong. Try again");
  				return redirect(base_url().'admin/images');
			}
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/images',$data);
		$this->load->view('admin/footer');
		}
	}
	public function all_images()
	{
		$data['images']=$this->model->getImages();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_images',$data);
		$this->load->view('admin/footer');
	}
	public function delete_image($id)
	{
		$data=$this->model->getImages($id);
		$image=$data[0]->photo;
		if(file_exists($image)):unlink($image);endif;
		if($this->model->deleteImage($id))
		{
	  	$this->session->set_flashdata('msg', "Image deleted successfully");
        return redirect(base_url().'admin/all_images');
		}
		else
		{
		$this->session->set_flashdata('msg', "Something went wrong. Try again");
		return redirect(base_url().'admin/all_images');
		}
	}
	public function edit_image($id)
	{
	$data['images']=$this->model->getImages($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_image',$data);
	$this->load->view('admin/footer');
	}
	public function updateImage($id)
	{
	$data=$this->model->getImages($id);
	$old_photo=$data[0]->photo;
	$config=[
 	'upload_path'=>'./upload/',
 	'allowed_types'=>'gif|jpg|png|jpeg'
	 ];
	 $this->load->library('upload',$config);
	if($this->upload->do_upload('photo')):
	if(file_exists($old_photo)):unlink($old_photo);endif;
	$image=$this->upload->data();
	$photo="upload/".$image['raw_name'].$image['file_ext'];
	else:
	$photo=$old_photo;
	endif;
	$data=array(
		'photo'=>$photo
	);
	if($this->model->updateImage($data,$id))
	{
  	$this->session->set_flashdata('msg', "Image updated successfully");
    return redirect(base_url().'admin/all_images');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/all_images');
	}
	}
	//20 Aug, 2021
	public function media_category()
	{
	$data['media_category']=$this->model->getMediaCategory();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/media_category',$data);
	$this->load->view('admin/footer');
	}
	public function users()
	{
	$data['users']=$this->model->getUsers();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/users',$data);
	$this->load->view('admin/footer');
	}
	public function cell()
	{
	$data['cell']=$this->model->getCell();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/cell',$data);
	$this->load->view('admin/footer');
	}
	public  function deleteCell($id)
	{
	if($this->model->deleteCell($id))
	{
  	$this->session->set_flashdata('msg', "Cell deleted successfully");
    return redirect(base_url().'admin/cell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/cell');
	}
	}
	public function editCell($id)
	{
	$data['cell']=$this->model->getCell($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_cell',$data);
	$this->load->view('admin/footer');
	}
	public function addCell()
	{
		$cell_name=$this->input->post('cell_name');
		$data=array(
			'cell_name'=>$cell_name
		);
	if($this->model->addCell($data))
	{
  	$this->session->set_flashdata('msg', "Cell added successfully");
    return redirect(base_url().'admin/cell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/cell');
	}
	}
	public function updateCell($id)
	{
	$cell_name=$this->input->post('cell_name');
	$data=array('cell_name'=>$cell_name);
	if($this->model->updateCell($id,$data))
	{
  	$this->session->set_flashdata('msg', "Cell updated successfully");
    return redirect(base_url().'admin/cell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/cell');
	}
	}
	public function subcell()
	{
	$data['cell']=$this->model->getCell();
	$data['subcell']=$this->model->getSubCell();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/subcell',$data);
	$this->load->view('admin/footer');
	}
	public function addSubCell()
	{
		$cell_id=$this->input->post('cell_id');
		$subcell_name=$this->input->post('subcell_name');
		$data=array(
			'cell_id'=>$cell_id,
			'subcell_name'=>$subcell_name
		);
	if($this->model->addSubCell($data))
	{
  	$this->session->set_flashdata('msg', "Sub Cell added successfully");
    return redirect(base_url().'admin/subcell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/subcell');
	}
	}
	public function deleteSubCell($id)
	{
	if($this->model->deleteSubCell($id))
	{
  	$this->session->set_flashdata('msg', "Sub Cell deleted successfully");
    return redirect(base_url().'admin/subcell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/subcell');
	}
	}
	public function editSubCell($id)
	{
	$data['cell']=$this->model->getCell();
	$data['subcell']=$this->model->getSubCell($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_subcell',$data);
	$this->load->view('admin/footer');
	}
	public function updateSubCell($id)
	{
		$cell_id=$this->input->post('cell_id');
		$subcell_name=$this->input->post('subcell_name');
		$data=array(
			'cell_id'=>$cell_id,
			'subcell_name'=>$subcell_name
		);
	if($this->model->updateSubCell($id,$data))
	{
  	$this->session->set_flashdata('msg', "Sub Cell updated successfully");
    return redirect(base_url().'admin/subcell');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/subcell');
	}
	}
	public function assign($id)
	{
	$data['id']=$id;
	$data['cell']=$this->model->getCell();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/assign',$data);
	$this->load->view('admin/footer');
	}
	public function getSubCellData()
	{
		$cell_id=$this->input->post('cell_id');
		echo $this->model->getSubCellData($cell_id);
	}
	public function user_info()
	{
	$data['user_info']=$this->model->getUserInfo(1);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/user_info',$data);
	$this->load->view('admin/footer');
	}
	public function updateUserInfo($id)
	{
		$old_data=$this->model->getUserInfo(1);
		$old_photo=$old_data[0]->photo;
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('photo')):
			if(file_exists($old_photo)):unlink($old_photo);endif;
		$image=$this->upload->data();
		$photo="upload/".$image['raw_name'].$image['file_ext'];
		else:
		$photo=$old_photo;
		endif;
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobno=$this->input->post('mobno');
		$address=$this->input->post('address');
		$short_bio=$this->input->post('short_bio');
		$address=$this->input->post('address');
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'address'=>$address,
			'short_bio'=>$short_bio,
			'photo'=>$photo
		);
	if($this->model->updateUserInfo($id,$data))
	{
  	$this->session->set_flashdata('msg', "User Profile updated successfully");
    return redirect(base_url().'admin/user_info');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/user_info');
	}
	}
	public function assignUser($id)
	{
		$cell_id=$this->input->post('cell_id');
		$subcell_id=$this->input->post('subcell_id');
		$data=array(
			'cell_id'=>$cell_id,
			'subcell_id'=>$subcell_id
		);
	if($this->model->assignUser($id,$data))
	{
  	$this->session->set_flashdata('msg', "User assigned successfully");
    return redirect(base_url().'admin/users');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/users');
	}
	}
	public function deleteMediaCategory($id)
	{
	if($this->model->deleteMediaCategory($id))
	{
  	$this->session->set_flashdata('msg', "Media Category deleted successfully");
    return redirect(base_url().'admin/media_category');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/media_category');
	}	
	}
	public function addMediaCategory()
	{
		$cat_name=$this->input->post('cat_name');
		$data=array(
			'cat_name'=>$cat_name
		);
	if($this->model->addMediaCategory($data))
	{
  	$this->session->set_flashdata('msg', "Media Category added successfully");
    return redirect(base_url().'admin/media_category');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/media_category');
	}
	}
	public function editMediaCategory($id)
	{
	$data['media_category']=$this->model->getMediaCategory($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_media_category',$data);
	$this->load->view('admin/footer');
	}
	public function updateMediaCategory($id)
	{
	$cat_name=$this->input->post('cat_name');
	$data=array(
		'cat_name'=>$cat_name
	);
	if($this->model->updateMediaCategory($data,$id))
	{
  	$this->session->set_flashdata('msg', "Media Category deleted successfully");
    return redirect(base_url().'admin/media_category');
	}
	else
	{
	$this->session->set_flashdata('msg', "Something went wrong. Try again");
	return redirect(base_url().'admin/media_category');
	}
	}
	public function media()
	{
	$data['media_category']=$this->model->getMediaCategory();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/media',$data);
	$this->load->view('admin/footer');
	}
	public function addMedia()
	{
		
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|pdf'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image'))
		 {
		 	$cat_id=$this->input->post('cat_id');
		 	$title=$this->input->post('title');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'cat_id'=>$cat_id,
					 'title'=>$title,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->addMedia($data))
			{
				 $this->session->set_flashdata('msg', "Media Posted Successfully."); 
   				 redirect(base_url().'admin/media');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/media');
			}
		 }
		 else
		 {
		 	$upload_error=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/media',compact('upload_error'));
			$this->load->view('admin/footer');
		 }
	}
	public function all_media()
	{
		$data['media']=$this->model->getMedia();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/all_media',$data);
		$this->load->view('admin/footer');
	}
	public function deleteMedia($id)
	{
		$old_data=$this->model->getMedia($id);
		$image=$old_data->image;
	}

}//main class end

?>