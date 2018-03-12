# Makefile for Docker Nginx PHP Composer MySQL
include .env

help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  migrate                run migrations"
	@echo "  migrate-reset          revert migrations"
	@echo "  migrate-refresh        revert and reset migrations & run seeds"
	@echo "  composer-install       install php dependencies for app"
	@echo "  tinker       					run php artisan tinker"

migrate:
	@docker-compose exec -T php php artisan migrate

migrate-reset:
	@docker-compose exec -T php php artisan migrate:reset

migrate-refresh:
	@docker-compose exec -T php php artisan migrate:refresh --seed

composer-install:
	@docker-compose run --rm --volume=$(shell pwd)/app:/app composer install

tinkers:
	@docker-compose exec -T php php artisan tinker