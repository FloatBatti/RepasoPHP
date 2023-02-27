<?php 
namespace DAO;

use Exception;
use Models\OrderStatus as OrderStatus;

class StatusDAO{

    private $connection;

    public function GetAll(){

        $query = "SELECT * FROM orderstatus";

        $this->connection = Connection::GetInstance();

        $statusList = array(); // Creo una lista de status donde voy agregando los objetos en el foreach.

        try {
            
            $result = $this->connection->Execute($query);

            foreach ($result as $row) {

                $status = new OrderStatus();  // Creo el objeto OrderStatus.

                $status->setOrderStatusId($row["orderStatusId"]);
                $status->setDescription($row["description"]);
   
                array_push($statusList, $status); // Agrego el objeto OrderStatus a la lista.
            }

            return $statusList;  // Devuelvo la lista de objetos OrderStatus.

        } catch (Exception $ex) {

            //throw new Exception("Error en la base de datos. Intente más tarde.");
            throw $ex->getMessage();
        }
    }

}

?>