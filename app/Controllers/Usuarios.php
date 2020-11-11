<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajasModel;
use App\Models\RolesModel;

class Usuarios extends BaseController{

	protected $usuarios, $cajas, $roles;
	protected $reglas;

	public function __construct(){
		$this->usuarios=new UsuariosModel;
		$this->cajas=new CajasModel;
		$this->roles=new RolesModel;
		helper(['form']);

		$this->reglas=[
			'usuario'=>[
				'rules'=>'required|is_unique[usuarios.usuario]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'is_unique'=>'El campo {field} debe ser unico'
				]
			],
			'password'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'repassword'=>[
				'rules'=>'required|matches[password]',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'matches'=>'Las contraseñas no coinciden.'
				]
			],
			'nombre'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'id_caja'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
				]
			],
			'id_rol'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			]
		];

		$this->reglasLogin=[
			'usuario'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'password'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			]
		];
	}
	public function index($activo=1){
		$usuarios=$this->usuarios->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'usuarios',
			 'datos'=>$usuarios
		];
		echo view('header');
		echo view('usuarios/usuarios', $data);
		echo view('footer');
	}
	public function eliminados($activo=0){
		$usuarios=$this->usuarios->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'usuarios Eliminadas',
			 'datos'=>$usuarios
		];
		echo view('header');
		echo view('usuarios/eliminados', $data);
		echo view('footer');
	}

	public function nuevo(){
		$cajas=$this->cajas->where('activo',1)->findAll();
		$roles=$this->roles->where('activo',1)->findAll();
		$data=[
			'titulo'=>'Agregar usuarios',
			'cajas'=>$cajas,
			'roles'=>$roles
		];
		echo view('header');
		echo view('usuarios/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$hash=password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
			$this->usuarios->save([
				'usuario'=>$this->request->getPost('usuario'),
				'password'=>$hash,
				'id_caja'=>$this->request->getPost('id_caja'),
				'id_rol'=>$this->request->getPost('id_rol'),
				'nombre'=>$this->request->getPost('nombre')
				]);
			return redirect()->to(base_url().'/usuarios');	
		}
		else{
			$cajas=$this->cajas->where('activo',1)->findAll();
			$roles=$this->roles->where('activo',1)->findAll();
			$data=[
			'titulo'=>'Agregar usuarios',
			'cajas'=>$cajas,
			'roles'=>$roles,
			'validation'=> $this->validator
		];
			
			echo view('header');
			echo view('usuarios/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){

		$usuario=$this->usuarios->where('id',$id)->first();
		if ($valid != null){
			$data=[
				'titulo'=>'Editar usuario',
				 'validation'=>$valid,
				 'datos'=>$usuario

			];
		}else{
			$data=[
			'titulo'=>'Editar usuario',
			 'datos'=>$usuario
		];
		}
		
		
		echo view('header');
		echo view('usuarios/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->usuarios->update(
				$this->request->getPost('id'),
				['nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')]
			);
		return redirect()->to(base_url().'/usuarios');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->usuarios->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/usuarios');
	}
	public function reingresar($id){
		$this->usuarios->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/usuarios/eliminados');
	}
	public function login(){
		echo view('login');
	}

	public function valida(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglasLogin)){
			$usuario=$this->request->getPost('usuario');
			$password=$this->request->getPost('password');
			$usuarioData=$this->usuarios->where('usuario',$usuario)->first();
			if ($usuarioData !=null){
				if (password_verify($password, $usuarioData['password'])){
					$sesionDatos=[
						'id_usuario'=>$usuarioData['id'],
						'nonbre'=>$usuarioData['nombre'],
						'id_caja'=>$usuarioData['id_caja'],
						'id_rol'=>$usuarioData['id_rol']
					];
					$session=session();
					$session->set($sesionDatos);
					return redirect()->to(base_url().'/configuracion');
				}else{
					$data['error']='Las contraseñas no existe';
					echo view('login',$data);
				}
			}else{
				$data['error']='El usuario no existe';
				echo view('login',$data);
			}
		}else{
			$data=[
				'validation'=>$this->validator
			];
			echo view('login', $data);
		}
	}
	//--------------------------------------------------------------------

}
