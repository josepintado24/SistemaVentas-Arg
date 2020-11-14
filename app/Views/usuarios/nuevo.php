<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                       <div class="alert alert-danger">
                         <?php echo $validation->listErrors(); ?>
                       </div>
                       <?php }?>
                            <form method="POST" action="<?php echo base_url();?>/usuarios/insertar" autocomplete="off">
                           
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">usuario</label>
                                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo set_value('usuario');?>" autofocus >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre</label>
                                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre');?>" >
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password" type="text" value="<?php echo set_value('password');?>"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Repite contraseña</label>
                                            <input type="password" class="form-control" id="repassword" name="repassword" type="text" value="<?php echo set_value('repassword');?>" >
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Cajas</label>
                                            <Select class="form-control" id="id_caja" name="id_caja" type="text"  >
                                                <option value="">  Seleccionar caja </option> 
                                                <?php foreach($cajas as $caja){ ?>
                                                    <option value="<?php echo $caja['id'];?>" <?php  if (set_value('id_caja')==$caja['id']){ echo 'selected'; } ?> > 
                                                         <?php echo $caja['nombre']; ?>  
                                                    </option> 
                                                <?php  }?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6">
                                        <label for=""  >Roles</label>
                                            <Select  class="form-control" id="id_rol" name="id_rol" type="text"  >
                                                <option value="">  Seleccionar Roles </option> 
                                                <?php foreach($roles as $rol){ ?>
                                                    <option value="<?php echo $rol['id'];?>" <?php  if (set_value('id_rol')==$rol['id']){ echo 'selected'; } ?> > 
                                                        <?php echo $rol['nombre']; ?>
                                                    </option> 
                                                <?php  }?>
                                            </select>
                                        </div>
                                    </div>    
                                </div>
                                    <a href="<?php echo base_url();?>/usuarios" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                