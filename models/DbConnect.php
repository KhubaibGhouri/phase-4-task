<?php
class DbConnect
{
	private $DbServerName="localhost";
	private $DbUserName="victorts_docter";
	private $DbPassword="Kkl7+Xn$]f{k";
	private $DbName="victorts_docter";/*DB NAME*/
	public $objDbConnect;
	public function __construct()
	{
		$this->objDbConnect=new mysqli($this->DbServerName,$this->DbUserName,$this->DbPassword,$this->DbName);
		return $this->objDbConnect;
	}
	public function ExecuteQry($qry)
	{
		$this->objDbConnect->query($qry);
		return $this->objDbConnect->insert_id;
	}
	public function GetData($sql)
	{
		$resultset=$this->objDbConnect->query($sql);
		return $resultset;
	}


	
}
?>