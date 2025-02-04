CREATE DATABASE db1;

\connect db1;

DROP SCHEMA public;

CREATE SCHEMA public AUTHORIZATION "admin";



CREATE TABLE public.halls (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор зала.
	hall_name varchar(50) NOT NULL, -- Название зала.
	capacity int4 NOT NULL, -- Вместимость зала.
	description text NULL, -- Вместимость зала.
	CONSTRAINT halls_pkey PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public.halls.id IS 'Уникальный идентификатор зала.';
COMMENT ON COLUMN public.halls.hall_name IS 'Название зала.';
COMMENT ON COLUMN public.halls.capacity IS 'Вместимость зала.';
COMMENT ON COLUMN public.halls.description IS 'Вместимость зала.';



CREATE TABLE public.movies (
	id int8 GENERATED BY DEFAULT AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор фильма.
	title varchar(150) NOT NULL, -- Название фильма.
	genre varchar(50) NOT NULL, -- Жанр фильма.
	duration int4 NOT NULL, -- Длительность в минутах.
	rating varchar(10) NOT NULL, -- Возрастной рейтинг (например, "18+").
	description text NOT NULL, -- Описание фильма.
	CONSTRAINT movies_pkey PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public.movies.id IS 'Уникальный идентификатор фильма.';
COMMENT ON COLUMN public.movies.title IS 'Название фильма.';
COMMENT ON COLUMN public.movies.genre IS 'Жанр фильма.';
COMMENT ON COLUMN public.movies.duration IS 'Длительность в минутах.';
COMMENT ON COLUMN public.movies.rating IS 'Возрастной рейтинг (например, "18+").';
COMMENT ON COLUMN public.movies.description IS 'Описание фильма.';



CREATE TABLE public.users (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL,
	username varchar(100) NOT NULL, -- Имя пользователя.
	email varchar(255) NOT NULL, -- Адрес электронной почты, уникальный.
	phone varchar(15) NOT NULL, -- Телефонный номер.
	user_password varchar(255) NOT NULL, -- Пароль.
	user_role text NOT NULL, -- Роль пользователя.
	CONSTRAINT "UQ_email" UNIQUE (email),
	CONSTRAINT users_pkey PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public.users.username IS 'Имя пользователя.';
COMMENT ON COLUMN public.users.email IS 'Адрес электронной почты, уникальный.';
COMMENT ON COLUMN public.users.phone IS 'Телефонный номер.';
COMMENT ON COLUMN public.users.user_password IS 'Пароль.';
COMMENT ON COLUMN public.users.user_role IS 'Роль пользователя.';



CREATE TABLE public.seats (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор места.
	hall_id int8 NOT NULL, -- Ссылка на зал.
	row_num int4 NOT NULL, -- Номер ряда.
	seat_num int4 NOT NULL, -- Номер в ряду.
	is_vip bool NOT NULL, -- Признак VIP-места.
	CONSTRAINT seats_pkey PRIMARY KEY (id),
	CONSTRAINT seats_halls_fkey FOREIGN KEY (hall_id) REFERENCES public.halls(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Column comments

COMMENT ON COLUMN public.seats.id IS 'Уникальный идентификатор места.';
COMMENT ON COLUMN public.seats.hall_id IS 'Ссылка на зал.';
COMMENT ON COLUMN public.seats.row_num IS 'Номер ряда.';
COMMENT ON COLUMN public.seats.seat_num IS 'Номер в ряду.';
COMMENT ON COLUMN public.seats.is_vip IS 'Признак VIP-места.';



CREATE TABLE public.showtimes (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор сеанса.
	movie_id int8 NOT NULL, -- Ссылка на фильм.
	hall_id int8 NOT NULL, -- Ссылка на зал.
	start_time timestamp NOT NULL,
	end_time timestamp NOT NULL,
	price numeric(10, 2) NOT NULL, -- Цена билета.
	CONSTRAINT showtimes_pkey PRIMARY KEY (id),
	CONSTRAINT showtimes_halls_fkey FOREIGN KEY (hall_id) REFERENCES public.halls(id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT showtimes_movies_fkey FOREIGN KEY (movie_id) REFERENCES public.movies(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Column comments

COMMENT ON COLUMN public.showtimes.id IS 'Уникальный идентификатор сеанса.';
COMMENT ON COLUMN public.showtimes.movie_id IS 'Ссылка на фильм.';
COMMENT ON COLUMN public.showtimes.hall_id IS 'Ссылка на зал.';
COMMENT ON COLUMN public.showtimes.price IS 'Цена билета.';



CREATE TABLE public.bookings (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор бронирования.
	user_id int8 NOT NULL, -- Ссылка на пользователя.
	showtime_id int8 NOT NULL, -- Ссылка на сеанс.
	booking_time timestamp NOT NULL, -- Время бронирования.
	CONSTRAINT booking_pkey PRIMARY KEY (id),
	CONSTRAINT bookings_showtimes_fkey FOREIGN KEY (showtime_id) REFERENCES public.showtimes(id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT bookings_users_fkey FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Column comments

COMMENT ON COLUMN public.bookings.id IS 'Уникальный идентификатор бронирования.';
COMMENT ON COLUMN public.bookings.user_id IS 'Ссылка на пользователя.';
COMMENT ON COLUMN public.bookings.showtime_id IS 'Ссылка на сеанс.';
COMMENT ON COLUMN public.bookings.booking_time IS 'Время бронирования.';



CREATE TABLE public.tickets (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор билета.
	booking_id int8 NOT NULL, -- Ссылка на бронирование.
	seat_id int8 NOT NULL, -- Ссылка на место.
	price numeric(10, 2) NULL, -- Цена билета (включая надбавки).
	CONSTRAINT tickets_pkey PRIMARY KEY (id),
	CONSTRAINT tickets_bookings_fkey FOREIGN KEY (booking_id) REFERENCES public.bookings(id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT tickets_seats_fkey FOREIGN KEY (seat_id) REFERENCES public.seats(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Column comments

COMMENT ON COLUMN public.tickets.id IS 'Уникальный идентификатор билета.';
COMMENT ON COLUMN public.tickets.booking_id IS 'Ссылка на бронирование.';
COMMENT ON COLUMN public.tickets.seat_id IS 'Ссылка на место.';
COMMENT ON COLUMN public.tickets.price IS 'Цена билета (включая надбавки).';