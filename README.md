# HRTec Recruitment Task

Recruitment task for HRTec. PHP app fetching Atom/RSS data into a CSV file.

- [Installation](#installation)
- [Usage](#usage)


## Installation

Run this command in terminal

``` sh
composer install
```


## Usage

`<URL>` - Atom/RSS feed URL

`<PATH>` - Path to CSV file in which we will save RSS feed.

``` sh
php src/console.php csv:simple <URL> <PATH>
php src/console.php csv:extended <URL> <PATH>
```

Example:
``` sh
php src/console.php csv:simple http://www.nationalgeographic.it/rss/natura/animali/rss2.0.xml example.csv
php src/console.php csv:extended http://www.nationalgeographic.it/rss/natura/animali/rss2.0.xml example.csv
```
