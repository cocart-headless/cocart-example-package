<h1 align="center">CoCart Example Package</h1>

<p align="center"><img src="https://raw.githubusercontent.com/co-cart/co-cart/trunk/.wordpress-org/banner-772x250.png" alt="Headless API for Developers" /></p>

<br>

This is an example feature plugin package for [CoCart](https://cocartapi.com/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart). It is setup so that it can be installed as a standalone WordPress plugin, or included into CoCart as a Composer Package.

## Main directories and files

- `cocart-example-package.php` - The main plugin file. ONLY used when using this package as a plugin!
- `load-package.php` - Same as the main plugin file but without the plugin header. Used when installed into CoCart as a package with composer. [See guide for instructions](https://github.com/co-cart/co-cart/tree/dev/plugins).
- `includes/class-cocart-example-package.php` - The package class requires 1 static method; 
  - `init` - Init your package. If it needs to hook into WordPress, do so here.


## License

Released under [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

---

## CoCart API Channels

We have different channels at your disposal where you can find information about the CoCart project, discuss it and get involved:

[![Twitter: cocartapi](https://img.shields.io/twitter/follow/cocartapi?style=social)](https://twitter.com/cocartapi) [![CoCart GitHub Stars](https://img.shields.io/github/stars/co-cart/co-cart?style=social)](https://github.com/co-cart/co-cart)


<ul>
  <li>📖 <strong>Documentation</strong>: this is the place to learn how to use CoCart API. <a href="https://cocartapi.com/docs/?utm_medium=repo&utm_source=github&utm_campaign=readme&utm_content=cocartcore">Get started!</a></li>
  <li>👪 <strong>Community</strong>: use our Discord chat room to share any doubts, feedback and meet great people. This is your place too to share <a href="https://cocartapi.com/community/?utm_medium=repo&utm_source=github&utm_campaign=readme&utm_content=cocartcore">how are you planning to use CoCart!</a></li>
  <li>🐞 <strong>GitHub</strong>: we use GitHub for bugs and pull requests, doubts are solved with the community.</li>
  <li>🐦 <strong>Social media</strong>: a more informal place to interact with CoCart users, reach out to us on <a href="https://twitter.com/cocartapi">X/Twitter.</a></li>
</ul>

---

## Credits

Website [cocartapi.com](https://cocartapi.com?utm_medium=repo&utm_source=github.com&utm_campaign=readme&utm_content=cocartcore) &nbsp;&middot;&nbsp;
GitHub [@co-cart](https://github.com/co-cart) &nbsp;&middot;&nbsp;
X/Twitter [@cocartapi](https://twitter.com/cocartapi)
[Facebook](https://www.facebook.com/cocartforwc/) &nbsp;&middot;&nbsp;
[Instagram](https://www.instagram.com/cocartheadless/)
