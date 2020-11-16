<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class Roles extends BaseController{

	protected $roles;
	protected $reglas;

	public function __construct(){
		$this->roles=new RolesModel;
		helper(['form']);

		$this->reglas=[
			'nombre'=>[
				'rules'=>'required|string|is_unique[roles.nombre]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'is_unique'=>'El campo {field} debe ser unico',
					'string'=>'El campo {field} debe de texto'
				]
			]
		];
	}
	public function index($activo=1){
		$roles=$this->roles->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'roles',
			 'datos'=>$roles
		];
		echo view('header');
		echo view('roles/roles', $data);
		echo view('footer');
	}
	public function eliminados($activo=0){
		$roles=$this->roles->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'roles Eliminadas',
			 'datos'=>$roles
		];
		echo view('header');
		echo view('roles/eliminados', $data);
		echo view('footer');
	}

	public function nuevo(){
		$data=[
			'titulo'=>'Agregar roles'
		];
		echo view('header');
		echo view('roles/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->roles->save([
				'nombre'=>$this->request->getPost('nombre')
				]);
			return redirect()->to(base_url().'/roles');	
		}
		else{
			$data=[
				'titulo'=>'Agregar roles',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('roles/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){
		$role=$this->roles->where('id',$id)->first();
		if ($valid != null){
			$data=[
				'titulo'=>'Editar role',
				 'validation'=>$valid,
				 'datos'=>$role

			];
		}else{
			$data=[
			'titulo'=>'Editar role',
			 'datos'=>$role
		];
		}
		
		
		echo view('header');
		echo view('roles/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->roles->update(
				$this->request->getPost('id'),
				['nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')]
			);
		return redirect()->to(base_url().'/roles');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->roles->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/roles');
	}
	public function reingresar($id){
		$this->roles->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/roles/eliminados');
	}

	//--------------------------------------------------------------------

}
