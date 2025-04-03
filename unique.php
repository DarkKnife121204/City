<?php
class unique {
    public function __construct($db)
    {
        $this->connection = $db;
    }
    public function unique($search)
    {
        $query = "SELECT number123
                    FROM cities
                    WHERE (city, region, area) IN (
                        SELECT city, region, area
                        FROM cities
                        GROUP BY city, region, area
                        HAVING COUNT(*) = 1
                    ) AND (city LIKE :search OR region LIKE :search OR area LIKE :search)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            'search' => "$search"
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}