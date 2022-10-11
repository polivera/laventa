create_db_container:
	docker run --name laventa-db -e MYSQL_ROOT_PASSWORD=secret -p 3306:3306 -d mysql:8

create_db:
	docker exec -it laventa-db mysql -u root --password=secret -e "create database laventa;"

drop_db:
	docker exec -it laventa-db mysql -u root --password=secret -e "drop database laventa;"

.PHONY: create_db_container create_db drop_db
