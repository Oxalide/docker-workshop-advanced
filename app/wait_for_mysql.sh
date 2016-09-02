#!/bin/bash

set -e

host="$1"
shift
cmd="$@"

until nc -z -w 1 mysql 3306; do
  >&2 echo "MySQL is unavailable - sleeping"
  sleep 1
done

>&2 echo "MySQL is up - executing command"
exec $cmd
