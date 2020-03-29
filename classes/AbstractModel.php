<?php

/**
 * Class AbstractModel
 */
abstract class AbstractModel
{
    /**
     * @var string
     */
    static protected $table;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $k
     * @param $v
     */
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * @param $k
     * @return mixed
     */
    public function __get($k)
    {
        return $this->data[$k];
    }

    /**
     * @param $k
     * @return bool
     */
    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    /**
     * @return array
     */
    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    /**
     * @param string $order_by
     * @param string $order_dir
     * @param int $limit
     * @return array
     */
    public static function find($order_by = "id", $order_dir = "DESC", $limit = 100)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY ' . $order_by . ' ' . $order_dir . ' LIMIT ' . $limit;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    /**
     * @return bool|mixed|string
     */
    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        $sql = '
          INSERT INTO ' . static::$table . ' 
          (' . implode(', ', $cols) . ') 
          VALUES (' . implode(', ', array_keys($data)) . ') 
        ';
        $db = new DB();
        if ($db->execute($sql, $data)) {
            $this->id = $db->lastInsertId();
            return $this->id;
        } else {
            return false;
        }
    }


    /**
     * @return bool|mixed
     */
    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $cols[] = $k . ':=' . $k;
        }
        $sql = '
          UPDATE ' . static::$table . '
          SET ' . implode('. ', $cols) . '
          WHERE id=:id
        ';
        $db = new DB();
        if ($db->execute($sql, $data)) {
            return $this->id;
        } else {
            return false;
        }
    }

    /**
     * @return bool|mixed|string
     */
    public function save()
    {
        if (!isset($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }
}