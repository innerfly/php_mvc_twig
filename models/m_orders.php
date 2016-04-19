<?php

class Orders_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function orderList()
    {
        $query = 'SELECT * FROM orders';
        $sth = $this->prepare($query);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function add($data)
    {
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO orders (`$fieldNames`) VALUES ($fieldValues)";
        $sth = $this->prepare($query);

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function edit($id, $data)
    {
        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $query = "UPDATE orders SET $fieldDetails WHERE id = :id";
        $sth = $this->prepare($query);

        $data['id'] = $id;
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM orders WHERE id = :id';
        $sth = $this->prepare($query);
        $sth->execute(array(':id' => $id));
    }

    public function getOrder($id)
    {
        $query = 'SELECT * FROM orders WHERE id = :id LIMIT 1';
        $sth = $this->prepare($query);
        $sth->execute(array(':id' => $id));

        return $sth->fetchAll();
    }

}