#!/bin/bash

# Installs MailHog and mhsendmail

wget --quiet https://github.com/mailhog/MailHog/releases/download/v0.1.8/MailHog_linux_amd64
mv MailHog_linux_amd64 /usr/local/bin/mailhog
chmod u+x /usr/local/bin/mailhog

wget --quiet https://github.com/mailhog/mhsendmail/releases/download/v0.1.9/mhsendmail_linux_amd64
mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail
chmod a+x /usr/local/bin/mhsendmail