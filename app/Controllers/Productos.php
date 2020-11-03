<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriaModel;

class Productos extends BaseController{

	protected $productos;

	public function __construct(){
		$this->productos=new ProductosModel;
		$this->unidades=new UnidadesModel;
		$this->categorias=new CategoriaModel;
	}
	public function index($activo=1){
		$productos=$this->productos->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Producto',
			 'datos'=>$productos
		];
		echo view('header');
		echo view('productos/productos', $data);
		echo view('footer');
	}


	public function eliminados($activo=0){
		$productos=$this->productos->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Producto Eliminadas',
			 'datos'=>$productos
		];
		echo view('header');
		echo view('productos/eliminados', $data);
		echo view('footer');
	}

	public function nuevo($activo=1){
		$unidades=$this->unidades->where('activo',$activo)->findAll();
		$categorias=$this->categorias->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Agregar producto',
			'unidades'=>$unidades,
			'categorias'=>$categorias
		];
		echo view('header');
		echo view('productos/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post"){
			$this->productos->save([
				'nombre'=>$this->request->getPost('nombre'),
				'codigo'=>$this->request->getPost('codigo'),
				'precio_venta'=>$this->request->getPost('precio_venta'),
				'precio_compra'=>$this->request->getPost('precio_compra'),
				'stock_minimo'=>$this->request->getPost('stock_minimo'),
				'id_unidad'=>$this->request->getPost('id_unidad'),
				'id_categoria'=>$this->request->getPost('id_categoria'),
				'inventariable'=>$this->request->getPost('inventariable')
				]);
			return redirect()->to(base_url().'/productos');	
		}
		else{
			$data=[
				'titulo'=>'Agregar producto',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('productos/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id){
		$unidades=$this->unidades->where('activo',1)->findAll();
		$categorias=$this->categorias->where('activo',1)->findAll();
		$producto=$this->productos->where('id',$id)->first();
		$data=[
			'titulo'=>'Editar producto',
			 'producto'=>$producto,
			 'unidades'=>$unidades,
			 'categorias'=>$categorias
		];
		
		echo view('header');
		echo view('productos/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		
		$this->productos->update(
			$this->request->getPost('id'),
			['nombre'=>$this->request->getPost('nombre'),
			'codigo'=>$this->request->getPost('codigo'),
			'precio_venta'=>$this->request->getPost('precio_venta'),
			'precio_compra'=>$this->request->getPost('precio_compra'),
			'stock_minimo'=>$this->request->getPost('stock_minimo'),
			'id_unidad'=>$this->request->getPost('id_unidad'),
			'id_categoria'=>$this->request->getPost('id_categoria'),
			'inventariable'=>$this->request->getPost('inventariable')]);
			
		return redirect()->to(base_url().'/productos');	

	}

	public function eliminar($id){
		$this->productos->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/productos');
	}
	public function reingresar($id){
		$this->productos->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/productos/eliminados');
	}

	//--------------------------------------------------------------------

}
