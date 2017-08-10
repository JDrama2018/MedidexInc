<?php

namespace Medidex\Libraries;

/**
 *  MySQLI Server Database Connection Class
 *
 *  @author Dimitris Bouzikas
 *  @copyright 2017 Medidex Inc.
 */

class MySQLi2 extends \Medidex\Libraries\Db
{
    /**
     * Db connection link identifier
     *
     * @var db link res
     */
    protected $connection;

    /**
     * String identifier of conn status
     *
     * @var string
     */
    protected $ret_status;

    /**
     * (non-PHPdoc)
     * @see Db::connect()
     */
    public function connect()
    {
        try {
            if (!$this->connection = @mysqli_connect($this->server, $this->user, $this->password)) {
                $this->ret_status = "ERROR: ".mysqli_connect_error();
            } else {
                try {
                    if (!$this->setDb($this->database)) {
                        $this->ret_status = 'Error: Could not connect to database ' . $this->database;
                        // throw new Exception('Error: Could not connect to database ' . $this->database);
                    } else {
                        mysqli_query($this->connection, "SET NAMES 'utf8'");
                        mysqli_query($this->connection, "SET CHARACTER SET utf8");
                        mysqli_query($this->connection, "SET CHARACTER_SET_CONNECTION=utf8");
                        mysqli_query($this->connection, "SET SQL_MODE = ''");

                        $this->ret_status = "OK";
                    }
                } catch (Exception $select_ex) {
                    $this->ret_status = "ERROR: ";
                    $this->ret_status .= $select_ex->getMessage();
                    $this->ret_status .= $select_ex->getFile();
                    $this->ret_status .= $select_ex->getLine();
                }
            }
        } catch (Exception $connect_ex) {
            $this->ret_status = "ERROR: ";
            $this->ret_status .= $connect_ex->getMessage();
            $this->ret_status .= $connect_ex->getFile();
            $this->ret_status .= $connect_ex->getLine();
        }

        return $this->connection;
    }

    /**
     * @see Db::disconnect()
     */
    protected function disconnect()
    {
        mysqli_close($this->connection);
        $this->connection = null;
    }

    /**
     * @see Db::setDb()
     */
    public function setDb($dbName)
    {
        return mysqli_select_db($this->connection, $dbName);
    }

    /**
     * @see Db::getVersion()
     */
    public function getVersion()
    {
        return mysqli_get_server_info($this->connection);
    }

    // DNT 24-July-2014
    public function prepareStmt($sql)
    {
        $stmt = @mysqli_prepare($this->connection, $sql);
        if (!$stmt) {
            $this->ret_status = "ERROR: ".mysqli_error($this->connection);
        }
        return $stmt;
    }

    /**
     *
     * @param reference $stmt
     * @param array $types
     * @param string $data
     * @param string $data1
     * @param string $data2
     * @return NULL
     */
    public function bindStmt(&$stmt, $types, $data, $data1 = null, $data2 = null)
    {
        if ($stmt) {
            if (is_null($data1)) {
                return mysqli_stmt_bind_param($stmt, $types, $data);
            } elseif (is_null($data2)) {
                return mysqli_stmt_bind_param($stmt, $types, $data, $data1);
            } else {
                return mysqli_stmt_bind_param($stmt, $types, $data, $data1, $data2);
            }
        } else {
            return null;   // status should already be set
        }
    }

