<?php

namespace CidadesBR\Models;

class CidadeModel extends BaseModel {
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        parent::__construct($mapper);
    }
    
    public function getCidades($params = [])
    {
        $this->params = $params;
        $this->formatParams();
        return $this->mapper->cidade[$this->params]->fetchAll();
    }
}

