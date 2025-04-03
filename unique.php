<?php
class unique {
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function unique($search)
    {
        $query = "SELECT 
                      CASE 
                          WHEN COUNT(*) > 1 THEN 0
                          ELSE number123
                      END AS result
                  FROM cities
                  WHERE city LIKE :search OR region LIKE :search OR area LIKE :search";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            'search' => "%$search%"
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}