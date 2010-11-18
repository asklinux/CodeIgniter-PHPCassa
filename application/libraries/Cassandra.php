<?php
//      Define the CodeIgniter Cassandra Constants
define('CI_CASSANDRA_BASE',dirname(__FILE__)).'phpcassa/');
define('CI_CASSANDRA_THRIFT',CI_CASSANDRA_BASE.'thrift/');

//      Load the required files to use Thrift
require_once CI_CASSANDRA_THRIFT.'packages/cassandra/Cassandra.php';
require_once CI_CASSANDRA_THRIFT.'transport/TSocket.php';
require_once CI_CASSANDRA_THRIFT.'protocol/TBinaryProtocol.php';
require_once CI_CASSANDRA_THRIFT.'transport/IFramedTransport.php';
require_once CI_CASSANDRA_THRIFT.'transport/IBufferedTransport.php';

//      Load the PHPCassa files
include_once(CI_CASSANDRA_BASE.'phpcassa.php');
include_once(CI_CASSANDRA_BASE.'uuid.php');

class Cassandra {
        
        /*
        *       CodeIgniter PHPCassa Implementation
        *       Implemented by Ian Livingstone (http://www.ianlivingstone.ca)
        *
        *       More details here
        */
        
        //      Define the class data members
        private $CI;
        private $_config = array();
        private $_columns = array();
        private $_nodes = array();

        public function __construct () {
                
                /*
                *       Class Constructor
                */

                //      Get reference to the CodeIgniter superobject
                $this->CI =& get_instance();

                //      Load the required codeigniter classes
                //      None here for now

                //      Initialize the class
                $this->_initialize();
        }

        private function _initialize () {
                
            /*
            *       Initialize Cassandra Class
            *       
            *       Loads values from the cassandra.php config file into
            *       the _nodes and _columns array. Constructs the required
            *       classes to create column => ColumnObject mapping
            *       and adds the nodes to the CassandraConn static obj      
            */

            $this->CI->config->load('cassandra', true);
            $this->_config = $this->CI->config->item('cassandra');

            foreach ($this->_config['nodes'] as $node) {
                CassandraConn::add_node($node['hostname'], $node['port']); 
            }

            foreach ($this->_config['columns'] as $column) {
                $this->_columns[$column['name']] = new CassandraCF(
                    $column['keyspace'],
                    $column['name'],
                    $column['supercolumn'],
                    $column['column_type'],
                    $column['subcolumn_type'],
                    $column['read_consistency_level'],
                    $column['write_consistency_level']
                );
            }
        }
    
    public function get ($col, $key, $super_column = NULL, $slice_start="", $slice_finish="", $column_reversed=False, $column_count=100) {
        
        /*
        *   Get col:key value from cassandra
        */

        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");

        return $this->_column[$col]->get($key, $super_column, $slice_start, $slice_finish, $column_reversed, $column_count);
    }

    public function multiget ($col, $keys, $slice_start = "", $slice_finish = "") {
        
        /*
        *   Multi get col:kes values from cassandra
        */

        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");

        return $this->_column[$col]->multiget($keys, $slice_start, $slice_finish);
    }

    public function get_count ($col, $key, $super_column = null) {
        
        /*
        *   Return number of matching keys
        */

        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");

        return $this->_column[$col]->get_count($key, $super_column);
    }

    public function get_range($start_key="", $finish_key="", $row_count = 100, $slice_start="", $slice_finish="") {
        
        /*
        *   Get Range of Keys  
        */
        
        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");

        return $this->_column[$col]->get_range($start_key, $finish_key, $row_count, $slice_start, $slice_finish);
    }

    public funciton insert ($col, $key, $value) {
        
        /*
        *   Insert column into $col space using $key and $value
        */

        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");

        return $this->_column[$col]->insert($key, $value);
    }

    public function remove ($col, $key, $column_name=null) {
        
        /*
        *   Remove key from column space
        */

        if (!in_array($col, $this->_column))
            throw Exception($col." is not a valid column space; check your cassandra.php config file");
        
        return $this->_column[$col]->remove($key, $column_name);
    }
}

