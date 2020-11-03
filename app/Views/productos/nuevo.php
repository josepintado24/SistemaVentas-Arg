<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php \Config\Services::validation()->listErrors(); ?>

                            <form method="POST" action="<?php echo base_url();?>/productos/insertar" autocomplete="off">
                            <?php csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">código</label>
                                            <input class="form-control" id="codigo" name="codigo" typr="text" autofocus require>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre</label>
                                            <input class="form-control" id="nombre" name="nombre" typr="text" require>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Unidad</label>
                                            <Select class="form-control" id="id_unidad" name="id_unidad" typr="text"  require>
                                                <option value="">  Seleccionar unidad </option> 
                                                <?php foreach($unidades as $unidad){ ?>
                                                    <option value="<?php echo $unidad['id']; ?>">  <?php echo $unidad['nombre_corto']; ?></option> 
                                                <?php  }?>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                        <label for="">Categoria</label>
                                            <Select class="form-control" id="id_categoria" name="id_categoria" typr="text"  require>
                                                <option value="">  Seleccionar Categoria </option> 
                                                <?php foreach($categorias as $categoria){ ?>
                                                    <option value="<?php echo $categoria['id']; ?>">  <?php echo $categoria['nombre']; ?></option> 
                                                <?php  }?>
                                            </select>
                                        </div>
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio venta</label>
                                            <input class="form-control" id="precio_venta" name="precio_venta" typr="text"  require>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio compra</label>
                                            <input class="form-control" id="precio_compra" name="precio_compra" typr="text" require>
                                        </div>
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Stock minimo</label>
                                            <input class="form-control" id="stock_minimo" name="stock_minimo" typr="text"  require>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Es inventariable</label>
                                            <select class="form-control" name="inventariable" id="inventariable">
                                                 <option value="1">Si </option>
                                                 <option value="0">No </option>
                                            </select>
                                        </div>
                                    </div>    
                                </div>
                                    <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                