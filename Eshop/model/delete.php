<?php
/* Function to Take all data about a Type */
    function DeleteByID($id, $table){
        include('connection.php');
        $query = "DELETE FROM tshirt WHERE :table = :id";
        $query_params = array(':id'=>$id, 'table'=>$table);

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