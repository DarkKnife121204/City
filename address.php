<?php

class address
{
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function address($id)
    {
        $query = "SELECT region_type_full, region, area_type_full, area, city_type_full, city, city_district_type_full, city_district, settlement_type_full, settlement, street_type_full, street, house_type_full, house, block_type_full, block, flat_type_full, flat FROM cities WHERE number123 = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}