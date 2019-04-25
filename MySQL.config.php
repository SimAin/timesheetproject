<?


class MySQLConfig{
	
	// Setting the configuration for each HTTP hostname
	// Configuration names should be the HTTP hostname, such as 'google.com'
	protected $config = array(
		// Setting the default configuration to fall back on
		"default"		=>		array(
			"hostname"	=>	"localhost",
			"username"	=>	"username",
			"password"	=>	"password",
			"database"	=>	"mydatabase"),

		// Setting the configuration for 'yourdomain.com'
		"localhost"	=>		array(
			"hostname"	=>	"127.0.0.1",
			"username"	=>	"root",
			"password"	=>	"",
			"database"	=>	"mydatabase"),
        
        // Setting the configuration for test site
		"someHost"	=>		array(
			"hostname"	=>	"localhost",
			"username"	=>	"username",
			"password"	=>	"password",
			"database"	=>	"mydatabase")
	);
	
	private $selectedConfig;
	
	// Constrict the class
	function __construct(){
		//
		// Set the correct configuration
		// This will fall back as 'default' if there is no configuration for the curren HTTP host
		//
		$this->selectedConfig=(isset($this->config[$_SERVER['HTTP_HOST']])) ? $this->config[$_SERVER['HTTP_HOST']] : $this->config['default'];
	}
	
	// This will return the selected configuration
	function getConfig(){
		return $this->selectedConfig;
	}
	 
}
?>