<?php

namespace CidadesBR\Models;
use Respect\Relational\Sql as Sql;

abstract class BaseModel {
    protected $mapper = null;
    protected $params = null;
    protected $limit = null;
    protected $offset = null;
    protected $orderby = null;
    
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
            //retira o "orderby", "limit" e "offset" dos parâmetros e seta
            //nos atributos
            $this->formatLimitAndOffsetAndOrderBy();
            //valida os parâmetros
            $this->validateFields();
        }
    }
    
    //verifica se os params passados são válidos de acordo com os $fields
    //e exclui caso não sejam
    protected function validateFields()
    {
        if(is_array($this->params) && count($this->params) > 0){
            $param_keys = array_keys($this->params);
            foreach ($param_keys as $param){
                //se nao tiver no $fields, exclui ele dos params
                if(!in_array($param, $this->fields)){
                    unset($this->params[$param]);
                }
            }
        }
    }
    
    protected function formatLimitAndOffsetAndOrderBy()
    {
        if(is_array($this->params) && count($this->params) > 0){
            $terms = ['limit', 'offset', 'orderby'];
            foreach ($terms as $term){
                if(isset($this->params[$term])){
                    $this->$term = $this->params[$term];
                    unset($this->params[$term]);
                }
            }
        }
    }
    
    //add na query o "limit", "offset" e "orderby"
    protected function addExtras()
    {
        $terms = ['limit', 'offset'];
        $sql = new Sql();
        if(!is_null($this->orderby)){
            $sql->orderBy($this->orderby);
        }
        foreach ($terms as $term){
            if(!is_null($this->$term)){
                $sql->$term($this->$term);
            }
        }
        return $sql;
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
