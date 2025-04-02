<?php
class locality
{
    public function __construct($db)
    {
        $this->connection = $db;
    }
    function locate($id)
    {
        $query = "SELECT 
                    CASE 
                        WHEN city_type_full != '' THEN city_type_full
                        WHEN area_type_full != '' THEN area_type_full
                        WHEN region_type_full != '' THEN region_type_full
                    END AS location_type,
                    CASE
                        WHEN city_type_full != '' THEN city
                        WHEN area_type_full != '' THEN area
                        WHEN region_type_full != '' THEN region
                    END AS location
                    FROM cities
                    WHERE 1
                    LIMIT ".$id.",1";



        $stmt = $this->connection->query($query);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
