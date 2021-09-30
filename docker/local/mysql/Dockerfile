FROM mysql:5.7

ADD ./etc-mysql.cnf /etc/mysql/conf.d/etc-mysql.cnf
ADD ./test-data/wordpress.sql /root/test-data/wordpress.sql

RUN apt-get update

RUN apt-get install -y tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    chmod 644 /etc/mysql/conf.d/etc-mysql.cnf
