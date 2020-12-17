<?php

namespace CidadesBR\Models;

class CidadeModel extends BaseModel {
    
    protected $fields = [
        'codmun', 'nome', 'populacao', 'unidadeterritorial',
        'densidadedemografica', 'gentilico', 'coduf'
    ];
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        parent::__construct($mapper);
    }
    
    public function getCidades($params = [])
    {
        $this->params = $params;
        $this->formatParams();
        return $this->formatDataResponse(
            $this->mapper->cidade[$this->params]->fetchAll($this->addExtras())
        );
    }
}

