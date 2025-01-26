FROM postgres:17.2

ENV POSTGRES_USER admin
ENV POSTGRES_PASSWORD admin

COPY ./init-scripts /docker-entrypoint-initdb.d/

WORKDIR /docker-entrypoint-initdb.d/

RUN chmod -R +x /docker-entrypoint-initdb.d/