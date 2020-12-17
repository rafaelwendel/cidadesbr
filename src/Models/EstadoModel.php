<?php

namespace CidadesBR\Models;

class EstadoModel extends BaseModel {
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        parent::__construct($mapper);
    }
    
    public function getEstados($params = [])
    {
        $this->params = $params;
        $this->formatParams();
        return $this->mapper->estado[$this->params]->fetchAll();
    }
}

