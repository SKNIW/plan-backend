PHP_FPM_SERVICE_NAME=app
NODE_SERVICE_NAME=node
.PHONY: setup build run php test test-php fix stop  restart analyse kill-all
.DEFAULT_GOAL := help

setup: ## Init project
	sh ./.docker/dev/setup.sh

build: ## Build containers in project
	docker compose build --no-cache --pull

run: ## Start project
	docker compose up -d

php: ## Enter php container
	docker compose exec app bash

test: ## Run unit tests
	docker compose exec ${PHP_FPM_SERVICE_NAME} php artisan test

fix: ## Run global linting code php
	docker compose exec ${PHP_FPM_SERVICE_NAME} composer csf

analyse: ## Run static analyse code
	docker compose exec ${PHP_FPM_SERVICE_NAME} composer analyse

stop: ## Stop project
	docker compose stop

kill-all: ## Kill all containers
	docker container kill $$(docker container ls -q)

restart: stop run

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
