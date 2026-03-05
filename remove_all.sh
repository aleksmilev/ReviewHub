#!/bin/bash

for i in $(docker ps -a -q); do
    docker stop $i
    docker rm $i
done

docker ps -a -q    