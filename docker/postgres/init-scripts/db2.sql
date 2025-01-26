CREATE DATABASE db2;

\connect db2;

DROP SCHEMA public;

CREATE SCHEMA public AUTHORIZATION "admin";



CREATE TABLE public.news (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор новости.
	title varchar(200) NOT NULL, -- Заголовок новости.
	news_content text NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL, -- Дата создания.
	updated_at timestamp DEFAULT now() NOT NULL, -- Дата обновления.
	likes int8 DEFAULT 0 NOT NULL, -- Количество лайков.
	CONSTRAINT news_pkey PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public.news.id IS 'Уникальный идентификатор новости.';
COMMENT ON COLUMN public.news.title IS 'Заголовок новости.';
COMMENT ON COLUMN public.news.created_at IS 'Дата создания.';
COMMENT ON COLUMN public.news.updated_at IS 'Дата обновления.';
COMMENT ON COLUMN public.news.likes IS 'Количество лайков.';



CREATE TABLE public.admins (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор пользователя.
	username varchar(50) NOT NULL, -- Имя администратора.
	user_password varchar(225) NOT NULL, -- Пароль.
	created_at timestamp DEFAULT now() NOT NULL, -- Дата регистрации.
	CONSTRAINT admins_pkey PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public.admins.id IS 'Уникальный идентификатор пользователя.';
COMMENT ON COLUMN public.admins.username IS 'Имя администратора.';
COMMENT ON COLUMN public.admins.user_password IS 'Пароль.';
COMMENT ON COLUMN public.admins.created_at IS 'Дата регистрации.';