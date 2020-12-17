<?php

namespace CidadesBR\Models;

class EstadoModel extends BaseModel {
    
    protected $fields = ['coduf', 'sigla', 'nome', 'capital', 'numeromunicipios', 'regiao'];
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        parent::__construct($mapper);
    }
    
    public function getEstados($params = [])
    {
        $this->params = $params;
        $this->formatParams();
        return $this->formatDataResponse(
            $this->mapper->estado[$this->params]->fetchAll($this->addExtras())
        );
    }
}

