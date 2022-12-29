<?php
session_start();
date_default_timezone_set("Asia/Taipei");

// 
$Title = new DB('title');
$Bottom = new DB('bottom');
$Total = new DB('total');

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db19";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    public function arrayToSqlArray($eachs)
    {
        foreach ($eachs as $key => $value) {
            $each[] = "`$key`='$value'";
        }
        return $each;
    }

    public function all(...$args)
    {
        $sql = " SELECT * FROM $this->table ";
        if (isset($args[0]) && is_array($args[0])) {
            // prr($args[0]);
            $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($args[0]));
        } elseif (isset($args[0])) {
            // prr($args[0]);
            $sql .= $args[0];
        }

        if (isset($args[1])) {
            if (is_array($args[1])) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($args[1]));
            } else {
                $sql .= $args[1];
            }
        }

        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function find($one)
    {
        $sql = " SELECT * FROM $this->table ";
        if (is_array($one)) {
            $sql .= " WHERE " . join(" OR ", $this->arrayToSqlArray($one));
        } else {
            $sql .= " WHERE `id`='$one'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function save($save)
    {
        if (isset($save['id'])) {
            // Upset
            $id = $save['id'];
            unset($save['id']);
            $sql = "UPDATE `$this->table` SET " . join(",", $this->arrayToSqlArray($save)) . " WHERE `id`=$id";
        } else {
            // Insert
            $keys = array_keys($save);
            prr($keys);
            prr($this->arrayToSqlArray($save));
            $sql = "INSERT INTO `$this->table` (`" . join("`,`", $keys) . "`) VALUES ('" . join("','", $save) . "')";
            echo $sql;
        }
        return $this->pdo->query($sql);
    }

    public function del($del)
    {
        $sql = "DELETE FROM `$this->table` WHERE ";

        if (is_array($del)) {
            $sql .= join(" AND ", $this->arrayToSqlArray($del));
        } else {
            $sql .= "`id`='$del'";
        }

        return $this->pdo->exec($sql);
    }

    public function count($field, $arg)
    {
        return $this->visualBasic('count', $field,  $arg);
    }

    public function sum($field, $arg)
    {
        return $this->visualBasic('sum', $field, $arg);
    }

    public function max($field, $arg)
    {
        return $this->visualBasic('max', $field, $arg);
    }

    public function min($field, $arg)
    {
        return $this->visualBasic('min', $field, $arg);
    }

    public function avg($field, $arg)
    {
        return $this->visualBasic('avg', $field, $arg);
    }

    protected function visualBasic($math, $field, $args)
    {
        if ($math == 'count') {
            if (is_array($args)) {
                $sql = "SELECT count($field) FROM `$this->table` WHERE " . join(" AND ", $this->arrayToSqlArray($args));
            } elseif ($args == 1) {
                $sql = "SELECT count($field) FROM `$this->table`";
            } else {
                $sql = "SELECT count($field) FROM `$this->table` " . $args;
            }
        } else {
            if (is_array($args)) {
                $sql = "SELECT $math(`$field`) FROM `$this->table` WHERE " . join(" AND ", $this->arrayToSqlArray($args));
            } elseif ($args == 1) {
                $sql = "SELECT $math(`$field`) FROM `$this->table` ";
            } else {
                $sql = "SELECT $math(`$field`) FROM `$this->table` " . $args;
            }
        }

        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    //**  老師的 **//
    // protected function math($math, ...$arg)
    // {
    //     switch ($math) {
    //         case 'count':
    //             $sql = "SELECT COUNT(*) FROM $this->table ";
    //             break;
    //         default:
    //             $sql = "SELECT $math($arg[0]) FROM $this->table ";
    //     }
    //     if (isset($arg[1])) {
    //         if (is_array($arg[1])) {
    //             $sql .= " WHERE " . join(" AND ", $this->arrayToSqlArray($arg[1]));
    //         } else {
    //             $sql .= $arg[1];
    //         }
    //     }
    //     echo $sql;
    //     return $this->pdo->query($sql)->fetchColumn();
    // }
}


function prr($Arr)
{
    echo "<pre>";
    print_r($Arr);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db19";
    $pdo = new PDO($dsn, 'root', '');
    $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
