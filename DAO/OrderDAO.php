<?php 

namespace DAO;

use Exception;
use Models\Order as Order;

class OrderDAO{

    private $connection;

    public function Add(Order $order){

        $query = "INSERT INTO orders (orderId, orderStatusId, description, price) 
        VALUES (:orderId, :orderStatusId, :description, :price)";

        $parameters["orderId"] = $order->getOrderId();
        $parameters["orderStatusId"] = $order->getOrderStatusId();
        $parameters["description"] = $order->getDescription();
        $parameters["price"] = $order->getPrice();

        $this->connection = Connection::GetInstance();

        try {
            
            return $this->connection->ExecuteNonQuery($query, $parameters);

            // resultado = 1 si se ejecuto correctamente.
            // resultado = 0 si no se ejecuto correctamente.


        } catch (Exception $ex) {

            //throw new Exception("Error en la base de datos. Intente más tarde.");
            throw $ex->getMessage();
        }


    }

    public function GetAll(){

        $query = "SELECT * FROM orders";

        $this->connection = Connection::GetInstance();

        $orderList = array(); // Creo la lista de ordenes.

        try {
            
            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row) {

                $order = new Order();  // Creo el objeto Order.

                $order->setOrderId($row["orderId"]);
                $order->setOrderStatusId($row["orderStatusId"]);
                $order->setDescription($row["description"]);
                $order->setPrice($row["price"]);
   
                array_push($orderList, $order); // Agrego el objeto Order a la lista de ordenes.
            }

            return $orderList;

        } catch (Exception $ex) {

            //throw new Exception("Error en la base de datos. Intente más tarde.");
            throw $ex->getMessage();
        }
    }

    public function Delete($orderId){

        $query="DELETE FROM orders WHERE orderId = :orderId";

        $parameters["orderId"] = $orderId;

        $this->connection = Connection::GetInstance();

        try {
            
            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (Exception $ex) {

            //throw new Exception("Error en la base de datos. Intente más tarde.");
            throw $ex->getMessage();
        }
    }

}
?>