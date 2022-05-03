#!/bin/bash

mkdir symfony-phpadmin
mkdir -p docker/apache docker/php

touch docker/apache/my_app.conf
touch docker/php/php.ini
touch docker/Dockerfile
touch .env docker-compose.yaml docker-sync.yml
