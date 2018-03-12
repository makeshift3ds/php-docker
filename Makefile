# Makefile for Docker Nginx PHP Composer MySQL
include .env

help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  migrate                run migrations"
	@echo "  migrate-reset          revert migrations"
	@echo "  composer-install       install php dependencies for app"

migrate:
	@docker-compose exec -T php php artisan migrate

migrate-reset:
	@docker-compose exec -T php php artisan migrate:reset

composer-install:
	@docker-compose run --rm --volume=$(shell pwd)/app:/app composer install