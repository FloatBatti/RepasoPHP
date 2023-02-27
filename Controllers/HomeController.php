<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;

    class HomeController
    {
        private $UserDAO;

        public function __construct()
        {
            $this->UserDAO = new UserDAO();
        }


        public function Index()
        {
            require_once(VIEWS_PATH."index.php");
        }

        public function Login($email, $password)
        {

            $user = $this->UserDAO->Get($email);

            if($user) // null es false
            {
                if($user->getPassword() == $password)
                {
                    $_SESSION["UserId"] = $user->getUserId(); // Creamos la sesion que se va a estar checkeando siempre.

                    // A continuacion me lleva al otro controlador. Solo en este caso.
                    // Con el header es como en el action. Se pone el controller y el metodo.
                    header("location: ../Order/OrderPendingView");
                }
                else
                {
                    header("location: ../Home");
                }
            }
            
        }

        function Logout()
        {
            require_once(VIEWS_PATH."logout.php");
        }
    }
?>