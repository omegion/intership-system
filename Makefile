args = `arg="$(filter-out $@,$(MAKECMDGOALS))" && echo $${arg:-${1}}`

up:
	docker-compose up -d

up-build:
	docker-compose up -d --build

down:
	docker-compose down

artisan:
	docker-compose run --rm artisan $(call args)

composer:
	docker-compose run --rm composer $(call args)

npm:
	docker-compose run --rm npm $(call args)

npm-hot:
	cd src && npm run hot

db-reset:
	docker-compose run --rm artisan migrate:reset
	docker-compose run --rm artisan migrate
	docker-compose run --rm artisan db:seed --class RolePermissionSeeder -vvv
	docker-compose run --rm artisan db:seed --class CountrySeeder -vvv
	docker-compose run --rm artisan db:seed --class CitySeeder -vvv
