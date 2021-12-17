<?php

namespace App\Model;

use MF\Model\Model;

class Tweet extends Model{
    private $id;
    private $id_usuario;
    private $tweet;
    private $data;
    private $img;

    public function __get($atributo)
{
    return $this->$atributo;
}
public function __set($atributo, $valor)
{
    $this->$atributo = $valor;
}
public function Salvar()
{
    $query = "insert into tweets(id_usuario,tweet)values(:id_usuario,:tweet)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    $stmt->bindValue(':tweet',$this->__get('tweet'));
    $stmt->execute();

    return $this;

}
//recuperar com paginação
public function getPorPagina($limit,$offset){
    $query = "select t.id,t.id_usuario,t.tweet,DATE_FORMAT(t.data,'%d/%m/%Y %H:%i') as data,u.nome
    FROM tweets as t
    left join usuarios as u on (t.id_usuario = u.id)
     where t.id_usuario = :id_usuario
     or t.id_usuario in (select id_usuario_seguindo from usuarios_seguidores
     where id_usuario = :id_usuario)
     order by t.data desc
     limit
     $limit
     offset
     $offset";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

//recuperar com total
public function getTotalregistros(){
    $query = "select count(*) as total
    FROM tweets as t
    left join usuarios as u on (t.id_usuario = u.id)
     where t.id_usuario = :id_usuario
     or t.id_usuario in (select id_usuario_seguindo from usuarios_seguidores
     where id_usuario = :id_usuario)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_ASSOC);
}
public function excluir(){
    $query = "DELETE from tweets where id = :id_tweet and id_usuario = :id_usuario";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_tweet',$this->__get('id'));
    $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    $stmt->execute();

    return true;
}
}

?>