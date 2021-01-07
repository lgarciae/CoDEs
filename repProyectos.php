<?php
        require('./fpdf/fpdf.php');
        require('conectDB.php');

        class PDF extends FPDF {
            // Cabecera de página
            function Header()
            {
                // Logo
                $this->Image('./img/imagen.png',10,8,33);
                // Arial bold 12
                $this->SetFont('Arial','B',10);
                // Movernos a la derecha
                $this->Cell(110);
                // Título
                $this->Cell(30,10,'REPORTE DE PROYECTOS',0,0,'C');

                $this->Cell(65);
                $this->Cell(30,10,'FECHA IMPRESION ' . date("d-m-Y"),0,0,'L');
                // Salto de línea
                $this->Ln(20);
            }

            // Pie de página
            function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(0,10,'COORDINACION DE DESARROLLO | PAGINA '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }

        /* Creación del objeto de la clase heredada */
        $pdf = new PDF('L','mm','Letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',8);
        //Agregamos las columnas de los encabezados, longitud 10 = 1 cm; el Titulo;1,0 -> es para definir columnas adyacentes; 'C' Centrada; 0 no hay salto de linea.
        $pdf->Cell(10,6,"ID",1,0,'C',0);
        $pdf->Cell(60,6,"PROYECTO",1,0,'C',0);
        $pdf->Cell(60,6,"SOLICITO",1,0,'C',0);
        $pdf->Cell(60,6,"COLABORADOR(ES)",1,0,'C',0);
        $pdf->Cell(20,6,"FECHA INICIO",1,0,'C',0);
        $pdf->Cell(30,6,"FASE",1,0,'C',0);
        $pdf->Cell(20,6,"FECHA FINAL",1,1,'C',0);

        //Obtenemos los datos a mandar al Reporte
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=bdcdes','root','');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $sql = $conexion->prepare('SELECT * FROM proyectos where pr_baja <> 1');
        $sql->execute(array());
        $resultado = $sql->fetchAll();

  ?>

    <?php

    foreach($resultado as $fila):
          $pdf->Cell(10,6,$fila['id_proyecto'],1,0,'C');
          $pdf->Cell(60,6,substr(utf8_decode($fila['pr_nombre']),0,32),1,0,'L');
          $pdf->Cell(60,6,substr(utf8_decode($fila['pr_solicito']),0,30),1,0,'L');
          $pdf->Cell(60,6,substr(utf8_decode($fila['pr_colaboradores']),0,30),1,0,'L');
          $pdf->Cell(20,6,date("d-m-Y",strtotime($fila['pr_inicio'])),1,0,'C');
          $pdf->Cell(30,6,substr(utf8_decode($fila['pr_status']),0,15),1,0,'L');
          $pdf->Cell(20,6,date("d-m-Y",strtotime($fila['pr_fin'])),1,1,'C');
    endforeach

    ?>
    <?php
        $pdf->Output();
    ?>
