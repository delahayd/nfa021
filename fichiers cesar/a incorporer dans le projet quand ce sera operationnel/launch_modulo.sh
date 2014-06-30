#!/bin/sh

{ time -o time.tmp zenon_modulo -max-time $2 -max-size $3 -itptp $1 > res.tmp ;} > /dev/null
