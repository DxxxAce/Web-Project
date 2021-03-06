<?php
namespace app\core;

use PDO;

class Database
{
    public PDO $pdo;
    /*public array $config = ["dsn"=>"mysql:host=localhost;port=3306;dbname=web;charset=utf8",
        "user"=>"clodel",
        "pass"=>"claudiu001"];*/
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ;
        $user = $config['user'];//to be changed accordingly
        $pass = $config['pass'];//to be changed accordingly
        $this->pdo = new PDO($dsn,$user,$pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations=$this->getAppliedMigrations();
        //var_dump($appliedMigrations);
        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR.'/php/migrations');
        $toApplyMigrations = array_diff($files,$appliedMigrations);
        //var_dump($toApplyMigrations);

        foreach ($toApplyMigrations as $migration) {
            if($migration === '.' || $migration === '..' ){
                continue;
            }
            require_once  Application::$ROOT_DIR.'/php/migrations/'.$migration;
            $classname=pathinfo($migration,PATHINFO_FILENAME);
           $instance = new $classname();
           $this->log("Applying migration $migration");
           $instance->up();
           $this->log("Applied migration $migration");
           $newMigrations[]=$migration;
       }
        if(!empty($newMigrations))
        {
            $this->saveMigrations($newMigrations);
        }else {
             $this->log("All migrations are applied");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=INNODB;");

    }

    public function getAppliedMigrations()
    {
        $statement=$this->pdo->prepare("select migration FROM migrations");
        $statement->execute();
        //returns only migration as array not array in array
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {

        $str=implode(",",array_map(fn($m)=>"('$m')",$migrations));

        $statement=$this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }
    protected function log($message){
        echo '['.date('d-m-Y H:i:s').'] - '.$message.PHP_EOL;
    }
}