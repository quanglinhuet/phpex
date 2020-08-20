<?php namespace App\Controllers;

use App\Models\AdminModel;

class Pages extends BaseController
{
	protected $pagesModel;
	protected $entryview=5;
	function __construct()
	{
		$this->pagesModel=new AdminModel();
		$page= \Config\Services::pager();
	}
	public function index()
	{
		try {
			$rCookie=$this->entryview=$_COOKIE['row'];
			if ($rCookie =='5'||$rCookie =='10'||$rCookie =='50'||$rCookie =='10000000') $this->entryview = $rCookie+0;
		} catch (\Throwable $th) {
			//throw $th;
		}
		$data=[
			'title'=>'list data',
			'entryshow'=>$this->pagesModel->paginate($this->entryview,'group'),
			'pager'=> $this->pagesModel->pager,
			'news'=>$this->pagesModel->getPosts(),
			'et'=>$this->entryview,
		];
		echo view('templates/header');
		echo view('pages/home',$data);
		echo view('templates/footer');
	}
	function showme($page='home'){
		//echo 'This is page:'.$page;
		echo view('templates/header');
		echo view('pages/'.$page);
		echo view('templates/footer');
	}
	//--------------------------------------------------------------------
}
