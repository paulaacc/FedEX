SELECT flight_filter.station_code, COUNT(flight_details.flight_details_id) as count_of_package 
FROM flight_details RIGHT JOIN flight_filter ON flight_details.flight_details_postal_code = flight_filter.flight_postal_code 
GROUP BY flight_filter.station_code