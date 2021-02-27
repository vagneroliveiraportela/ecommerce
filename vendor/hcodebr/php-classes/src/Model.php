<?php
namespace Hcode;
class Model{
	private $values = [];
	public function __call($name, $args=array()){

		$method = substr($name, 0, 3);// get em 3 caracteres position 0 ate 2
		$fieldName = substr($name, 3, strlen($name));// get no restante dos caracteres iniciando position 3
		
		switch ($method) {
			case "get":
				return (isset($this->values[$fieldname])) ? $this->values[$fieldname] : NULL;
				break;

			case "set":
				$this->values[$fieldName]=$args[0];
				break;
			
		}

	}
	public function setData($data = array()){
		foreach ($data as $key => $value) {
			// criando dinamicamenete um setKey($value)
			$this->{"set".$key}($value);
		}
	}
	public function getData(){
		return $this->values;
	}
}
?>