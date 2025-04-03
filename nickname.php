<?php
class nickname
{
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function getNickname($nickname, $number123)
    {
        $query = "UPDATE cities SET nickname = :nickname , nickname_type = :nickname_type WHERE number123 = :number123";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            'nickname' => "$nickname",
            'number123' => "$number123",
            'nickname_type' => "Псевдоним"
        ]);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}