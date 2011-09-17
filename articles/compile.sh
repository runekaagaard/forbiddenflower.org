#!/bin/bash
for file in *.markdown
do
	basename=`echo $file | sed s/.markdown//`
	markdown $file > $basename.html
done
