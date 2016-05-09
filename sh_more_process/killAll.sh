#! /bin/bash

cat ./process.pid | xargs -IX kill -9 X

echo "" > process.pid