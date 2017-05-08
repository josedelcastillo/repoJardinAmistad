<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of bd
 *
 * @author Jose
 */
class BD {
    
    
    static function conectar() {
	/*
	$servername = "127.0.0.1";
    $username = "maxitasa";
    $password = "maxi123";
    $dbname = "maxitasa";
	*/
	$servername = "127.0.0.1";
	$username = "marcador";
	$password = "marca123";
	$dbname = "marcador";
	
        $conn = new mysqli($servername, $username, $password,$dbname);
		mysqli_set_charset(  $conn , 'utf8' );
        if ($conn->connect_error) {
            error_log("Connection failed: " . $conn->connect_error); 
			die("Connection failed: " . $conn->connect_error);
		}
        
        return $conn;
    }
    static function ejecutarQuerySimple($sql) {
        $conn=BD::conectar();
		//$sql = $conn->real_escape_string($sql);
        $result = mysqli_query($conn,$sql);
		
		
        $return=false;
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error($conn));
            $return= "Error";
        }
        mysqli_close($conn);
     
    }
    static function ejecutarQuerySimpleConEcho($sql) {
        $conn=BD::conectar();
        //$sql = $conn->real_escape_string($sql);
        $result = mysqli_query($conn,$sql);
        
        
        $return=false;
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error($conn));
            $return= "Error";
        }
        mysqli_close($conn);
     
    }
    static function ejecutarQuerySimpleSinEcho($sql) {
        $conn=BD::conectar();
        //$sql = $conn->real_escape_string($sql);
        $result = mysqli_query($conn,$sql);
        
        
        $return=false;
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error($conn));
            $return= "Error";
        }
        mysqli_close($conn);
     
    }

    static function ejecutarQuerySimpleQuery($sql,$campos) {
        $conn=BD::conectar();
        $campos_cadena="";
        
        foreach($campos as $key=>$campo){
            if ($key!=0){
               $campos_cadena.=",";
            }
            if ($campo['tipo']=="string")
                $campos_cadena.="'".mysqli_real_escape_string($campo['valor'],$conn)."'";
            else
                if ($campo['tipo']=="fechaNow")
                    $campos_cadena.="now()";
                else
                $campos_cadena.=$campo['valor'];
        }
        $sql=$sql." (".$campos_cadena.")";
        
        $result = mysqli_query($conn,$sql);
        $id=mysqli_insert_id();
        $return=false;
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error());
            $return= "Error";
        }              
        mysqli_close($conn);
        return !$return?$id:$return;
    }

    function ejecutarQueryUpdate($sql,$campos,$where){
        $conn=BD::conectar();
        $campos_cadena="";
        
        foreach($campos as $key=>$campo){
            if ($key!=0){
               $campos_cadena.=",";
            }
            if ($campo['tipo']=="string")
                $campos_cadena.=$campo['nombre']."='".mysqli_real_escape_string($campo['valor'],$conn)."'";
            else
                $campos_cadena.=$campo['nombre']."=".$campo['valor'];
        }
        $sql=$sql." ".$campos_cadena." ".$where;
        
        $result = mysqli_query($conn,$sql);
        $return=false;
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error());
            $return= "Error";
        }
        mysqli_close($conn);
        return !$return?$id:$return;
    }

    static function ejecutarQuerySelectUnitario($sql) {
        $conn=BD::conectar();
        $result = mysqli_query($conn,$sql);
        
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error());
            $return= "Error";
        }
        else
        {
            if (mysqli_num_rows($result) == 0) {
                error_log("No rows found, nothing to print so am exiting $sql");
                $return= false;
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $return= $row;
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        
        return $return;
    }
    static function ejecutarQuerySelect($sql) {
        $conn=BD::conectar();
        $result = mysqli_query($conn,$sql);
        $return=  array();
        if (!$result) {
			
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error());
            $return= "Error";
        }
        else
            {
                if (mysqli_num_rows($result) == 0) {
                    error_log("No rows found, nothing to print so am exiting $sql");
                }
                if (is_array($return))
                    while ($row = mysqli_fetch_assoc($result)) {
                        $return[]= $row;
                    }
                mysqli_free_result($result);
            }
            
        mysqli_close($conn);
        return $return;
    }
    static function ejecutarQueryInsert($sql) {
        $conn=BD::conectar();
        $result = mysqli_query($conn,$sql);
        //echo $result;
        $return="OK";
        if (!$result) {
            error_log("Could not successfully run query ($sql) from DB: " . mysqli_error());
            $return= "Error";
        }
        mysqli_close($conn);
        return $return;
        
    }
    
    
}
?>