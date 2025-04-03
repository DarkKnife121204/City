<?php
class locality
{
    public function __construct($db)
    {
        $this->connection = $db;
    }
    public function locate($id)
    {
        $query = "SELECT 
                    CASE 
                        WHEN nickname_type !='' THEN nickname_type
                        WHEN city_type_full != '' THEN city_type_full
                        WHEN area_type_full != '' THEN area_type_full
                        WHEN region_type_full != '' THEN region_type_full
                    END AS location_type,
                    CASE
                        WHEN nickname_type !='' THEN nickname
                        WHEN city_type_full != '' THEN city
                        WHEN area_type_full != '' THEN area
                        WHEN region_type_full != '' THEN region
                    END AS location
                    FROM cities
                    WHERE number123 =?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
