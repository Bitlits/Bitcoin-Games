<p align="center">
<img src="https://i.postimg.cc/HLmRx2My/logo.png" width="140" align="center">
  </p>
<p align="center">
  <a href="https://bitlits.com">
  </a>
</p>

<p align="center">
  <a href="https://itunes.apple.com/us/app/">
    <img alt="Download on the App Store" title="App Store" src="http://i.imgur.com/0n2zqHD.png" width="140">
  </a>

  <a href="https://play.google.com/store/apps/details?id=io.gonative.android.xrwyjq">
    <img alt="Get it on Google Play" title="Google Play" src="http://i.imgur.com/mtGRPuM.png" width="140">
  </a>
</p>

## Translations
🇬🇷 [ελληνικά](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇫🇷 [Français](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇰🇷 [한국어](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/KO_README.md) | 🇨🇳 [普通話](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇹🇼 [台灣話](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇲🇽 [Español](https://github.com/Jfaler/Bitcoin-Casino/blob/master/doc/) | 🇹🇷 [Türkçe](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇩🇪 [Deutsch](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇮🇹 [Italiano](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇮🇳 [हिन्दी](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | [Arabic](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇵🇹 [Português](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇷🇺 [Русский язык](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇯🇵 [日本語](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/) | 🇻🇳 [tiếng việt](https://github.com/bitlits/Bitcoin-Casino/blob/master/doc/)

### Features

* 🎰 Designed as a high performance cryptocurrency game.
* 🧠 Built-in high performance RNG-engine.
* 🙊 Anonymous login with no sign up required.
* ⚖️ Provably Fair - Each game has a single transaction ID (TXID for short). To get the winning numbers, we convert the TXID from base 16 to base 10 and then pick the first two numbers from the TXID as the winning numbers.
* 💡 Usability and scalability.
* ⚛️ Supports multiple digital currencies (eg. Bitcoin, Litecoin, Dogecoin etc.).
* 📖 Powerful admin dashboard and management tools.
* 🔧 Highly configurable and extendable.
* 🔐 Industry standard security out of the box.
* 💬 Active community behind.

## Release History

* 1.0
    * CHANGE: Update docs (module code remains unchanged)

## 🔧 Prerequisites 

* Ubuntu 18.04
* Git 1.7.10+
* Sqlite
* Mustache
* PhpLiteAdmin v1.9.8.2
* Apache2
* RedBean

## 🚀 Installation & Deployment

* <p>Sign up with <a target="_blank" href="https://m.do.co/c/397fb2277475">Digital Ocean</a><img width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /></p>
* Install LAMP https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04
* Edit the configuration file `sudo nano /base/init.php`
* Install Litecoin & start the Litecoin Daemon `sudo litecoind` https://github.com/bitlits/Bitcoin-Casino/wiki/Install-Litecoin-for-Bitcoin-Casino-&-Bitcoin-Slot-Machine
* Edit the configuration file `sudo nano /vendor/sql/phpliteadmin.conf.php`
* Access PhpLiteAdmin Dashboard http://example.com/vendor/sql/phpliteadmin.php
