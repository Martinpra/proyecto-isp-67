<?php 
        require 'basededatos.php';
        require 'constante.php';
        require 'productos.php';
        require 'compras.php';

        $base = new Basededatos(SERVIDOR, USUARIO, PASSWORD, BASE);
        $compras = new Compras ($base);
        $compras->insertarCompra($_POST['nombre'], $_POST['descripcion'],$_POST['precio']);

                
        
      header("Location: unidad7.php?ok");
        ?>