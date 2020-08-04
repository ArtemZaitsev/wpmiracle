<?
abstract class Unit{
	
	public function __construct(int $id){
		$this->id = $id; 
		
		$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$this->mysqli->query("SET lc_time_names = 'ru_RU'");
		$this->mysqli->query("SET NAMES 'utf8'");	
	}
	
	public function setTable(){
		return $this->table;
	}
	
	public function getTable($table){
		$this->table = $table;
	}
	
	public function title(){
		return $this->getField('title');
	}
		
	public function getLine() : array {
        $result = mysqli_query($this->mysqli, 'SELECT * FROM '.$this->setTable().' WHERE id='.$this->id);
        $row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	public function getField($field){
		return ($this->getLine())[$field];
	}
	
	public function deleteLine(){
        $result = mysqli_query($this->mysqli, 'DELETE FROM '.$this->setTable().' WHERE id='.$this->id);
        if($result){
			return true;
		}		
		return false;
	}
	
	
	public function createLine(array $fields, array $values){
		$fields_line = implode(',',$fields);
		$values_line = '';
		foreach($values as $value){
			$values_line = $values_line."'".$value."',";
		}
		$values_line = trim($values_line,',');

		// echo $fields_line;
		// echo '<br>';
		// echo $values_line;
		
		// echo "INSERT INTO ".$this->setTable()."($fields_line) VALUES($values_line)";
		
        $result = mysqli_query($this->mysqli, "INSERT INTO ".$this->setTable()."($fields_line) VALUES($values_line)");
		
		// if($result==false)
		// printf("error: %s\n", mysqli_errno($this->mysqli));
		// printf("Query failed: %s\n", mysqli_connect_error());
		
		
		if($result){
			return true;
		}		
		return false;
	}
	
			
	public function getAllUnitsId(){
		$arr =[];
        $result = mysqli_query($this->mysqli, 'SELECT id FROM '.$this->setTable());
        while($row = mysqli_fetch_assoc($result)){
			$arr[] = $row['id'];
		}
		return $arr;  
	}
		
	
	
}