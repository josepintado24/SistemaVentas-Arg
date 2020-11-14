<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors(); ?>
                            </div>
                        <?php }?>
                        <form method="POST" action="<?php echo base_url();?>/usuarios/actualizar" autocomplete="off">
                        <input type ="hidden" id="id" name="id" value="<?php echo $datos['id']; ?>">
                           <div class="form-group">
                               <div class="row">
                                   <div class="col-12 col-sm-6">
                                       <label for="">usuario</label>
                                       <input disabled class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $datos['usuario'];?>"  >
                                   </div>

                                   <div class="col-12 col-sm-6">
                                       <label for="">Nombre</label>
                                       <input class="form-control" id="nombre" name="nombre" typr="text" value="<?php echo $datos['nombre'];?>" >
                                   </div>
                               </div>    
                           </div>
                           <div class="form-group">
                               <div class="row">
                                   <div class="col-12 col-sm-6">
                                       <label for="">contraseña</label>
                                       <input type="password" class="form-control" id="password" name="password" typr="text" value="" >
                                   </div>

                                   <div class="col-12 col-sm-6">
                                       <label for="">Repite contraseña</label>
                                       <input type="password" class="form-control" id="repassword" name="repassword" typr="text" value="" >
                                   </div>
                               </div>    
                           </div>
                           <div class="form-group">
                               <div class="row">
                                   <div class="col-12 col-sm-6">
                                       <label for="">Cajas</label>
                                       <Select class="form-control" id="id_caja" name="id_caja" typr="text"  >
                                           <option value="">  Seleccionar caja </option> 
                                           <?php foreach($cajas as $caja){ ?>
                                               <option value="<?php echo $caja['id'];?>" <?php  if ($caja['id']==$datos['id_caja']){ echo 'selected'; } ?> > 
                                                    <?php echo $caja['nombre']; ?>  
                                               </option> 
                                           <?php  }?>
                                       </select>
                                   </div>
                                   
                                   <div class="col-12 col-sm-6">
                                   <label for=""  >Roles</label>
                                       <Select  class="form-control" id="id_rol" name="id_rol" typr="text"  >
                                           <option value="">  Seleccionar Roles </option> 
                                           <?php foreach($roles as $rol){ ?>
                                               <option value="<?php echo $rol['id'];?>" <?php  if ($rol['id']==$datos['id_rol']){ echo 'selected'; } ?> > 
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
                