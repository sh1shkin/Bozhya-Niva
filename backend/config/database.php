<?php 
namespace App;

use PDO;
use PDOException;

class Database{
    private PDO $pdo;
    public function __construct(
        private string $host,
        private string $dbName,
        private string $user,
        private string $password        
    )
    {
        $this->connect();
    }
    private function connect():void{
        $DSN = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";  
        try{
            $this->pdo = new PDO($DSN, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
        {
            echo "error" . $e->getMessage();
        }
    }
    public function getPdo() : PDO{
        return $this->pdo;
    }

}
?>