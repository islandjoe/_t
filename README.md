**Why Timber?** WordPress can really be a nightmare for dev teams. It's because you mix the PHP codes with the HTML codes in the file. This means there is no separation of concerns, such that, the frontend guys get to see the logic codes when developing their frontend stuff, and the backend guys also get to see HTML, JS codes, and probably CSS codes scattered about on the same page.
Enter Timber. It enables SoC by supercharging WordPress with MVC capability. Read more about [Timber here](https://github.com/timber/timber).

**Why underscores?** I want a theme that's very customizable, clean, and barebones so that I can build the frontend from a clean slate, unencumbered by bells and whistles. Underscores is just such a theme.

But alas, I couldn't find a theme that has built-in support for Timber. Hence I created one, thus, \_t (timberscores).

I used \_t on these websites: https://roboformacion.com  and https://wanderlusting.me

[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

_t
===

Hi. I'm a starter theme called `_t`, or `timbers`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in `inc/custom-header.php` that can be activated/deactivated by toggling a one line comment in `functions.php` and adding the code snippet found in the comments of `inc/custom-header.php` to the `template-parts/base.twig` template.
* Custom template tags in `inc/template-tags.php` and `inc/timber.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/extras.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

If you want the vanilla underscores, head over to http://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want the Timberized version, download `_t` from GitHub. The first thing you want to do is copy the `_t` directory and change the name to something else (like, say, `wanderlusting`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_t'` (inside single quotations) to capture the text domain.
2. Search for `_t_` to capture all the function names.
3. Search for `Text Domain: _t` in style.css.
4. Search for <code>&nbsp;_t</code> (with a space before it) to capture DocBlocks.
5. Search for `_t-` to capture prefixed handles.

OR

* Search for: `'_t'` and replace with: `'wanderlusting'`
* Search for: `_t_` and replace with: `wanderlusting_`
* Search for: `Text Domain: _t` and replace with: `Text Domain: wanderlusting` in style.css.
* Search for: <code>&nbsp;_t</code> and replace with: <code>&nbsp;Wanderlusting</code>
* Search for: `_t-` and replace with: `wanderlusting-`

Then, update the stylesheet header in `style.css` and/or `style.scss` and the links in `template-parts/base.twig` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
