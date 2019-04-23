<?


class MySQLHandler{
	
	private $hostname;
	private $username;
	private $password;
	private $database;
	private $link;
	private $successful;
	private $response=NULL;
	private $counter=NULL;
	private $insertID;
	private $error;
	
	// Construct the database handler class
	// configuration such as hostname, username
	// password and database name
	function __construct($dbConfig){
		$this->hostname = $dbConfig['hostname'];
		$this->username = $dbConfig['username'];
		$this->password = $dbConfig['password'];
		$this->database = $dbConfig['database'];
	}
	
	public function sendQuery($mysqlQuery, $insert=false){
		// Attempt to connect to the database, or die and return the mysql_error()
		$this->link = mysqli_connect($this->hostname, $this->username, $this->password) or die(mysqli_error());
		// If the connection was successful, select the database or die and explain why
		if($this->link){
			mysqli_select_db($this->link, $this->database) or die(mysqli_error());
		}
		// If all good, se will send off the mysql query
		$query = mysqli_query($this->link, $mysqlQuery);
		// If inserting or updating a record assign the id of the last item to insertID
			if($insert){
		$this->setInsertID();
			}
		// Close the conection up after us
		mysqli_close($this->link);
		// If the query was successful
		if($query){
			// Set successful as true
			$this->successful = true;
			// Handle the result
			if(!$insert){
			$this->handleResults($query);
			}
		}else{
			// Query failed, successful is false
			$this->successful = false;
		}
	}
	
		function setInsertID(){
		$this->insertID = mysqli_insert_id($this->link);
	}
	
	// Return the last insert ID from an INSERT sql
	public function getInsertID(){	
		return $this->insertID;
	}
	
	// We will handle the results returned from a query
	private function handleResults($resource){
		// First check to see if the number of rows from
		// the query is only 1
		$this->counter = mysqli_num_rows($resource);
		if($this->counter == 1){
			// If only one we will just set the response as
			// the single response
			$results = mysqli_fetch_assoc($resource);
			// Set the response as the results
			$this->response = $results;
		// Handle the if is more than 1 row
		}elseif($this->counter > 1){
			// Create an empty array
			$results = array();
			// Look through the query result
			while($row = mysqli_fetch_assoc($resource)){
				// Add the query result to the results array
				$results[] = $row;
			}
			// Set the response as the results
			$this->response = $results;
		}
	}
	
	// This will return the handled results from the last query called
	public function getResults(){
		return $this->response;
	}
	
	// Return true or false if the query was successful
	public function success(){
		return $this->successful;
	}
	// Return true or false if the query was successful
	public function getCount(){
		return $this->counter;
	}
}
?>