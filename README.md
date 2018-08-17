# Welcome to my Codeigniter template

This is a simple template I created to be able to start a Codeigniter project in just a few minutes.

This reduces the amount of time I spend in creating a new Codeigniter project. Before, I used to download Codeigniter on their website every time I need to create a new project. And then I update the config, htaccess, route etc and install packages I need individually.

I then decided to create a simple template and just pull the template whenever I start a new Codeigniter project. Cool!

## Features
- Codeigniter 3.1.9.
- Apache only (you need to configure on your own on nginx).
- Bootstrap 4.
- Sass.
- Auto minify HTML, CSS and JavaScript files.
- Optimized images.
- Auto generate distribution files using **gulp-watch** or **gulp-serve**.
- Auto reload browser when made changes on PHP files under `application/` folder.
- Automatically applies changes to the browser when changes made on assets.
- Automatic setting of `$config['base_url']`.
- Automatic rewrite **www** and/ or **http**.
- Assets expiration with versioning.
- Optimization score on desktop (89/ 100) and mobile (100/ 100) on [Google PageSpeed Insights](https://developers.google.com/speed/pagespeed/insights/?url=http%3A%2F%2Fcodeigniter-3.1.9-template.earvinpiamonte.com).
- A and 100 Performance grade on [Pingdom Website Speed Test](https://tools.pingdom.com/#!/cUsx85/http://codeigniter-3.1.9-template.earvinpiamonte.com/).

## Development dependencies
I really like using Sass as my CSS preprocessor on every project. Before, I use Less but now I use Sass. Hahaha, very punny. No? Okay here are the dependencies:
- [Node.js](https://nodejs.org/en/)
- [Sass](http://sass-lang.com/install)

## Download
Open up your terminal and make sure you are on the document root of your web server. For eg. **/var/www/html/** or **c:/wamp/www/** then do:
```
git clone https://gitlab.com/earvinpiamonte/codeigniter-3.1.9-template.git
```

## Install packages

Install packages needed for the project to run and the packages to be used on development.

```
cd codeigniter-3.1.9-template/assets/src/
npm install
```

## Create distribution files

On the same folder `assets/src/` do:

```
gulp
```

## Watch (optional)

You can also watch your `assets/src` files and then it will automatically apply changes to your distribution files `assets/dist`.

On the same folder `assets/src/` do:

```
gulp watch
```

## Serve (optional but cool)

You can also auto reload your browser/ inject styles whenever you make changes on  `assets/src` files and and *.php* files inside `application` then it will automatically apply changes to your distribution files `assets/dist`.

Check first `assets/src/gulpfile.js` on line number 21 and change the value for **proxy** to your preference.

eg. default:
```javascript
browserSync.init({
        proxy: 'localhost/codeigniter-3.1.9-template/'
});
```

On the same folder `assets/src/` do:

```
gulp serve
```

## DONE!
> Just feel it BBOOM BBOOM!
> -- MOMOLAND

## Screenshots

### Optimization
Google PageSpeed Insights (desktop)
![google pagespeed insights desktop](http://codeigniter-3.1.9-template.earvinpiamonte.com/assets/dist/images/screenshot-pagespeed-desktop.png)

Google PageSpeed Insights (mobile)
![google pagespeed insights mobile](http://codeigniter-3.1.9-template.earvinpiamonte.com/assets/dist/images/screenshot-pagespeed-mobile.png)

Pingdom Website Speed Test
![pingdom website speed test](http://codeigniter-3.1.9-template.earvinpiamonte.com/assets/dist/images/screenshot-pingdom-speed-test.png)
