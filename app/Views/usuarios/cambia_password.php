<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors(); ?>
                            </div>
                        <?php }?>
                       
                            <form method="POST" action="<?php echo base_url();?>/usuarios/actualizar_password" autocomplete="off">
                              
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">usuario</label>
                                            <input disabled value="<?php echo $usuario['usuario']; ?> " class="form-control" id="usuario" name="usuario" type="text" autofocus >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">nombre</label>
                                            <input disabled value="<?php echo $usuario['nombre'];?> " class="form-control" id="nombre" name="nombre" type="text" >
                                        </div>
                                    </div>    
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">contraseña</label>
                                            <input  value="" class="form-control" id="password" name="password" type="password" autofocus >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Confirma contraseña</label>
                                            <input  value="" class="form-control" id="repassword" name="repassword" type="password" >
                                        </div>
                                    </div>    
                                </div>
                               
                                    <a href="<?php echo base_url();?>/usuarios" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            <?php if (isset($mensaje)) {?>
                                <div class="alert alert-success">
                                        <?php echo $mensaje; ?>
                                </div>
                            <?php }?>
                          
                        
                    </div>
                </main>
                