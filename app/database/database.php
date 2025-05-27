<?php 
    require_once("connect.php");
    function pre_print($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
    function dataBasesCheckError($stmt)
    {
        $error_info = $stmt->errorInfo(); // функция errorInfo() - получает расширенную информацию об ошибке представить можно в виде массива
        // 0 - код ошибки, 1 - код ошибки задаваемый драйвером, 2 - сообщение об ошибке
        if($error_info[0] !== PDO::ERR_NONE) {
            echo $error_info[2];
            exit();
        }
    }
    function selectOne(string $table, array $params = []): ?array
    {
        global $pdo;

        $sql = "SELECT * FROM $table";
        $values = [];

        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $key => $value) {
                $paramKey = ":$key";
                $conditions[] = "$key = $paramKey";
                $values[$paramKey] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);
        dataBasesCheckError($stmt);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result === false ? null : $result;
    }

function  SelectAll($tables) :? array {
        global $pdo;
        $sql = "SELECT * FROM $tables";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function Insert($table, $param = []) {
        global $pdo;
        $i = 0;
        $column = implode(', ', array_keys($param));
        $placeholder = implode(', ', array_map(fn($place) => ":$place", array_keys($param)));

        $sql = "INSERT INTO $table ($column) VALUES ($placeholder)";
        pre_print($sql);
        //exit();
        $stmt = $pdo->prepare($sql);
        $stmt -> execute($param);
    }
    $param = [
        "username" => "Kirill",
        "email" => "Kirill@gmail.com",
        "password_hash" => HashedPassword("111111111"),
        "created_at" => date("Y-m-d H:i:s")
    ];
    //Insert("admins", $param);
    function update($table, $userId, $param = []) {
        global $pdo;
        if(isset($param['id'])) {
            unset($param['id']);
        }
        $placeholder = implode(', ', array_map(fn($place) => "$place = :$place", array_keys($param)));
        $param['id'] = $userId;
        $sql = "UPDATE $table SET $placeholder WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        //$stmt -> bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt -> execute($param);
    }
    function delete($table, $userId) {
        global $pdo;
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        //$stmt -> bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt -> execute(["id" => $userId]);
    }

    function getAdminId($email) : ?int {
        global $pdo;
        $sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["email" => $email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($admin)) {
            return $admin['id'];
        } else {
            return null;
        }
    }
    function selectOneByEmail($table, $email): ?array {
        global $pdo;
        $sql = "SELECT * FROM $table WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result === false ? null : $result;
    }
function HashedPassword($password) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        return $password_hashed;
    }