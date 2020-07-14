<?
class Main 
{
	private $db_host = "localhost";
    private $db_name = "deltdelt_work";
    private $db_user = "deltdelt_work";
    private $db_pass = "1AY%8fU7";
    function __construct()
    {
       
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
        
    }
    	function LoadTemplate($method)
 	{	$page = $this->pageLoad($method);
 		$root = $_SERVER['DOCUMENT_ROOT'];
 		
		
		$tmpl = '/view/';
		include $root.$tmpl.'header.php';
		include $root.'/model/'.$method.'.model.php';
 		include $root.$tmpl.$page['template'];
 		include $root.$tmpl.'footer.php';
 		return $page;
 	}

    	function pageLoad($method) 
    {	$query = "select * from pages where method = '".$method."' limit 1";
    	$sth = $this->db->prepare($query);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) 
        {
            return false;
        }
        return $row;


    }
    	public function getRow($query) 
	{
		$sth = $this->db->prepare($query);
        $sth->execute();
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (empty($row)) 
        {
            return false;
        }
        return $row;			
	}

	    function __destruct()
    {
         $this->db = null;
    }
    public function connectdb($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            $this->db = new \pdo("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\pdoexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }
}

function connectToBd() {
        $root = $_SERVER['DOCUMENT_ROOT'];
        include $root.'/config/config.php';
    $conn = new mysqli($db_host, $db_name, $db_pass, $db_user);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    return $conn;
    
    
    
}


?>