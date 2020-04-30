1/SELECT productions.`production_name`,genres.genre_name,directors.director_name,countries.country_name FROM `productions`JOIN  countries ON productions.country_id=countries.id JOIN directors ON productions.director_id=directors.director_id JOIN genres ON productions.genre_id=genres.genre_id ORDER BY directors.director_name
SELECT `production_name`,`income`,`year` FROM `productions` WHERE `year`> 2000 ORDER BY`income`DESC LIMIT 2

3/SELECT SUM(`tickets_sold`),directors.director_name FROM `productions` JOIN directors ON productions.director_id=directors.director_id WHERE directors.director_id=4

4/SELECT genres.genre_name FROM `productions`  JOIN genres ON productions.genre_id= genres.genre_id ORDER BY genres.genre_id
