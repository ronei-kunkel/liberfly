FROM debian:11-slim

RUN addgroup --gid 101 --system nginx && \
    adduser --system --disabled-password --no-create-home --uid 101 --home /var/cache/nginx --gecos "nginx user" --shell /sbin/nologin --ingroup nginx nginx

RUN apt-get update && \
    apt-get upgrade nginx -y && \
    apt-get install nginx-extras -y

RUN echo 'America/Sao_Paulo' >> /etc/timezone

RUN ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

COPY . /var/www/

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]