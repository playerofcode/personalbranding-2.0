<?php 
class Admin_model extends CI_model{

		public function login($email,$password)
		{
			return  $this->db->get_where('admin', array('email' => $email,'password'=>$password));
		}
		public function add_category($data)
		{
			return $this->db->insert('product_category',$data);
		}
		public function get_category($cat_id='')
		{
			if($cat_id)
			{
				return $this->db->get_where('product_category',array('cat_id'=>$cat_id))->result();
			}
			else
			{
				$this->db->order_by('cat_id','DESC');
				return $this->db->get('product_category')->result();
			}
		}
		public function delete_category($cat_id)
		{
			$this->db->delete('products',array('cat_id'=>$cat_id));
			return $this->db->delete('product_category',array('cat_id'=>$cat_id));
		}
		public function update_category($data,$cat_id)
		{
			$this->db->where('cat_id',$cat_id);
			return $this->db->update('product_category',$data);
		}
		public function insert_sub_category($data)
 	{
 		return $this->db->insert('product_sub_category',$data);
 	}
 	public function get_sub_category($sub_cat_id='')
 	{
 		if($sub_cat_id)
 		{
 			return $this->db->get_where('product_sub_category',array('sub_cat_id'=>$sub_cat_id))->result();
 		}
 		else
 		{
 			$this->db->order_by('sub_cat_id','DESC');
 			return $this->db->get('product_sub_category')->result();
 		}
 	}
 	public function getProductWiseCategory($p_cat_id='')
 	{
 		if($p_cat_id)
 		{
 			return $this->db->get_where('p_category',array('p_cat_id'=>$p_cat_id))->result();
 		}
 		else
 		{
 			$this->db->order_by('p_cat_id','DESC');
 			return $this->db->get('p_category')->result();
 		}
 	}
 	public function delete_sub_category($sub_cat_id)
 	{
 		return $this->db->delete('product_sub_category',array('sub_cat_id'=>$sub_cat_id));
 	}
 	public function delete_product_category($p_cat_id)
 	{
 		return $this->db->delete('p_category',array('p_cat_id'=>$p_cat_id));
 	}
 	public function update_sub_category($sub_cat_id,$data)
 	{
 		$this->db->where('sub_cat_id',$sub_cat_id);
 		return $this->db->update('product_sub_category',$data);
 	}
 	public function update_product_category($p_cat_id,$data)
 	{
 		$this->db->where('p_cat_id',$p_cat_id);
 		return $this->db->update('p_category',$data);
 	}
 	public function fetch_sub_cat($cat_id)
 	{
 		$res=$this->db->get_where('product_sub_category',array('cat_id'=>$cat_id))->result();
 		$output="";
 		if(!empty($res))
 		{
 			$output.="<option value='' disabled='' selected=''>Choose Sub Category</option>";
 		foreach ($res as $key) {
 			$output.="<option value=".$key->sub_cat_id.">".$key->sub_cat_name."</option>";
 		}
 		return $output;
 		}
 		else
 		{
 			$output.="<option value='' disabled='' selected=''>Sub Category not availabel</option>";
 			return $output;
 		}
 	}
 	public function fetch_product_cat($sub_cat_id)
 	{
 		$res=$this->db->get_where('p_category',array('sub_cat_id'=>$sub_cat_id))->result();
 		$output="";
 		if(!empty($res))
 		{
 			$output.="<option value='' disabled='' selected=''>Choose Product Category</option>";
 		foreach ($res as $key) {
 			$output.="<option value=".$key->p_cat_id.">".$key->p_cat_name."</option>";
 		}
 		return $output;
 		}
 		else
 		{
 			$output.="<option value='' disabled='' selected=''>Product Category not availabel</option>";
 			return $output;
 		}
 	}
		public function add_product($data)
		{
			return $this->db->insert('products',$data);
		}
		public function get_product($p_id='')
		{
			if($p_id)
			{
				return $this->db->get_where('products',array('p_id'=>$p_id))->result();
			}
			else
			{
				$this->db->order_by('p_id','DESC');
				return $this->db->get('products')->result();
			}
		}
		public function delete_product($p_id)
		{
			return $this->db->delete('products',array('p_id'=>$p_id));
		}
		public function update_product($data,$p_id)
		{
			$this->db->where('p_id',$p_id);
			return $this->db->update('products',$data);
		}
		public function customer_list()
		{
			$this->db->order_by('id','DESC');
			return $this->db->get_where('customers',array('distributor'=>'self'))->result();
		}
		public function all_customer_list()
		{
			$this->db->order_by('id','desc');
			$this->db->where('distributor !=','self');
			return $this->db->get('customers')->result();
		}
		public function new_order()
		{	
			$this->db->order_by('order_id','DESC');
			//return $this->db->get_where('orders',array('status'=>'new_order','distributor'=>'self'))->result();
			return $this->db->get_where('orders',array('status'=>'new_order'))->result();
		}
		public function complete_order()
		{
			$this->db->order_by('order_id','DESC');
			return $this->db->get_where('orders',array('status'=>'delivered'))->result();
		}
		public function confirm_order()
		{
			//$this->db->where("status !='new_order' AND status !='delivered' AND distributor ='self'");
			$this->db->where("status !='new_order' AND status !='delivered'");
			$this->db->order_by('order_id','DESC');
			return $this->db->get('orders')->result();	
		}
		public function order_item_info($order_id)
		{
			$data =$this->db->get_where('order_items',array('order_id'=>$order_id))->result();
			$output='<table class="table table-hover"><tr><td>Product Id</td><td>Product Name</td><td>Quantity</td></tr>';
			foreach ($data as $key) {
				$output .='<tr><td>'.$key->product_id.'</td>';
				$output .='<td>'.$key->product_name.'</td>';
				$output .='<td>'.$key->quantity.'</td></tr>';
			}
			$output .='</table>';
			return $output;
		}
		public function fetchAvailability()
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('available_area')->result();
		}
		public function distributor_list()
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('distributor')->result();
		}
		public function changeDistributorStatus($id)
		{
			$this->db->where('id',$id);
			return $this->db->update('distributor',array('status'=>'active'));
		}
		public function delivery_list()
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('delivery')->result();
		}
		public function enquiry($id='')
		{
			if($id):
			return $this->db->get_where('contact',array('id'=>$id))->result();
			endif;
			$this->db->order_by('id','desc');
			return $this->db->get('contact')->result();
		}
		public function deleteEnquiry($id)
		{
			return $this->db->delete('contact',array('id'=>$id));
		}
		public function CustomerInfoByOrderId($order_id)
	{
		return $this->db->get_where('orders',array('order_id'=>$order_id))->result();
	}
		public function orderItem($order_id)
	{
		$result=$this->db->get_where('order_items',array('order_id'=>$order_id))->result();
		$a=$this->CustomerInfoByOrderId($order_id);
		$customer_name=$a[0]->customer_name;
		$address=$a[0]->address;
		$total=$a[0]->grand_total;
		$date=$a[0]->date;
		$output ='<table border="1" cellpadding="5" cellspacing="0" width="100%">';
		$output.='<tr>
	    			<td>Customer Name</td>
	    			<td>'.$customer_name.'</td>
					<td>Order ID</td>
					<td>'.$order_id.'</td>
					</tr>';
		$output.='<tr>
		<td>Address</td>
		<td>'.$address.'</td>
		<td>Date & Time</td>
		<td>'.$date.'</td>
		</tr>';
  		$output.='<tr>
		              <td>Product ID</td>
					  <td>Product Name</td>
		              <td>Quantity</td>
		              <td>Sub Total</td>
	             </tr>';	
	    	
	    foreach ($result as $key) {
	    $output.='<tr><td>'.$key->product_id.'</td>';
	    $output.='<td>'.$key->product_name.'</td>';
	    $output.='<td>'.$key->quantity.'</td>';
	    $output.='<td>'.$key->sub_total.'</td></tr>';
	    }
	   	$output.='<tr><td colspan="3"><center>Total Amount</center></td><td>'.$total.'</td></tr>';
	    $output.='</table>';
	    return $output;
	}
	//14 June, 2021
	public function countBlog()
		{
			return $this->db->get('blog')->num_rows();
		}
	public function bloginsert($data)
		{
			$this->db->insert('blog',$data);
			return true;	
		}
		public function bloglist()
		{
			$this->db->select('*');
			$this->db->order_by('id','DESC');
			//$this->db->limit($limit,$offset);
			$query=$this->db->get('blog');
			return $query->result();
		}
		public function num_rows()
		{
			return $this->db->get('blog')->num_rows();
		}
		public function get_blog_info($id)
		{
			// $this->db->select('image');
			$query=$this->db->get_where('blog',array('id'=>$id));
			return $query->result();
		}
		public function deleteblog($id)
		{
			$img=$this->get_blog_info($id);
			if(unlink($img[0]->image)){
			return $this->db->delete('blog', array('id' => $id));}
		}
		public function UpdateBlog($data,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('blog', $data);
			return true;
		}
		//updated 28 june, 2021
		public function insertProductCategory($data)
		{
			return $this->db->insert('p_category',$data);
		}
		public function getProductCategory($p_cat_id='')
		{
			if($p_cat_id):
				return $this->db->get_where('p_category',array('p_cat_id'=>$p_cat_id))->result();
			endif;
			$this->db->order_by('p_cat_id','desc');
			return $this->db->get('p_category')->result();
		}
		public function addReply($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('contact',$data);
		}
		//03 July, 2021
		public function removeBannerImage($cat_id)
		{
			$this->db->where('cat_id',$cat_id);
			return $this->db->update('product_category',array('banner'=>''));
		}
		//07 july, 2021
		public function getExactCatID($p_cat_id)
		{
			return $this->db->get_where('p_category',array('p_cat_id'=>$p_cat_id))->row()->cat_id;
		}
		public function getSubCategoryByCatID($cat_id)
		{
			return $this->db->get_where('product_sub_category',array('cat_id'=>$cat_id))->result();
		}
		public function getExactCatIdByProductID($p_id)
		{
			return $this->db->get_where('products',array('p_id'=>$p_id))->row()->cat_id;
		}
		public function getExactProductCategoryByProductID($p_id)
		{
			return $this->db->get_where('p_category',array('p_id'=>$p_id))->row()->p;
		}
		public function checkCurrentStatus($p_id)
		{
			return $this->db->get_where('products',array('p_id'=>$p_id))->row()->status;
		}
		public function change_product_status($p_id,$status)
		{
			$this->db->where('p_id',$p_id);
			return $this->db->update('products',array('status'=>$status));
		}
		//08 July, 2021
		public function getRaiseTicket($id='')
		{
			if($id):
				return $this->db->get_where('ticket',array('id'=>$id))->result();
			else:
				$this->db->order_by('id','desc');
				return $this->db->get('ticket')->result();
			endif;
		}
		public function deleteTicket($id)
		{
			return $this->db->delete('ticket',array('id'=>$id));
		}
		public function addTicketReply($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('ticket',$data);
		}
		//14 July, 2021
		public function get_pending_product()
		{
			$this->db->order_by('p_id','DESC');
			return $this->db->get_where('products',array('status'=>0))->result();
		}
		public function getProductCategoryBySideBar()
		{
			//$this->db->order_by('cat_id','desc');
			$res=$this->db->get('product_category')->result();
			$output='';
			foreach($res as $key):
				$output.='<li class="sidebar-item"><a href="'.base_url("admin/category_wise_product/").$key->cat_id.'" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">'.$key->cat_name.'</span></a></li>';
			endforeach;
			return $output;
		}
		public function getCategoryWiseProduct($cat_id)
		{
			return $this->db->get_where('products',array('cat_id'=>$cat_id,'status'=>1))->result();
		}
		public function getProfileUpdateRequest()
		{
			$this->db->order_by('id','desc');
			return $this->db->get('profile_update_request')->result();
		}
		public function getPreviousProfileUpdateRequest($id)
		{
			return $this->db->get_where('profile_update_request')->result();
		}
		public function approveProfileChangeRequest($data,$distributor)
		{
			$this->db->where('email',$distributor);
			return $this->db->update('distributor',$data);
		}
		public function removeProfileUpdateRequest($id)
		{
			return $this->db->delete('profile_update_request',array('id'=>$id));
		}
		public function getWholesalers()
		{
			$this->db->order_by('id','desc');
			return $this->db->get('wholesaler')->result();
		}
		public function getWholesalerAccountCurrentStatus($wholesaler_id)
		{
			return $this->db->get_where('wholesaler',array('id'=>$wholesaler_id))->row()->status;
		}
		public function changeWholesalerAccountStatus($data,$wholesaler_id)
		{
			$this->db->where('id',$wholesaler_id);
			return $this->db->update('wholesaler',$data);
		}
		public function getFilterSubCategory($cat_id)
		{
			$res=$this->db->get_where('product_sub_category',array('cat_id'=>$cat_id))->result();
			$output='';
			foreach($res as $key):
				$output.='<ul><li>'.$key->sub_cat_name.'</li></ul>';
			endforeach;
			return $output;
		}
		public function getExactSubCatIdByProductID($p_id)
		{
			return $this->db->get_where('products',array('p_id'=>$p_id))->row()->sub_cat_id;
		}
		public function getProductCategoryBySubCatId($sub_cat_id)
		{
			return $this->db->get_where('p_category',array('sub_cat_id'=>$sub_cat_id))->result();
		}
		//19 Aug, 2021
		public function addSpeeches($data)
		{
			return $this->db->insert('speeches',$data);
		}
		public function getSpeeches($id='')
		{
			if($id):
				return $this->db->get_where('speeches',array('id'=>$id))->result();
			else:
				$this->db->order_by('id','desc');
				return $this->db->get('speeches')->result();
			endif;
		}
		public function updateSpeech($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('speeches',$data);
		}
		public function deleteSpeech($id)
		{
			return $this->db->delete('speeches',array('id'=>$id));
		}
		public function addVideo($data)
		{
			return $this->db->insert('videos',$data);
		}
		public function getVideos($id='')
		{
		if($id):
			return $this->db->get_where('videos',array('id'=>$id))->result();
		else:
			$this->db->order_by('id',$id);
			return $this->db->get('videos')->result();
		endif;
		}
		public function deleteVideo($id)
		{
			return $this->db->delete('videos',array('id'=>$id));
		}
		public function updateVideo($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('videos',$data);
		}
		public function addImage($data)
		{
			return $this->db->insert('images',$data);
		}
		public function getImages($id='')
		{
			if($id):
			return $this->db->get_where('images',array('id'=>$id))->result();
			else:
			$this->db->order_by('id','desc');
			return $this->db->get('images')->result();
			endif;
		}
		public function deleteImage($id)
		{
			return $this->db->delete('images',array('id'=>$id));
		}
		public function updateImage($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('images',$data);
		}
		//20 Aug, 2021
		public function getMediaCategory($id='')
		{
			if($id):
				return $this->db->get_where('media_category',array('id'=>$id))->result();
			else:
				$this->db->order_by('id','desc');
				return $this->db->get('media_category')->result();
			endif;
		}
		public function getUsers($id='')
		{
			if($id):
			return $this->db->get_where('user',array('id'=>$id))->result();
			else:
			$this->db->order_by('id','desc');
			return $this->db->get('user')->result();
			endif;
		}
		public function getCell($id='')
		{
			if($id):
			return $this->db->get_where('cell',array('id'=>$id))->result();
			else:
			$this->db->order_by('id','desc');
			return $this->db->get('cell')->result();
			endif;
		}
		public  function deleteCell($id)
		{
			return $this->db->delete('cell',array('id'=>$id));
		}
		public function addCell($data)
		{
			return $this->db->insert('cell',$data);
		}
		public function updateCell($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('cell',$data);
		}
		public function getSubCell($id='')
		{
			if($id):
			return $this->db->get_where('subcell',array('id'=>$id))->result();
			else:
			$this->db->order_by('id','desc');
			return $this->db->get('subcell')->result();
			endif;
		}
		public function addSubCell($data)
		{
			return $this->db->insert('subcell',$data);
		}
		public function deleteSubCell($id)
		{
			return $this->db->delete('subcell',array('id'=>$id));
		}
		public function updateSubCell($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('subcell',$data);
		}
		public function getSubCellData($cell_id)
		{
			$res=$this->db->get_where('subcell',array('cell_id'=>$cell_id))->result();
			$output='';
			foreach($res as $key):
				$output.='<option value="'.$key->id.'">'.$key->subcell_name.'</option>';
			endforeach;
			return $output;
		}
		public function getUserInfo($id)
		{
			return  $this->db->get_where('personal_info',array('id'=>$id))->result();
		}
		public function updateUserInfo($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('personal_info',$data);
		}
		public function assignUser($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('user',$data);
		}
		public function deleteMediaCategory($id)
		{
			return $this->db->delete('media_category',array('id'=>$id));
		}
		public function addMediaCategory($data)
		{
			return $this->db->insert('media_category',$data);
		}
		public function updateMediaCategory($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('media_category',$data);
		}
		public function addMedia($data)
		{
			return $this->db->insert('media',$data);
		}
		public function getMedia($id='')
		{
			if($id):
				return $this->db->get_where('media',array('id'=>$id))->result();
			else:
				$this->db->order_by('id','desc');
				return $this->db->get('media')->result();
			endif;
		}
}


?>