<?php

    class Producto extends Conectar{
        public function get_producto()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE status=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_producto_x_id($prod_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function delete_producto($prod_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto SET status=0, date_delete= now() WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_producto($prod_nom, $prod_desc)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto (prod_id, prod_nom, prod_desc, date_create, date_update, date_delete, status) VALUES (NULL, ?, ?, now(), NULL, NULL, 1)";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$prod_nom);
            $sql-> bindValue(2,$prod_desc);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function update_producto($prod_id, $prod_nom, $prod_desc)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto SET prod_nom = ?, prod_desc = ?, date_update= now() WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$prod_nom);
            $sql-> bindValue(2,$prod_desc);
            $sql-> bindValue(3,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


    }

?>