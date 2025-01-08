--TRUNCATE TABLE "Seats" RESTART identity CASCADE;

-- Большой зал (120 мест)
INSERT INTO public."Seats" (hall_id, "row", "number", is_vip) VALUES
(1, 1, 1, false), (1, 1, 2, false), (1, 1, 3, false), (1, 1, 4, false), (1, 1, 5, false), 
(1, 1, 6, false), (1, 1, 7, false), (1, 1, 8, false), (1, 1, 9, false), (1, 1, 10, false),
-- продолжаются до 120 мест
(1, 2, 1, false), (1, 2, 2, false), (1, 2, 3, false), (1, 2, 4, false), (1, 2, 5, false),
(1, 2, 6, false), (1, 2, 7, false), (1, 2, 8, false), (1, 2, 9, false), (1, 2, 10, false),
(1, 3, 1, false), (1, 3, 2, false), (1, 3, 3, false), (1, 3, 4, false), (1, 3, 5, false),
(1, 3, 6, false), (1, 3, 7, false), (1, 3, 8, false), (1, 3, 9, false), (1, 3, 10, false),
(1, 4, 1, false), (1, 4, 2, false), (1, 4, 3, false), (1, 4, 4, false), (1, 4, 5, false),
(1, 4, 6, false), (1, 4, 7, false), (1, 4, 8, false), (1, 4, 9, false), (1, 4, 10, false),
(1, 5, 1, false), (1, 5, 2, false), (1, 5, 3, false), (1, 5, 4, false), (1, 5, 5, false),
(1, 5, 6, false), (1, 5, 7, false), (1, 5, 8, false), (1, 5, 9, false), (1, 5, 10, false),
(1, 6, 1, false), (1, 6, 2, false), (1, 6, 3, false), (1, 6, 4, false), (1, 6, 5, false),
(1, 6, 6, false), (1, 6, 7, false), (1, 6, 8, false), (1, 6, 9, false), (1, 6, 10, false),
(1, 7, 1, false), (1, 7, 2, false), (1, 7, 3, false), (1, 7, 4, false), (1, 7, 5, false),
(1, 7, 6, false), (1, 7, 7, false), (1, 7, 8, false), (1, 7, 9, false), (1, 7, 10, false),
(1, 8, 1, false), (1, 8, 2, false), (1, 8, 3, false), (1, 8, 4, false), (1, 8, 5, false),
(1, 8, 6, false), (1, 8, 7, false), (1, 8, 8, false), (1, 8, 9, false), (1, 8, 10, false),
(1, 9, 1, false), (1, 9, 2, false), (1, 9, 3, false), (1, 9, 4, false), (1, 9, 5, false),
(1, 9, 6, false), (1, 9, 7, false), (1, 9, 8, false), (1, 9, 9, false), (1, 9, 10, false),
(1, 10, 1, false), (1, 10, 2, false), (1, 10, 3, false), (1, 10, 4, false), (1, 10, 5, false),
(1, 10, 6, false), (1, 10, 7, false), (1, 10, 8, false), (1, 10, 9, false), (1, 10, 10, false),
(1, 11, 1, false), (1, 11, 2, false), (1, 11, 3, false), (1, 11, 4, false), (1, 11, 5, false),
(1, 11, 6, false), (1, 11, 7, false), (1, 11, 8, false), (1, 11, 9, false), (1, 11, 10, false),
(1, 12, 1, false), (1, 12, 2, false), (1, 12, 3, false), (1, 12, 4, false), (1, 12, 5, false),
(1, 12, 6, false), (1, 12, 7, false), (1, 12, 8, false), (1, 12, 9, false), (1, 12, 10, false);

-- Малый зал (50 мест)
INSERT INTO public."Seats" (hall_id, "row", "number", is_vip) VALUES
(2, 1, 1, false), (2, 1, 2, false), (2, 1, 3, false), (2, 1, 4, false), (2, 1, 5, false),
(2, 1, 6, false), (2, 1, 7, false), (2, 1, 8, false), (2, 1, 9, false), (2, 1, 10, false),
-- продолжаются до 50 мест
(2, 2, 1, false), (2, 2, 2, false), (2, 2, 3, false), (2, 2, 4, false), (2, 2, 5, false),
(2, 2, 6, false), (2, 2, 7, false), (2, 2, 8, false), (2, 2, 9, false), (2, 2, 10, false),
(2, 3, 1, false), (2, 3, 2, false), (2, 3, 3, false), (2, 3, 4, false), (2, 3, 5, false),
(2, 3, 6, false), (2, 3, 7, false), (2, 3, 8, false), (2, 3, 9, false), (2, 3, 10, false),
(2, 4, 1, false), (2, 4, 2, false), (2, 4, 3, false), (2, 4, 4, false), (2, 4, 5, false),
(2, 4, 6, false), (2, 4, 7, false), (2, 4, 8, false), (2, 4, 9, false), (2, 4, 10, false),
(2, 5, 1, false), (2, 5, 2, false), (2, 5, 3, false), (2, 5, 4, false), (2, 5, 5, false),
(2, 5, 6, false), (2, 5, 7, false), (2, 5, 8, false), (2, 5, 9, false), (2, 5, 10, false);

