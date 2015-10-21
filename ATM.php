
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ATM</title>
    </head>

    <body>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
        body {
          background-color: #FFFFCC;
       }

        </style>
        <h1>W E L C O M E </h1>
        <form id="cajero" action="" method="POST">
            <label for="cant">Amount:</label>
            <input id="cant" name="cant"  type="number"  autocomplete="off"/>
            <input type="submit" value="OK"/>
        </form>
    </body>
</html>

<?php
if($_POST){
        if(isset($_POST['cant'])&& $_POST['cant']!="" ){
         $cant=$_POST['cant'];
         $num_billete=array(0,0,0,0);
         $denominacion=array(100,50,20,10);
       
         
            if (($cant%10)==0 && $cant>0 )
            {
                $cant_actual=$cant;
                for($i=0;$i<4;$i++)
                {
                    if($cant_actual>0 && $cant_actual>=$denominacion[$i])
                    {
                        $aux_cant=$cant_actual;
                        $cant_actual=$cant_actual% $denominacion[$i];
                        $num_billete[$i]=($aux_cant-$cant_actual)/$denominacion[$i];
                    }
                }

                echo"TAKE YOUR MONEY: ";
                echo "<br>";
                echo "<br>";

                echo'<table style="width:50%">';
                   echo'<tr>
                        <th>Denomination </th>
                        <th>Numbers of banknotes</th>       
                
                       </tr>
                 ';

            

                 for($i=0;$i<4;$i++)

                    if ($num_billete[$i]>0)

                    {
                        echo' <tr>';    
                        echo'<td>'.$denominacion[$i].'</td>';
                        echo'<td>'.$num_billete[$i].'</td>';                      
                        echo' </tr>';
                    }
                 echo'</table>';
         

            }
            else
            {
                $msg="Invalid Amount ";
                echo " 
                <script language='JavaScript'> 
                alert('$msg'); 
                //status es el contenido del error 
                </script>";
            }
                
           
        }else{
            $msg="Enter Amount";
            echo " 
            <script language='JavaScript'> 
            alert('$msg'); 
            //status es el contenido del error 
            </script>";
                 //  print_r($_SERVER);
        }
}
?>