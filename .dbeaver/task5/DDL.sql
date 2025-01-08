-- DROP SCHEMA public;

CREATE SCHEMA public AUTHORIZATION pg_database_owner;

COMMENT ON SCHEMA public IS 'standard public schema';

-- DROP SEQUENCE public."Likes_id_seq";

CREATE SEQUENCE public."Likes_id_seq"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE public."Likes_id_seq1";

CREATE SEQUENCE public."Likes_id_seq1"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE public."News_id_seq";

CREATE SEQUENCE public."News_id_seq"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE public."News_id_seq1";

CREATE SEQUENCE public."News_id_seq1"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE public."Users_id_seq";

CREATE SEQUENCE public."Users_id_seq"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE public."Users_id_seq1";

CREATE SEQUENCE public."Users_id_seq1"
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 9223372036854775807
	START 1
	CACHE 1
	NO CYCLE;-- public."News" определение

-- Drop table

-- DROP TABLE public."News";

CREATE TABLE public."News" (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор новости.
	title varchar(200) NOT NULL, -- Заголовок новости.
	"content" text NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL, -- Дата создания.
	updated_at timestamp DEFAULT now() NOT NULL, -- Дата обновления.
	likes int8 DEFAULT 0 NOT NULL, -- Количество лайков.
	CONSTRAINT "News_pkey" PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public."News".id IS 'Уникальный идентификатор новости.';
COMMENT ON COLUMN public."News".title IS 'Заголовок новости.';
COMMENT ON COLUMN public."News".created_at IS 'Дата создания.';
COMMENT ON COLUMN public."News".updated_at IS 'Дата обновления.';
COMMENT ON COLUMN public."News".likes IS 'Количество лайков.';


-- public."Admins" определение

-- Drop table

-- DROP TABLE public."Admins";

CREATE TABLE public."Admins" (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор пользователя.
	username varchar(50) NOT NULL, -- Имя администратора.
	"password" varchar(225) NOT NULL, -- Пароль.
	created_at timestamp DEFAULT now() NOT NULL, -- Дата регистрации.
	CONSTRAINT "Users_pkey" PRIMARY KEY (id)
);

-- Column comments

COMMENT ON COLUMN public."Admins".id IS 'Уникальный идентификатор пользователя.';
COMMENT ON COLUMN public."Admins".username IS 'Имя администратора.';
COMMENT ON COLUMN public."Admins"."password" IS 'Пароль.';
COMMENT ON COLUMN public."Admins".created_at IS 'Дата регистрации.';


-- public."Likes" определение

-- Drop table

-- DROP TABLE public."Likes";

CREATE TABLE public."Likes" (
	id int8 GENERATED ALWAYS AS IDENTITY( INCREMENT BY 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1 NO CYCLE) NOT NULL, -- Уникальный идентификатор лайка.
	news_id int8 NOT NULL, -- ID новости (связь с таблицей news).
	created_at timestamp DEFAULT now() NOT NULL, -- Дата добавления лайка.
	CONSTRAINT "Likes_pkey" PRIMARY KEY (id),
	CONSTRAINT "Likes_news_id_fkey" FOREIGN KEY (news_id) REFERENCES public."News"(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Column comments

COMMENT ON COLUMN public."Likes".id IS 'Уникальный идентификатор лайка.';
COMMENT ON COLUMN public."Likes".news_id IS 'ID новости (связь с таблицей news).';
COMMENT ON COLUMN public."Likes".created_at IS 'Дата добавления лайка.';