<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;

class Cajas extends BaseController{

	protected $cajas;
	protected $reglas;

	public function __construct(){
		$this->cajas=new CajasModel;
		helper(['form']);

		$this->reglas=[
			'folio'=>[
				'rules'=>'required|numeric|is_unique[cajas.folio]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'numeric'=>'El campo {field} debe ser numerico',
					'is_unique'=>'El campo {field} debe ser unico'
				]
			],
			'nombre'=>[
				'rules'=>'required|string|is_unique[cajas.nombre]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'is_unique'=>'El campo {field} debe ser unico',
					'string'=>'El campo {field} debe de texto'
				]
			],
			'numero_caja'=>[
				'rules'=>'required|is_unique[cajas.numero_caja]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'is_unique'=>'El campo {field} debe ser unico'
				]
			]
		];
	}
	public function index($activo=1){
		$cajas=$this->cajas->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'cajas',
			 'datos'=>$cajas
		];
		echo view('header');
		echo view('cajas/cajas', $data);
		echo view('footer');
	}
	public function eliminados($activo=0){
		$cajas=$this->cajas->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'cajas Eliminadas',
			 'datos'=>$cajas
		];
		echo view('header');
		echo view('cajas/eliminados', $data);
		echo view('footer');
	}

	public function nuevo(){
		$data=[
			'titulo'=>'Agregar cajas'
		];
		echo view('header');
		echo view('cajas/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->cajas->save([
				'nombre'=>$this->request->getPost('nombre'),
				'numero_caja'=>$this->request->getPost('numero_caja'),
				'folio'=>$this->request->getPost('folio')
				]);
			return redirect()->to(base_url().'/cajas');	
		}
		else{
			$data=[
				'titulo'=>'Agregar cajas',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('cajas/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){
		$caja=$this->cajas->where('id',$id)->first();
		if ($valid != null){
			$data=[
				'titulo'=>'Editar caja',
				 'validation'=>$valid,
				 'datos'=>$caja

			];
		}else{
			$data=[
			'titulo'=>'Editar caja',
			 'datos'=>$caja
		];
		}
		
		
		echo view('header');
		echo view('cajas/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->cajas->update(
				$this->request->getPost('id'),
				['nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')]
			);
		return redirect()->to(base_url().'/cajas');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->cajas->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/cajas');
	}
	public function reingresar($id){
		$this->cajas->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/cajas/eliminados');
	}

	//--------------------------------------------------------------------

}
