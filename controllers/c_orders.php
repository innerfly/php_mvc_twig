<?php

class Orders extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $vars = array(
          'title' => 'Manage orders',
          'orders' => $this->model->orderList(),
        );
        
        $this->view->display('orders/index.html.twig', $vars);
    }


    public function add()
    {
        if (count($_POST)) {
            $this->model->add($_POST);
            header('Location: /orders');
        };

        $fields = $this->getFields();

        $vars = array(
          'title' => 'Add new order',
          'form' => $this->formHelper($fields),
        );

        $this->view->display('orders/add.html.twig', $vars);
    }

    public function edit($id)
    {
        if (count($_POST)) {
            $this->model->edit($id, $_POST);
            header('Location: /orders');
        };

        $order = $this->model->getOrder($id)[0];
        $fields = $this->getFields();

        $vars = array(
          'title' => "Edit order #" . $order['id'],
          'form' => $this->formHelper($fields, $order),
        );

        $this->view->display('orders/edit.html.twig', $vars);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: /orders');
    }

    
    /**
     *  Helpers
     */
    
    public function formHelper($fields, $values = null)
    {
        $output = '';
        foreach ($fields as $k => $v) {
            $val = (isset($values) && !empty($values[$k])) ? "$values[$k]" : '';

            $output .= "<div>";
            $output .= "<label for='$k'>$v</label>";
            $output .= "<input type='text' name='$k' id='$k' value='$val'>";
            $output .= "</div>";
        }

        return $output;
    }

    public function getFields()
    {
        $fields = array(
          'amount' => 'Amount, $',
          'name' => 'Name',
          'address' => 'Address',
          'zip' => 'ZIP',
          'city' => 'City',
          'country' => 'Country',
          'email' => 'Email',
          'phone' => 'Phone',
        );

        return $fields;
    }

}