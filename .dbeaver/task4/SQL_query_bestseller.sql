-- Нахождение самого прибыльного фильма.
SELECT
	m.title AS movie_title,
	SUM(t.price) AS total_revenue
FROM 
	public.movies m
JOIN 
	public.showtimes s ON m.d = s.movie_id
JOIN 
	public.bookings b ON s.id = b.showtime_id
JOIN 
	public.tickets t ON b.id = t.booking_id
GROUP BY m.id
ORDER BY total_revenue DESC
LIMIT 1;