-- VIP-зал (20 мест)
INSERT INTO public."Seats" (hall_id, "row", "number", is_vip) VALUES
(3, 1, 1, true), (3, 1, 2, true), (3, 1, 3, true), (3, 1, 4, true),
(3, 2, 1, true), (3, 1, 2, true), (3, 1, 3, true), (3, 1, 4, true),
-- продолжаются до 20 мест
(3, 3, 1, true), (3, 3, 2, true), (3, 3, 3, true), (3, 3, 4, true),
(3, 4, 1, true), (3, 4, 2, true), (3, 4, 3, true), (3, 4, 4, true),
(3, 5, 1, true), (3, 5, 2, true), (3, 5, 3, true), (3, 5, 4, true);

-- Детский зал (40 мест)
INSERT INTO public."Seats" (hall_id, "row", "number", is_vip) VALUES
(4, 1, 1, false), (4, 1, 2, false), (4, 1, 3, false), (4, 1, 4, false), (4, 1, 5, false),
(4, 1, 6, false), (4, 1, 7, false), (4, 1, 8, false), (4, 1, 9, false), (4, 1, 10, false),
-- продолжаются до 40 мест
(4, 2, 1, false), (4, 2, 2, false), (4, 2, 3, false), (4, 2, 4, false), (4, 2, 5, false),
(4, 2, 6, false), (4, 2, 7, false), (4, 2, 8, false), (4, 2, 9, false), (4, 2, 10, false),
(4, 3, 3, false), (4, 3, 2, false), (4, 3, 3, false), (4, 3, 4, false), (4, 3, 5, false),
(4, 3, 6, false), (4, 3, 7, false), (4, 3, 8, false), (4, 3, 9, false), (4, 3, 10, false),
(4, 4, 1, false), (4, 4, 2, false), (4, 4, 3, false), (4, 4, 4, false), (4, 4, 5, false),
(4, 4, 6, false), (4, 4, 7, false), (4, 4, 8, false), (4, 4, 9, false), (4, 4, 10, false);

-- Классический зал (80 мест)
INSERT INTO public."Seats" (hall_id, "row", "number", is_vip) VALUES
(5, 1, 1, false), (5, 1, 2, false), (5, 1, 3, false), (5, 1, 4, false), (5, 1, 5, false),
(5, 1, 6, false), (5, 1, 7, false), (5, 1, 8, false), (5, 1, 9, false), (5, 1, 10, false),
-- продолжаются до 80 мест
(5, 2, 1, false), (5, 2, 2, false), (5, 2, 3, false), (5, 2, 4, false), (5, 2, 5, false),
(5, 2, 6, false), (5, 2, 7, false), (5, 2, 8, false), (5, 2, 9, false), (5, 2, 10, false),
(5, 3, 1, false), (5, 3, 2, false), (5, 3, 3, false), (5, 3, 4, false), (5, 3, 5, false),
(5, 3, 6, false), (5, 3, 7, false), (5, 3, 8, false), (5, 3, 9, false), (5, 3, 10, false),
(5, 4, 1, false), (5, 4, 2, false), (5, 4, 3, false), (5, 4, 4, false), (5, 4, 5, false),
(5, 4, 6, false), (5, 4, 7, false), (5, 4, 8, false), (5, 4, 9, false), (5, 4, 10, false),
(5, 5, 1, false), (5, 5, 2, false), (5, 5, 3, false), (5, 5, 4, false), (5, 5, 5, false),
(5, 5, 6, false), (5, 5, 7, false), (5, 5, 8, false), (5, 5, 9, false), (5, 5, 10, false),
(5, 6, 1, false), (5, 6, 2, false), (5, 6, 3, false), (5, 6, 4, false), (5, 6, 5, false),
(5, 6, 6, false), (5, 6, 7, false), (5, 6, 8, false), (5, 6, 9, false), (5, 6, 10, false),
(5, 7, 1, false), (5, 7, 2, false), (5, 7, 3, false), (5, 7, 4, false), (5, 7, 5, false),
(5, 7, 6, false), (5, 7, 7, false), (5, 7, 8, false), (5, 7, 9, false), (5, 7, 10, false),
(5, 8, 1, false), (5, 8, 2, false), (5, 8, 3, false), (5, 8, 4, false), (5, 8, 5, false),
(5, 8, 6, false), (5, 8, 7, false), (5, 8, 8, false), (5, 8, 9, false), (5, 8, 10, false);