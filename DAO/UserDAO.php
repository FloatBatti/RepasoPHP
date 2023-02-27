<?php 
namespace DAO;

use Models\User as User;
use Exception;

class UserDAO{

    private $connection;

    public function Get(string $email){

        $query= "select * from users u where u.email = :email";

        // Poner los parametros con : al costado y que coincidan con el nombre de la columna en la base de datos.

        $parameters["email"] = $email;  // Este email es el que se pone en el query con :

        $this->connection = Connection::GetInstance();

        $user = null;

        try {

            $resultSet = $this->connection->Execute($query, $parameters);

            if($resultSet){ 

                $user = new User();

                $reg = $resultSet[0]; // Se pone cero porque es un solo registro.
                                      // Es el set de resultados en la primer posicion.

                $user->setUserId($reg["userId"]); // El String que se pone entre comillas es el nombre de la columna 
                                                  //en la base de datos (tiene que ser igual, lo consulto en Schema).
                $user->setEmail($reg["email"]);
                $user->setPassword($reg["password"]);
                
            }
            
            
        } catch (Exception $ex) {
            
            // Esto siempre igual.
            throw new Exception("Error en la base de datos. Intentelo más tarde");

        }

        return $user;

    }

    public function GetAll(){


    }


}

?>