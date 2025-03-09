<?php
namespace App\Repository;
use PDO;
use PDOException;
class VideoRepository{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByID(int $id) : array{
        try{
            $stmt=$this->pdo->prepare("
            SELECT* FROM vidios WHERE id = :video_id
            ");
            $stmt->execute(["video_id"=>$id]);
            $video = $stmt->fetch(PDO::FETCH_ASSOC);
            return $video ? $video : ["Error"=>"Video not found"];
        }catch(PDOException $e){
            return ["error"=>"request error" . $e->getMessage()]; 
        }
        
    }
}
?>