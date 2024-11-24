# generate new entity
entity:
	php bin/console make:entity

PHONY: entity

# generate migrations based on entities
migration:
	php bin/console make:migration

PHONY: migration