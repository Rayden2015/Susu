<?php
    require_once("config.php");
    
    class Database {
          private $connection;
          private $magic_quotes_active;
          private $real_escape_string;
          public  $last_query ;
          
          function __construct(){
            $this->open_Connection();
            $magic_quotes_active = get_magic_quotes_gpc();
	    $real_escape_string = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
          }
          
          
       public function open_Connection(){
            $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
            if(!$this->connection){
                die("Database connection failed :".mysqli_error());
            }else{
                 $select_db = mysqli_select_db($this->connection, DB_NAME);
                 if(!$select_db){
                die("Database selection failed :".mysqli_error());
                 }
            }
            
           
        }
        
        
        
       
       public function close_Connection( ){
            if(isset($this->connection)){
                mysqli_close($this->connection);
                unset($this->connection);
            }
        }
        
       
        
      
       public function exec_query($query)
       {
	    $this->last_query = $query;
            $result = mysqli_query($this->connection,$query);
            $this->confirm_query($result);
            return $result;
        }
        
                
       public function fetchArray($result){
            $result_set =  mysqli_fetch_array($result);
            return $result_set;
        }
        
        
       private function confirm_query($result) {
	if (!$result) {
	    //$output = "Database query failed: " . mysql_error() . "<br /><br />";
      $output = "Database query failed:<br /><br />";
	    $output .= "Last SQL query: " . $this->last_query;
	    die( $output );
	    }
	}
    
    
        public function escape_value( $value ) {
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) {
                            $value = stripslashes( $value );
                        }
			$value = mysqli_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	
    }
    
    $database = new Database;
    $database->open_Connection();
    
    
    
    
    
?>