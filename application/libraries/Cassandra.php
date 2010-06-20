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
}
