<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors(); ?>
                            </div>
                       <?php }?>
                            <form method="POST" action="<?php echo base_url();?>/productos/actualizar" autocomplete="off">
                            
                            <input type ="hidden" id="id" name="id" value="<?php echo $producto['id']; ?>">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">código</label>
                                            <input class="form-control" id="codigo" name="codigo" typr="text" value="<?php echo $producto['codigo']; ?>" autofocus  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre</label>
                                            <input class="form-control" id="nombre" name="nombre" typr="text" value="<?php echo $producto['nombre']; ?>">
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Unidad</label>
                                            <Select class="form-control" id="id_unidad" name="id_unidad" typr="text"  >
                                                <option value="">  Seleccionar unidad </option> 
                                                <?php foreach($unidades as $unidad){ ?>
                                                    
                                                    <option value="<?php echo $unidad['id']; ?>" <?php if ($unidad['id']==$producto['id_unidad']){ echo 'selected'; } ?> > 
                                                         <?php echo $unidad['nombre']; ?>  
                                                    </option> 
                                                <?php }?>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                        <label for="">Categoria</label>
                                            <Select class="form-control" id="id_categoria" name="id_categoria" typr="text"  >
                                                <option value="">  Seleccionar Categoria </option> 
                                                <?php foreach($categorias as $categoria){ ?>
                                                    <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id']==$producto['id_categoria']){ echo 'selected'; } ?> > 
                                                         <?php echo $categoria['nombre']; ?>  
                                                    </option> 
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio venta</label>
                                            <input value="<?php echo $producto['precio_venta']; ?>" class="form-control" id="precio_venta" name="precio_venta" typr="text"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio compra</label>
                                            <input  value="<?php echo $producto['precio_compra']; ?>" class="form-control" id="precio_compra" name="precio_compra" typr="text" >
                                        </div>
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Stock minimo</label>
                                            <input value="<?php echo $producto['stock_minimo']; ?>" class="form-control" id="stock_minimo" name="stock_minimo" typr="text"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Es inventariable</label>
                                            <select class="form-control" name="inventariable" id="inventariable">
                                                 <option value="1" <?php if($producto['inventariable']==1){echo 'selected';} ?>>Si </option>
                                                 <option value="0" <?php if($producto['inventariable']==0){echo 'selected';} ?>>No </option>
                                            </select>
                                        </div>
                                    </div>    
                                </div>
                                    <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                