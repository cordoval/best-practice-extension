This extension aims to gather some best practices from phpspec issues.

# install

```bash
composer require cordoval/best-practice-extension=~1.0@dev
```

And add to your phpspec.yml file:

```yaml
extensions:
    // ...
    - Cordoval\BestPractices\PhpSpec\BestPracticesExtension
    // ...
```

Disclaimer: Is very opinionated and used in production.

Some enhancements to this extension come from discussions and ideas from the issues
on phpspec github repository:

- final class enforcing (https://github.com/phpspec/phpspec/pull/339)
