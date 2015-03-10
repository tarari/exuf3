<?php
	require 'lib/config.php';

	class mpdo extends PDO{
		static  $instance;
		protected $conf;
		function __construct($conf){
			$this->conf=$conf;
			try{
                    
                    parent::__construct($this->conf['driver'].':host=' . $this->conf['dbhost']. ';dbname='
                    	.$this->conf['dbname'],$this->conf['dbuser'], $this->conf['dbpass']);
                }
                    catch (PDOException $e) {
                     echo $e->getMessage();
                 }

		}

		static function getInstance($c){
			if(!(self::$instance) instanceof self){
					self::$instance=new self($c);
				}
				return self::$instance;
		}

	}