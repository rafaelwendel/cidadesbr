<?php
namespace CidadesBR\Config;

use Respect\Relational\Mapper;

class Connection {
    
    public static function getConnection()
    {
        try{
            return new Mapper(
                new \PDO('sqlite:' . __DIR__ . '/../Db/cidades.db')
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}