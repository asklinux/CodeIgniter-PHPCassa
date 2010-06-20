<?php
//	Define the CodeIgniter Cassandra Constants
define('CI_CASSANDRA_BASE',dirname(__FILE__)).'phpcassa/');
define('CI_CASSANDRA_THRIFT',CI_CASSANDRA_BASE.'thrift/');

//	Load the required files to use Thrift
require_once CI_CASSANDRA_THRIFT.'packages/cassandra/Cassandra.php';
require_once CI_CASSANDRA_THRIFT.'transport/TSocket.php';
require_once CI_CASSANDRA_THRIFT.'protocol/TBinaryProtocol.php';
require_once CI_CASSANDRA_THRIFT.'transport/IFramedTransport.php';
require_once CI_CASSANDRA_THRIFT.'transport/IBufferedTransport.php';

//	Load the PHPCassa files
include_once(CI_CASSANDRA_BASE.'phpcassa.php');
include_once(CI_CASSANDRA_BASE.'uuid.php');

class Cassandra {
	
	/*
	*	CodeIgniter PHPCassa Implementation
	*	Implemented by Ian Livingstone (http://www.ianlivingstone.ca)
	*
	*	More details here
	*/
	
	//	Define the class data members
	private $CI;
	private $_config = array();
	private $_columns = array();
	private $_nodes = array();

	public function __construct () {
		
		/*
		*	Class Constructor
		*/

		//	Get reference to the CodeIgniter superobject
		$this->CI =& get_instance();

		//	Load the required codeigniter classes
		//	None here for now

		//	Initialize the class
		$this->_initialize();
	}

	private function _initialize () {
		
		/*
		*	Initialize Cassandra Class
		*	
		*	Loads values from the cassandra.php config file into
		*	the _nodes and _columns array. Constructs the required
		*	classes to create column => ColumnObject mapping
		*	and adds the nodes to the CassandraConn static obj	
		*/
	}
}

