<?php

/**
 * Class DB
 */
class DB
{
    /**
     * @var PDO
     */
    private $dbh;
    /**
     * @var string
     */
    private $className = 'stdClass';

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=guestbook;host=localhost;', 'root', '');
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}