<?php
/* Function to Take all data about a Type */
    function InsertTshirt($desc, $type, $prix, $img){
        include('connection.php');
        $query = "INSERT INTO tshirt (Tshirt_ID, Tshirt_Description, Tshirt_TypeID, Tshirt_Prise, Tshirt_IMG) VALUES (NULL, :desc, :type, :prix, :img)";
        $query_params = array(':desc'=>$desc, ':type'=>$type, ':prix'=>$prix, ':img'=>$img);

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex);
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
/**/
?>