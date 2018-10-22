#!/bin/bash
if [ ! $1 ]; then
	echo "请输入要导出的地址,例如:/tmp/"
	exit
fi 
path=${1}"la.sql"
read -p "Is mysqldump > ${path} ? Y/N: " f
if [ ! $f ]; then
	exit
fi
if [ $f == "Y" -o $f == "y" ]; then
	echo "mysqldump......."
	docker exec -it mariadb mysqldump -uroot -p123456 la --ignore-table=la.self_shopping_list --ignore-table=la.admin_operation_log > ${path}
	echo "mysqldump.......end"
	exit
fi

