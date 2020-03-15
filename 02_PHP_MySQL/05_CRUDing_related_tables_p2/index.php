1/ SELECT h.hotel_id, h.`hotel_name`, h.`rooms`, c.`name`, d.`destination_name` 
FROM `hotels` h 
JOIN destinations d ON h.destination_id = d.destination_id 
JOIN countries c ON h.country_id = c.country_id

