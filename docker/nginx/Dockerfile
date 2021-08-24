FROM alpine:3.14

RUN apk add --update nginx && rm -rf /var/cache/apk/*

ADD ./nginx.conf /etc/nginx/nginx.conf

EXPOSE 8080

CMD ["nginx"]
