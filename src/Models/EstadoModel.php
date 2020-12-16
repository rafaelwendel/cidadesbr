<?php

namespace CidadesBR\Models;

class EstadoModel {
    private $mapper = null;
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        $this->mapper = $mapper;
    }
    
    public function getEstados($conds = [])
    {
        return $this->mapper->estado[$conds]->fetchAll();
    }
}

