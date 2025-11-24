# Remote Work HUB Backend Project

This repository is a multi-service backend environment designed as a personal portfolio project.
It explores backend architecture concepts, containerization, message-driven communication and Domain-Driven Design (DDD).

## Services Overview

### Core Platform (Ruby on Rails)
Acts as the main domain layer of the system.
Implements core business logic following DDD principles.

### Matching API (ASP.NET Core)
Provides search, filtering and matching logic.
Designed as an independent bounded context.

### Notifications API (PHP + Symfony)
Handles the delivery of email and SMS notifications.
Structured with DDD layers: Domain, Application, Infrastructure and UI.

### Web App (Frontend)
A minimal interface used to interact with the backend services.

## Architecture

The project is organized as a multi-service monorepo.
Each service is an independent bounded context following Domain-Driven Design.
The environment is containerized using Docker and supports event-driven communication through Apache Kafka, enabling asynchronous integration between services.

- Docker-based development environment
- Domain-Driven Design (DDD)
- Multi-service monorepo structure
- Clean separation of bounded contexts
- Event-driven communication with Kafka

## Current Status

The repository currently includes:

- Foundational folder structure
- Initial Docker Compose skeleton
- Kafka integration planned for the next commit

## Upcoming Work

- Add Kafka and Zookeeper containers
- Create Kafka topics
- Implement event publishers in the Core Platform
- Implement event consumers in the Notifications API
- Begin development of the first functional service

## Next Steps

- Add Kafka to Docker Compose
- Define event topics
- Implement publishing and consuming logic
- Begin Notifications API development