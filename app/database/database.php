<?php 
    require_once("connect.php");
    function pre_print($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
    function dataBasesCheckError($stmt)
    {
        $error_info = $stmt->errorInfo(); // функция errorInfo() - получаеет расширенную информацию об ошибке представить можно в виде массива
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

    function  selectAll($tables) :? array {
        global $pdo;
        $sql = "SELECT * FROM $tables";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
function selectAllVideo($table, $conditions = [], $orderBy = ''): array {
    global $pdo;

    $sql = "SELECT * FROM $table";
    $params = [];

    if (!empty($conditions)) {
        $clauses = [];
        foreach ($conditions as $key => $value) {
            $clauses[] = "$key = ?";
            $params[] = $value;
        }
        $sql .= " WHERE " . implode(" AND ", $clauses);
    }

    if ($orderBy !== '') {
        $sql .= " " . $orderBy;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function extractYoutubeId($url) {
    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\\?v=|embed\\/|v\\/))([^\s&]+)/', $url, $matches)) {
        return $matches[1];
    }
    return '';
}


function Insert($table, $param = []) : int {
        global $pdo;
        $i = 0;
        $column = implode(', ', array_keys($param));
        $placeholder = implode(', ', array_map(fn($place) => ":$place", array_keys($param)));

        $sql = "INSERT INTO $table ($column) VALUES ($placeholder)";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute($param);
        return $pdo->lastInsertId();
    }
    $param = [
        "admins_username" => "maks_root",
        "admins_email" => "maksim_shishkin_04@inbox.ru",
        "admins_password_hash" => HashedPassword("gnom007Rossia."),
        "admins_created_at" => date("Y-m-d H:i:s"),
        "admins_root" => 1
    ];
    //Insert("admins", $param);
    function update($table, $userId, $param = []) {
        global $pdo;
        if(isset($param['id'])) {
            unset($param['id']);
        }
        $placeholder = implode(', ', array_map(fn($place) => "$place = :$place", array_keys($param)));
        $param['id'] = $userId;
        $sql = "UPDATE $table SET $placeholder WHERE {$table}_id = :id";
        $stmt = $pdo->prepare($sql);
        //$stmt -> bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt -> execute($param);
    }
    function delete($table, $userId) {
        global $pdo;
        $primaryKey = $table . "_id";
        $sql = "DELETE FROM $table WHERE $primaryKey = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $userId]);
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

    function selectAllFromPosts($table1, $table2, $params = []): ?array
    {
        global $pdo;
        $sql = "SELECT 
        t1.posts_id,
        t1.posts_title,
        t1.posts_img,
        t1.posts_content,
        t1.topics_id,
        t1.posts_status,
        t2.admins_username
     FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.admins_id = t2.admins_id ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        dataBasesCheckError($stmt);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
function getAllMinistries() {
    return selectAll('ministries');
}

function getMinistryById(int $id): ?array {
    return selectOne('ministries', ['ministries_id' => $id]);
}
function createMinistry(array $data): int {
    return Insert('ministries', [
        'ministries_name' => $data['ministries_name'],
        'ministries_content' => $data['ministries_content'],
        'ministries_day' => $data['ministries_day'],
        'ministries_start_time' => $data['ministries_start_time'],
        'ministries_location' => $data['ministries_location'],
        'ministries_created_at' => date('Y-m-d H:i:s'),
    ]);
}
function updateMinistry(int $id, array $data): void {
    update('ministries', $id, [
        'ministries_name' => $data['ministries_name'],
        'ministries_content' => $data['ministries_content'],
        'ministries_day' => $data['ministries_day'],
        'ministries_start_time' => $data['ministries_start_time'],
        'ministries_location' => $data['ministries_location'],
        // 'ministries_created_at' обычно не меняется при обновлении
    ]);
}
function deleteMinistry(int $id): void {
    delete('ministries', $id);
}
function twoDigits($num) {
    return str_pad($num, 2, '0', STR_PAD_LEFT);
}