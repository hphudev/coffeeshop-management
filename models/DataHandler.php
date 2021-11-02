<?php

class DataHandler
{
	private $connection;

    	private function ConnectDatabase($internetProtocolAddress, $username, $password, $databaseName)
    	{
        	return mysqli_connect($internetProtocolAddress, $username, $password, $databaseName);
    	}
    
	public function __construct()
	{
		// Các bạn chỉnh các tham số của hàm ConnectDatabase trong hàm khởi tạo cho phù hợp với máy tính của mình nha
		$this->connection = $this->ConnectDatabase('127.0.0.1', 'root', '27112001', 'CoffeeShop') or die('Lỗi kết nối đến csdl.');
		$this->connection->query("SET NAMES 'utf8mb4'");
		$this->connection->query("SET CHARACTER SET utf8mb4");
		$this->connection->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");
	}
	
	private function ExecuteQuery($sqlQuery)
	{
	    return mysqli_query($this->connection, $sqlQuery);
	}
	
	private function GetDataInRow($data)
	{
	    return mysqli_fetch_array($data, MYSQLI_ASSOC);
	}
	
	public function ReadData($table, $column = '*', $condition = true)
	{
	    $sqlQuery = "SELECT $column FROM $table WHERE $condition";
	    $data = $this->ExecuteQuery($sqlQuery);
	    $result = [];
	    
	    while ($row = $this->GetDataInRow($data))
	    {
	        $result[] = $row;
	    }
	    
	    return $result;
	}
	
	private function ConnectStringElementInArray($seperator, $array)
	{
	    return implode($seperator, $array);
	}
	
	public function InsertData($table, $data)
	{
	    $formattedData = [];
	    
	    foreach ($data as $value)
	    {
	        $formattedData[] = "N'$value'";
	    }
	    
	    $valueToInsert = $this->ConnectStringElementInArray(', ', $formattedData);
	    
	    $sqlQuery = "INSERT INTO $table VALUES ($valueToInsert)";
	    $this->ExecuteQuery($sqlQuery);
	}
	
	public function UpdateData($table, $change, $condition)
	{
	    $sqlQuery = "UPDATE $table SET $change WHERE $condition";
	    $this->ExecuteQuery($sqlQuery);
	}
	
	public function DeleteData($table, $condition)
	{
	    $sqlQuery = "DELETE FROM $table WHERE $condition";
	    $this->ExecuteQuery($sqlQuery);
	}
	
	private function CloseConnection()
	{
	    mysqli_close($this->connection);
	}
	
	public function __destruct()
	{
	    $this->CloseConnection();
	}
}

new DataHandler();
?>