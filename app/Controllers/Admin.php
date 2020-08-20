<?php namespace App\Controllers;
use App\Models\AdminModel;
class Admin extends BaseController
{
	function add(){
		if ($_POST){
            //$image= $_FILES['image'];
			$imagename=$_FILES['image']['name'];
			if($imagename==''){
				$imagename='anh-dai-dien-FB-200.jpg';
			}
            //print_r($_POST);
			$adminModel=new AdminModel();
			$data=[];
			$data['title']=$_POST['title'];
			$data['description']=$_POST['description'];
			$data['image']=$imagename;
			$data['status']=$_POST['status'];
            //$query1="INSERT INTO `basic` (`id`, `title`, `description`, `status`, `image`, `create_at`, `update_at`) VALUES (NULL, $_POST['title'], $imagename, current_timestamp(), current_timestamp());";
			//$adminModel->db->query($query1);
			$image=$this->request->getFile('image');
			if($imagename!='anh-dai-dien-FB-200.jpg')
				$image->move("./upload");
			$adminModel->insertData($data);
            return redirect()->to(base_url());
        }
        else{
            echo view('templates/header');
		    echo view('admin/add');
            echo view('templates/footer');
        }
	}
	function show(){
		$id=1;
		try{
			$id=$_GET['id'];
		}
		catch (\Throwable $th){
		}
		$md = new AdminModel();
		$data['item']=$md->find($id);
		echo view('templates/header');
		echo view('admin/show',$data);
		echo view('templates/footer');
		
	}
	function edit(){

		$md = new AdminModel();
		$primaryKey = 'id';
		$id=null;
		try {
			$id=$_GET['id'];
		} catch (\Throwable $th) {
			//throw $th;
		}
		
		if($_POST){
			$data=[];
			$id=$this->request->getVar('id');
			$data=[
				'title'=>$this->request->getVar('title'),
				'description'=>$this->request->getVar('description'),
			];
			$image=$this->request->getFile('image');
			if($image->getName()!=''){
				$data['image']=$image->getName();
				$image->move("./upload");
			}
			$data['status']=$this->request->getVar('status');
			$md->updateData($id,$data);
			return redirect()->to(base_url());
		}

		$data['item']=$md->find($id);
		echo view('templates/header');
		echo view('admin/edit',$data);
        echo view('templates/footer');
	}
	function delete(){
		$id=1;
		$md = new AdminModel();
		try{$id=$_GET['id'];}
		catch (\Throwable $th){}
		if($_POST){
			if($_POST['sure']='yes'){
				$md->deleteData($_POST['id']);
			}
			return redirect()->to(base_url());
		}
		$md = new AdminModel();
		$data['item']=$md->find($id);
		echo view('templates/header');
		echo view('admin/delete',$data);
        echo view('templates/footer');
	}

	function showpreview(){
		$data=[];
		try {
			$data['item']=[
				'title'=>$_COOKIE['titleadd'],
				'description'=>$_COOKIE['descriptionadd'],
				'image'=>$_COOKIE['imageadd']
			];
		} catch (\Throwable $th) {
			//throw $th;
		}
		echo view('templates/header',$data);
		echo view('admin/preview');
        echo view('templates/footer');
	}
	
	//--------------------------------------------------------------------
}
