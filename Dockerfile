FROM wordpress:php8.3-apache

COPY ./custom.ini /usr/local/etc/php/conf.d/custom.ini

# config changes
RUN echo "ServerTokens Prod" >> /etc/apache2/apache2.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#disable ssl config
RUN a2dissite default-ssl.conf

# Enable necessary Apache modules
RUN a2enmod remoteip

# Configure Apache to use the correct client IP
RUN echo 'RemoteIPHeader X-Forwarded-For' > /etc/apache2/conf-available/remoteip.conf && \
    echo 'RemoteIPTrustedProxy <PROXY_IP>' >> /etc/apache2/conf-available/remoteip.conf && \
    a2enconf remoteip


# Update the log format to show the real client IP
RUN echo 'LogFormat "%{X-Forwarded-For}i %l %u %t \"%r\" %>s %b" forwarded' > /etc/apache2/conf-available/remoteip-log.conf && \
    echo 'CustomLog /var/log/apache2/access.log forwarded' >> /etc/apache2/conf-available/remoteip-log.conf && \
    a2enconf remoteip-log

# creat remoteip.conf
RUN echo 'RemoteIPHeader X-Forwarded-For' > /etc/apache2/conf-available/remoteip.conf
RUN echo 'RemoteIPTrustedProxy 158.91.1.103' >> /etc/apache2/conf-available/remoteip.conf



# reboot apache
RUN service apache2 restart

## Harden File Permissions
RUN chown -R www-data:www-data /var/www/html/
RUN find /var/www/html/wp-content -type d -exec chmod 775 {} \;
RUN find /var/www/html/wp-content -type f -exec chmod 664 {} \;
RUN find /var/www/html/wp-content -type d -exec chmod g+s {} \;
