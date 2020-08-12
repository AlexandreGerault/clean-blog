# clean-blog - an introduction to clean architecture

## Project structure
```
.
+--domain                   # Business code
|  +--src                   # Source files
|  |  +--Blog               # Blog module source files
|  |  |  +--Entity          # Business entities attached to the blog module
|  |  |  +--Exception       # Simple business exceptions
|  |  |  +--Gateway         # Blog interfaces to fetch data (in this project, it is all implemented in the symfony src folder)
|  |  |  +--UseCase         # Group the source files with a folder per use case
|  +--tests                 # Tests files
+--src                      # Symfony source files implementing our domain code
|  +--Infrastructure        #
|  |  +--Entity             # Doctrine entities
|  |  +--Repository         # Doctrine repositories
|  +--UserInterface         # This is not a graphic user interface! This is where the user hit the code (controllers, presenters and so on)
|  |  +--Http/Controller    # Contains all the symfony controllers
|  |  +--Presentation       # Contains the presenters implementations
```
I described just upside the structure of my first project using a clean architecture implementation.

## Workflow
At the moment, the workflow is pretty simple. I start thinking of a use case:
1. Create a folder under the `domain/src/{module}/UseCase` with the name of the use case;
2. Write a use case that implements the `execute` methods. This is quite similar to the command pattern (we just don't define interfaces as the arguments may depend on the use case). The `execute` method may need a `Request` object, and some services (no Symfony services!) such as the gateways;
3. Think of the classes needed for the use case:
  - Do I need a request?
  - Do I need to present data?
  - Do I need to fetch data? If yes, what entities?
4. Write the needed classes;
5. Write implementations needed on Symfony side.

At the moment I'm not writing any tests as I'm just discovering the architecture. It will come later I hope :)

## Want to notice me about something?

You can send me an email to me@alexandre-gerault.fr or on discord -- Gunnolfson#8847 :)