    /**
     * (non-PHPdoc)
     * @see Db::execStmt()
     */
    public function execStmt($stmt)
    {
        $r = @mysqli_stmt_execute($stmt);
        $res = array();
        if ($r === false) {
            $res["error"] = $this->ret_status = "ERROR: ".mysqli_stmt_error($stmt);
        } else {
            mysqli_stmt_store_result($stmt);

            $meta = mysqli_stmt_result_metadata($stmt);
            if ($meta) {
                $bindVarsArray = array();
                $result = array();
                $fields = mysqli_fetch_fields($meta);
                for ($i = 0; $i < count($fields); $i++) {
                    $bindVarsArray[] = &$result[$fields[$i]->name];
                }

                call_user_func_array(array($stmt, 'bind_result'), $bindVarsArray);

                $meta->close();
                $i = 0;
                while (mysqli_stmt_fetch($stmt)) {
                    $f = 0;
                    foreach ($result as $fld => $val) {
                        // DNT 24-July-2014, fix for prepared statements decimal bug: too many decimals are
                        // returned with bogus values
                        if ($fields[$f]->name == $fld && ($fields[$f]->type == 4 || $fields[$f]->type == 5)) {
                            $val = round($val, $fields[$f]->decimals);
                            $val = number_format($val, $fields[$f]->decimals);  // non-prepared returns strings
                        }
                        $res[$i][$fld] = $val;
                        $f++;
                    }
                    $i++;
                }
                unset($result);
                $this->ret_status = "OK";
            }
        }
        return $res;
    }

    public function closeStmt($stmt)
    {
        mysqli_stmt_close($stmt);
    }

    /**
     * @see Db::query()
     */
    public function query($sql)
    {
        if ($this->connection) {
            try {
                $resource = mysqli_query($this->connection, $sql);

                $data = array();
                if ($resource !== false) {
                    if (!$this->connection->errno) {
                        if ($resource === true) {
                            if (mysqli_affected_rows($this->connection) > 0) {
                                // update & delete statements
                            }
                        } else { //if ($resource instanceof mysqli_result) {
                            if ($resource->num_rows > 0) {
                                $i = 0;
                                while ($result = mysqli_fetch_assoc($resource)) {
                                    $data[$i] = $result;
                                    $i++;
                                }
                                mysqli_free_result($resource);
                            }
                        }
//                        else {
//                            // update is failed
//                        }
                        $this->ret_status = "OK";
                    } else {
//                        $data["error"] = 'ERROR: ';
                        $data["error"]  = mysqli_error($this->connection) . ' ErrNo: ';
                        $data["error"] .= mysqli_errno($this->connection);
                        $data["query"] = "SQL: [$sql]";
                        $this->ret_status = $data["error"];
                    }
                } else if (mysqli_errno($this->connection) != 0) {
//                    $data["error"] = 'ERROR: ';
                    $data["error"]  = mysqli_error($this->connection) . ' ErrNo: ';
                    $data["error"] .= mysqli_errno($this->connection);
                    $data["query"] = "SQL: [$sql]";
                    $this->ret_status = $data["error"];
                } else {
                    // else not an error, query returned no data, hence we get "OK" and empty array
                    $this->ret_status = "OK";
                }
            } catch (Exception $query_ex) {
                $data["error"] = $this->ret_status = 'ERROR: '. $query_ex->toString();
            }
        } else {
            $data["error"] = $this->ret_status = 'ERROR: not connected';
        }
        Log::getInstance("HLR_LOG")->debug(0, "SQL: [$sql]");

        return $data;
    }

    /**
     * @see Db::escape()
     */
    public function escape($value)
    {
        if ($this->connection) {
            return mysqli_real_escape_string($this->connection, $value);
        } else {
            if ($this->ret_status != "OK") {
                $this->ret_status = "Error: no connection, cannot escape (".$this->ret_status.")";
            }
        }
    }

    /**
     * @see Db::countAffected()
     */
    public function countAffected()
    {
        if ($this->connection) {
            return mysqli_affected_rows($this->connection);
        } else {
            if ($this->ret_status != "OK") {
                $this->ret_status = "Error: no connection, no affected rows (".$this->ret_status.")";
            }
            return false;
        }
    }

    /**
     * @see Db::getLastId()
     */
    public function getLastId()
    {
        if ($this->connection) {
            return mysqli_insert_id($this->connection);
        } else {
            if ($this->ret_status != "OK") {
                $this->ret_status = "Error: no connection, cannot determine last autoincrement (".$this->ret_status.")";
            }
            return false;
        }
    }

    /**
     * (non-PHPdoc)
     * @see Db::status()
     */
    public function status()
    {
        return $this->ret_status;
    }

    /**
     * (non-PHPdoc)
     * @see Db::__destruct()
     */
    public function __destruct()
    {
        if ($this->connection) {
            $this->disconnect();
        }
    }
}
