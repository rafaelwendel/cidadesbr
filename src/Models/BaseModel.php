<?php

namespace CidadesBR\Models;

abstract class BaseModel {
    protected $mapper = null;
    protected $params = null;
    
    public function __construct(\Respect\Relational\Mapper $mapper) 
    {
        $this->mapper = $mapper;
    }
    
    protected function formatParams()
    {
        $this->params = explode('/', $this->params);
        if(is_array($this->params) && count($this->params) > 0){
            /* A logica segue param1/value1/param2/value2/paramN/valueN
             * Se o numero de "params" for impar ou o ultimo for vazio, exclui o ultimo
             */
            if(count($this->params) % 2 != 0 || $this->params[count($this->params) - 1] == ''){
                array_pop($this->params);
            }
            $paramsTemp = $this->params;
            $this->params = null;
            for($i = 0; $i < count($paramsTemp); $i = $i + 2){
                $this->params[$paramsTemp[$i]] = $paramsTemp[$i + 1];
            }
        }
    }
    
    protected function formatDataResponse($arrayData)
    {
        if(count($arrayData) == 0){
            return [
                'code'   => 404,
                'status' => 'empty data',
                'data'   => ''
            ];
        }
        return [
            'code'   => 200,
            'status' => 'success',
            'data'   => $arrayData
        ];
    }
}
