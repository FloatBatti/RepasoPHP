<?php

namespace Controllers;

use DAO\OrderDAO as OrderDAO;
use DAO\StatusDAO as StatusDAO;
use Models\Order as Order;
use Exception;

class OrderController
{
    private $orderDAO;
    private $statusDAO;

    public function __construct()
    {
        $this->orderDAO = new OrderDAO();
        $this->statusDAO = new StatusDAO();
    }

    public function OrderPendingView()
    {
        if (isset($_SESSION["UserId"])) {

            $orderList = $this->orderDAO->GetAll();
            $statusList = $this->statusDAO->GetAll();
            require_once(VIEWS_PATH . "order-pending-list.php");
        }
    }

    public function OrderAddView()
    {
        if (isset($_SESSION["UserId"])) {
            $statusList = $this->statusDAO->GetAll();

            require_once(VIEWS_PATH . "order-add.php");
        }
    }

    public function OrderAdd($orderId, $orderStatusId, $description, $price)
    {
        $order = new Order($orderId, $orderStatusId, $description, $price);

        try {


            if ($this->orderDAO->Add($order)) {

                $this->OrderPendingView();
            } else {

                throw new Exception("Error al agregar la orden.");
            }
        } catch (Exception $ex) {

            var_dump($ex->getMessage());
        }
    }

    public function DeleteOrder($orderId)
    {
        try {

            if ($this->orderDAO->Delete($orderId)) {

                $this->OrderPendingView();
            } else {

                throw new Exception("Error al eliminar la orden.");
            }
        } catch (Exception $ex) {

            var_dump($ex->getMessage());
        }
    }
}
