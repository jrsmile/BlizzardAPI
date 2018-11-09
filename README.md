# Blizzard API Access

This package can manage your API requests for the Blizzard Battle.NET API Endpoints.

## Getting Started

As first you need a Blizzard access token, to get one of those you have to get an account [here](https://develop.battle.net/) and create an application.

### Prerequisites

For this project you need PHP and Composer for installing itself and its dependencies.

[Composer Installation](https://getcomposer.org/download/)

### Installing

A step by step series of examples that tell you how to get a development env running


```
composer require jared87/blizzard-api-service
```

## Using the Package

To use this package you mainly have to create an API context, which provides the authentication with the Blizzard APIs
```php
$apiContext = new \BlizzardApiService\Context\BlizzardApiContext(
    'YOUR_API_CLIENT_ID',
    'YOUR_API_CLIENT_SECRET',
    'REGION_TAG_YOU_WANT_TO_ACCESS', // US, EU, TW, CN, SEA
    'LOCALE' //en_US, en_GB, de_DE, fr_FR, ...
);
```
We highly recommend to cache this object for its validity period, so you can reuse it without requesting a new one on each page. It provides the timestamp it expires through a ->getExpiresAt(); function
```php
$expiresAtTime = $apiContext->getExpiresAt();
```
You also could provide access_token as 5th parameter, but this method may change in the future.

With this steps done, you are ready to fire your first request.
```php
$itemApi = new \BlizzardApiService\Endpoints\Wow\Community\ItemAPI($apiContext);
$item    = $itemApi->get(2028);
```
This gives you the a stdClass with the data of the item Hammer. The $itemApi object you can reuse as ofen you need to get an item.

Some API Endpoints need parameters some of them don't need parameters, so of them need one or more. Some examples:

The ItemClasses endpoint need no additional parameters.
```php
$itemClassesApi = new \BlizzardApiService\Endpoints\Wow\Community\ItemClasses($apiContext);
$itemClasses    = $itemApi->get();
```

But the CharacterProfile Endpoint has some additional features.
```php
use \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile;
$CharacterProfileApi = new CharacterProfile($apiContext);
$characterProfile    = $CharacterProfileApi->get('test-realm', 'test-character');
```
It provides class constants named FIELD_* this summed up as 3rd parameter defines which additional character data you want to load.
```php
$fields = CharacterProfile::FIELD_ITEMS + CharacterProfile::FIELD_PROFESSIONS;
$characterProfile    = $CharacterProfileApi->get('test-realm', 'test-character', $fields);
```
This example will load the base character profile in combination with the items and professions of this character.

At this point there are unfortunately no comments describing the needed parameters. I may add them in the future.

## Built With

* [Guzzle](https://github.com/guzzle/guzzle) - for sending requests to API
* [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client) - Dealing with user OAuth authorization
* [Battle.NET APIs](https://develop.battle.net/) - The endpoint we like to access

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/Jared87/BlizzardAPI/tags). 

## Authors

* **Jared Falkenhagen** - *Initial work* - [Jared87](https://github.com/Jared87)

See also the list of [contributors](https://github.com/Jared87/BlizzardAPI/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
