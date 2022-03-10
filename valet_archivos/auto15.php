<?PHP 
include('conexion.php');

$fecha=date('Y-m-d');
$idvalet = $_POST['idvalet'];
//$idvalet ='1';

//POR ESTACIONAR
$query = 'SELECT COUNT(id) FROM automovil WHERE id_valet="'.$idvalet.'"  AND Date_format(DATE(date(`fecha_registro`)),"%Y-%m-%d")= "'.$fecha.'" AND estatus=1';

$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) > 0){
  	 while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo json_encode($row);
    }
    
//ESTACIONADOS
        $query2 = 'SELECT COUNT(id) FROM automovil WHERE id_valet="'.$idvalet.'" AND Date_format(DATE(date(`fecha_registro`)),"%Y-%m-%d")= "'.$fecha.'" AND estatus=2';

        $result2 = mysqli_query($conn, $query2) or die('error: ' .mysql_error());

        if (mysqli_num_rows($result2) > 0){
        while ($row2 = $result2->fetch_array(MYSQLI_NUM)) {
        echo json_encode($row2);
        }
//SOLICITADOS
                $query3 = 'SELECT COUNT(id) FROM automovil WHERE id_valet="'.$idvalet.'" AND Date_format(DATE(date(`fecha_registro`)),"%Y-%m-%d")= "'.$fecha.'" AND estatus=3';

                $result3 = mysqli_query($conn, $query3) or die('error: ' .mysql_error());

                if (mysqli_num_rows($result3) > 0){
                while ($row3 = $result3->fetch_array(MYSQLI_NUM)) {
                echo json_encode($row3);
                }
//ENTREGADOS
                        $query4 = 'SELECT COUNT(id) FROM automovil WHERE id_valet="'.$idvalet.'" AND Date_format(DATE(date(`fecha_registro`)),"%Y-%m-%d")= "'.$fecha.'" AND estatus=4';

                        $result4 = mysqli_query($conn, $query4) or die('error: ' .mysql_error());

                        if (mysqli_num_rows($result4) > 0){
                        while ($row4 = $result4->fetch_array(MYSQLI_NUM)) {
                        echo json_encode($row4);
                        }



                        } else {
                        echo "error";
                        }


                } else {
                echo "error";
                }


        } else {
        echo "error";
        }
    
} else {
    echo "error";
}



?>
