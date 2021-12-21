<?php
/* Function to Take all data about a Type */
    function TakeAllInCat($name){
        include('connection.php');
        $query = "SELECT * FROM produits where Tshirt_TypeID = (select Type_ID from type where Type_Name = :name)";
        $query_params = array(':name' => $name);

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

/* Function to Take all data*/
    function TakeAllCat(){
        include('connection.php');
        $query = "SELECT Type_Name FROM type";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex);
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
/**/

/* Function to Take all data*/
    function TakeAll(){
        include('connection.php');
        $query = "SELECT * FROM produits";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex);
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
/**/

?>