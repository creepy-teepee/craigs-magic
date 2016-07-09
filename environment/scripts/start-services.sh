#!/bin/bash

# Starts the Apache and MySQL services.

echo "Starting Apache and MySQL"
service httpd start
service mysqld start

echo "Starting MailHog"
nohup /usr/local/bin/mailhog > /dev/null 2>&1 &