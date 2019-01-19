# Shine Solar Email Signature Creator
Email signatures are often an afterthought (if a thought at all) when you become a new employee at *any* place of work, but they are something (if done well) that you see and think "wow, that's something that I want for myself!". The problem is, these signatures are created with [HTML](https://en.wikipedia.org/wiki/HTML) and [CSS](https://en.wikipedia.org/wiki/Cascading_Style_Sheets) and are not easily edited by a user who may not know technology very well. This little tool fixes that problem. Using [Progressive Web App](https://en.wikipedia.org/wiki/Progressive_web_applications) technology, we have brought you this app. With the company template designed by our Director of Design, [Nic Moseley](https://nicmoseley.com/) (reachable at nmoseley@shinesolar.com) and the backend logic developed by our Lead Developer, Adam McGurk (reachable at amcgurk@shinesolar.com) this tool allows everyone in the Shine Solar to generate a usuable copy and paste email signature with no need to touch any code at all!

## Getting Started
If you want to see the video tutorial of how to do it - [Click Here](https://www.youtube.com/watch?v=5pGRWepi5TM)

### Launching your own version of the Email Signature app
This was built to be just a springboard to launch other company's email signature apps. It should be very easy to customize and implement. If you want just a 'drag and drop' version of this software for your own uses, I would fork the repo, call it my-company's-fork-EmailSignature and just edit the stuff under the 'src' folder. Here is what you need to edit to get up and rolling:
1. The /src/assets folder has all of our images and icons (mainly just presentational svgs). But for things like 'logo.svg', you could simply replace it with your own logo and there would be no need to code anymore.
2. /src/html_includes directory has the code for the beginning of our main page *and* our template file in the head.php file. It also has our loading animation and the mobile stopper (because currently our company uses Outlook, there's not a good way to get this signature into somebody's signature editor on mobile). 
3. The /src/js folder has only the main.js file. This contains the PWA code and some *very* light input validation logic. There should be no need to change this file except if you want to do something different altogether on the PWA side.
4. The /src/model folder has our model.php file. This contains all of the business logic that validates the data and spits out the data needed to populate the signature. If you want to stick to the same basic things, there should be no need to edit the file unless you want to validate different/more data.
5. The src/style folder is probably where you'll make the most changes. We used SCSS when creating this CSS and the actual SCSS is in four different partials in the /src/style/partials folder. They are what they say in the name, so you can hack away there. Altogether, unminified and pure SCSS, it's less than 350 lines. It's not very intimidating and it's very easy to change.
6. The /src/view folder is probably where you'll spend your second most amount of time. This is where the home page and the email templates are. It's pretty straight ahead HTML in both of those things. The only PHP there is in the page.php file (the main page) is file includes, and one error echo if a server error variable is set. And where the email signature HTML starts is the `<table>` tag in the template.php file. 
7. The root of the src folder contains the favicons (change this to what you want), more PWA stuff (the manifest file and the service worker. Edit the service worker with caution and follow the comments! The manifest file is pretty straightforward.), and the controller (index.php). There should be NO reason to edit the controller unless you know what you're doing.

## Contributing
Please read [CONTRIBUTING.md](CONTRIBUTING.md) for more information on our request formats

## Versioning
Our versioning scheme goes like this: Major.Minor.Patch

**Major** - These are major feature changes or whole application changes. This won't happen too often

**Minor** - These are minor feature changes or major bug fixes, these will probably be the most frequent releases.

**Patch** - These are small changes. These are just routine bugs being fixed and/or code refactoring.

## Authors
* **Adam McGurk** - *Development* 
* **Nic Moseley** - *UX Design*
