<?php

namespace Medidex\Libraries;

/**
 * Abstract Db class to manipulate db connections with a single db instance.
 * USAGE: Just include only this file and call Db::getInstance()->function_name();
 *
 * @author Dimitris Bouzikas
 * @copyright 2017 Medidex Inc.
 */

abstract class Db
{
    /**
     * @var string Server (eg. localhost)
     */
    protected $server;

    /**
     * @var string Database user (eg. root)
     */
    protected $user;

    /**
     * @var string Database password (eg. can be empty !)
     */
    protected $password;

    /**
     * @var string Database name
     */
    protected $database;

    /**
     * @var bool
     */
    protected $is_cache_enabled;

    /**
     * @var mixed Resource link
     */
    protected $connection;

    /**
     * @var string Status of connection
     */
    protected $ret_status;

    /**
     * @var array List of DB instance
     */
    protected static $instance = array();

    /**
     * @var array Object instance for singleton
     */
    protected static $servers = array();

    /**
     * Open a connection
     */
    abstract public function connect();

    /**
     * Close a connection
     */
    abstract protected function disconnect();

    /**
     * Get database version
     *
     * @return string
     */
    abstract public function getVersion();

    /**
     * Protect string against SQL injections
     *
     * @param string $str
     * @return string
     */
    abstract public function escape($str);

    /**
     * Get the ID generated from the previous INSERT operation
     */
    abstract public function getLastId();

    /**
     * Get number of affected rows in previous database operation
     */
    abstract public function countAffected();

    /**
     * Get the status of connection in string
     */
    abstract public function status();

    /**
     * Execute a prepare statement
     *
     * @param string $stmt
     */
    abstract public function execStmt($stmt);

    /**
     * Sets a new database name for a given server id
     *
     * @param string $server    Server id to apply database
     * @param string $database  Database name to apply
     */
    public static function setDatabase($server, $database)
    {
        self::$servers[$server]['database'] = $database;
    }

    /**
     * @codeCoverageIgnore
     * Get Db object instance
     *
     * @param mixed $server    Decides whether the connection to be returned by the master server or the slave server
     * @return Db instance
     */
    public static function getInstance($server = 'LOCAL')
    {
        if (is_array($server)) {
            $serverKeys = array_keys($server);
            if (count($serverKeys) != 1) {
                throw new \InvalidArgumentException("Wrong parameter server provided");
            }
            list($serverKey) = $serverKeys;
            $host = $server[$serverKey]['server'];
            $user = $server[$serverKey]['user'];
            $pass = $server[$serverKey]['password'];
            $database = $server[$serverKey]['database'];
            $server = $serverKey;

            self::$servers[$server]['server'] = $host;
            self::$servers[$server]['user'] = $user;
            self::$servers[$server]['password'] = $pass;
            self::$servers[$server]['database'] = $database;
        } else {
            $host = self::$servers[$server]['server'];
            $user = self::$servers[$server]['user'];
            $pass = self::$servers[$server]['password'];
            $database = self::$servers[$server]['database'];
        }

        if (!isset(self::$instance[$server])) {
            self::$instance[$server] = new MySQLi2($host, $user, $pass, $database);
        }

        return self::$instance[$server];
    }

    /**
     * @codeCoverageIgnore
     * Instantiate database connection
     *
     * @param string $server Server address
     * @param string $user User login
     * @param string $password User password
     * @param string $database Database name
     * @param bool $connect If false, don't connect in constructor
     */
    public function __construct($server, $user, $password, $database, $connect = true)
    {
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        if ($connect) {
            $this->connect();
        }
    }

    /**
     * Close connection to database
     */
    public function __destruct()
    {
        if ($this->connection) {
            $this->disconnect();
        }
    }

    /**
     * Execute a query and get result ressource
     *
     * @param string $sql
     * @return mixed
     */
    public function query($sql)
    {
        $this->result = $this->_query($sql);
        return $this->result;
    }
}
