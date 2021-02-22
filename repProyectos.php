<?php
        require('./fpdf/fpdf.php');
        require('conectDB.php');

        class PDF extends FPDF {
            // Cabecera de página
            function Header()
            {
                // Logo
                $this->Image('./img/imagen.png',10,6,33);
                // Arial bold 12
                $this->SetFont('Arial','B',8);
                // Movernos a la derecha
                $this->Cell(110);
                // Título
                $this->Cell(30,6,'DIRECCION DE ADMINISTRACION - LISTADO DE ACUERDOS',0,0,'C');

                $this->Cell(70);
                $this->Cell(30,6,'FECHA ACTUALIZACION: ' . date("d-m-Y"),0,0,'L');
                // Salto de línea
                $this->Ln(15);
            }
            // Pie de página
            function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',7);
                // Número de página
                $this->Cell(0,10,'GERENCIA DE TECNOLOGIAS | PAGINA '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }

        /* Creación del objeto de la clase heredada */
        $pdf = new PDF('L','mm','Letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',7);
        //Agregamos las columnas de los encabezados, longitud 10 = 1 cm; el Titulo;1,0 -> es para definir columnas adyacentes; 'C' Centrada; 0 no hay salto de linea.
        $pdf->Cell(25,4,"FECHA ACUERDO",1,0,'C',0);
        $pdf->Cell(145,4,"ACUERDO",1,0,'C',0);
        $pdf->Cell(40,4,"RESPONSABLE(S)",1,0,'C',0);
        $pdf->Cell(25,4,"ESTATUS",1,0,'C',0);
        $pdf->Cell(30,4,"FECHA COMPROMISO",1,1,'C',0);

        //Obtenemos los datos a mandar al Reporte
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=bdcdes','root','');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $sql = $conexion->prepare('SELECT * FROM proyectos where pr_baja <> 1 AND pr_acuerdo <> 0 ORDER BY pr_inicio ASC');
        $sql->execute(array());
        $resultado = $sql->fetchAll();

  ?>

    <?php
        foreach($resultado as $fila):
              $pdf->Cell(25,4,date("d-m-Y",strtotime($fila['pr_inicio'])),1,0,'C');
              $pdf->Cell(145,4,substr(utf8_decode($fila['pr_nombre']),0,100),1,0,'L');
              $pdf->Cell(40,4,substr(utf8_decode($fila['pr_colaboradores']),0,30),1,0,'C');
              $pdf->Cell(25,4,substr(utf8_decode($fila['pr_status']),0,15),1,0,'C');
              $pdf->Cell(30,4,date("d-m-Y",strtotime($fila['pr_fin'])),1,1,'C');
              //$pdf->MultiCell(260,4,htmlentities($fila['pr_notas']),0,'L');
        endforeach
    ?>
    <?php
        $pdf->Output();
    ?>
