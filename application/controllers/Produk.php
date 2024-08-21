<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Produk extends MY_Controller
{
	function __construct()
	{
      parent::__construct();
		$this->load->database();
		$this->load->model('Products');
		$this->load->model('Productimages');
		$this->load->model('Materials');
		$this->load->model('Finishings');
		$this->load->model('Facetypes');
		$this->load->model('Laminations');
		$this->load->model('Sizes');
   }

   public function undangan()
	{
		$this->data['title'] = "Pesan Undangan | Lestari Printing";
		$this->data['undangan'] = $this->Products->getProductsWhere(1);
		$this->template->public_render('public/produk/undangan', $this->data);
	}

	public function spanduk()
	{
		$this->data['title'] = "Spanduk Banner Baliho | Lestari Printing";
		$this->data['spanduk'] = $this->Products->getProductsWhere(2);
		$this->template->public_render('public/produk/spanduk', $this->data);
	}

	public function kartunama()
	{
		$this->data['title'] = "Kartu Nama | Lestari Printing";
		$this->data['kartunama'] = $this->Products->getProductsWhere(3);
		$this->template->public_render('public/produk/kartunama', $this->data);
	}

	public function rollbanner()
	{
		$this->data['title'] = "Roll Up Banner | Lestari Printing";
		$this->data['rollbanner'] = $this->Products->getProductsWhere(4);
		$this->template->public_render('public/produk/rollbanner', $this->data);
	}

	public function brosur()
	{
		$this->data['title'] = "Brosur - Flyer Digital Printing | Lestari Printing";		
		$this->data['brosur'] = $this->Products->getProductsWhere(5);
		$this->template->public_render('public/produk/brosur', $this->data);
	}

	public function standbanner()
	{
		$this->data['title'] = "Standing Banner | Lestari Printing";
		$this->data['standbanner'] = $this->Products->getProductsWhere(6);
		$this->template->public_render('public/produk/standbanner', $this->data);
	}

	public function sticker()
	{
		$this->data['title'] = "Sticker | Lestari Printing";
		$this->data['sticker'] = $this->Products->getProductsWhere(7);
		$this->template->public_render('public/produk/sticker', $this->data);
	}

	public function produklainnya()
	{
		$this->data['title'] = "Produk Lainnya | Lestari Printing";
		$this->data['produklainnya'] = $this->Products->getProductsWhere(8);
		$this->template->public_render('public/produk/produklainnya', $this->data);
	}

	public function merchandise()
	{
		$this->data['title'] = "Merchandise | Lestari Printing";
		$this->data['merchandise'] = $this->Products->getProductsWhere(9);
		$this->template->public_render('public/produk/merchandise', $this->data);
	}

	public function detailproduk($id_product, $categories_id)
	{	
		if($categories_id == 1){

			$this->data['title'] = "Undangan | Lestari Printing";
			$this->data['detailundangan'] = $this->Products->getProductsWhereId(1, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);						
			$this->template->public_render('public/singleproduk/undangan', $this->data);

		}elseif($categories_id == 2){

			$this->data['title'] = "Spanduk Banner Baliho | Lestari Printing";
			$this->data['detailspanduk'] = $this->Products->getProductsWhereId(2, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);			
			$this->data['bahan'] = $this->Materials->getMaterialsWhere(2);
			$this->data['finishing'] = $this->Finishings->getFinishingsWhere(2);
			$this->template->public_render('public/singleproduk/spanduk', $this->data);

		}elseif($categories_id == 3){

			$this->data['title'] = "Kartu Nama | Lestari Printing";
			$this->data['detailkartu'] = $this->Products->getProductsWhereId(3, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);
			$this->data['bahan'] = $this->Materials->getMaterialsWhere(3);
			$this->data['muka'] = $this->Facetypes->getFacetypesWhere(3);
			$this->data['laminasi'] = $this->Laminations->getLaminationsWhere(3);
			$this->data['finishing'] = $this->Finishings->getFinishingsWhere(3);
			$this->template->public_render('public/singleproduk/kartunama', $this->data);

		}elseif($categories_id == 4){
			$this->data['title'] = "Roll Up Banner | Lestari Printing";
			$this->data['detailrollbanner'] = $this->Products->getProductsWhereId(4, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);
			$this->data['ukuran'] = $this->Sizes->getSizessWhere(4);
			$this->data['bahan'] = $this->Materials->getMaterialsWhere(4);			
			$this->template->public_render('public/singleproduk/rollbanner', $this->data);
		}elseif($categories_id == 5){
			$this->data['title'] = "Brosur - Flyer Digital Printing | Lestari Printing";
			$this->data['detailbrosur'] = $this->Products->getProductsWhereId(5, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);
			$this->data['ukuran'] = $this->Sizes->getSizessWhere(5);
			$this->data['muka'] = $this->Facetypes->getFacetypesWhere(5);
			$this->data['laminasi'] = $this->Laminations->getLaminationsWhere(5);
			$this->data['finishing'] = $this->Finishings->getFinishingsWhere(5);
			$this->template->public_render('public/singleproduk/brosur', $this->data);
		}elseif($categories_id == 6){
			$this->data['title'] = "Standing Banner | Lestari Printing";
			$this->data['detailstand'] = $this->Products->getProductsWhereId(6, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);
			$this->data['ukuran'] = $this->Sizes->getSizessWhere(6);
			$this->data['bahan'] = $this->Materials->getMaterialsWhere(6);			
			$this->template->public_render('public/singleproduk/standbanner', $this->data);
		}elseif($categories_id == 7){
			$this->data['title'] = "Sticker | Lestari Printing";
			$this->data['detailsticker'] = $this->Products->getProductsWhereId(7, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);			
			$this->data['bahan'] = $this->Materials->getMaterialsWhere(7);
			$this->data['laminasi'] = $this->Laminations->getLaminationsWhere(7);
			$this->data['finishing'] = $this->Finishings->getFinishingsWhere(7);
			$this->template->public_render('public/singleproduk/sticker', $this->data);
		}elseif($categories_id == 8){
			$this->data['title'] = "Produk Lainnya | Lestari Printing";
			$this->data['detailproduklainnya'] = $this->Products->getProductsWhereId(8, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);			
			$this->template->public_render('public/singleproduk/produklainnya', $this->data);
		}elseif($categories_id == 9){
			$this->data['title'] = "Merchandise | Lestari Printing";
			$this->data['detailmerchandise'] = $this->Products->getProductsWhereId(9, $id_product);
			$this->data['produkimage'] = $this->Productimages->getImagesBy($id_product);			
			$this->template->public_render('public/singleproduk/merchandise', $this->data);
		}
	}
	
	

}