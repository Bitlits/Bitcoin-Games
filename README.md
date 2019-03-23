<p align="center">
<img src="https://i.postimg.cc/HLmRx2My/logo.png" width="140" align="center">
  </p>
<h1 align="center"> Bitlits </h1> <br>
<p align="center">
  <a href="https://bitlits.com">
  </a>
</p>

<p align="center">
  Bitlits in your pocket.
</p>

<p align="center">
  <a href="https://itunes.apple.com/us/app/">
    <img alt="Download on the App Store" title="App Store" src="http://i.imgur.com/0n2zqHD.png" width="140">
  </a>

  <a href="https://play.google.com/store/apps/details?id=io.gonative.android.xrwyjq">
    <img alt="Get it on Google Play" title="Google Play" src="http://i.imgur.com/mtGRPuM.png" width="140">
  </a>
</p>

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Feedback](#getting-involved)
- [Mission](#mission)
- [Installation](#installation)
- [Sponsors](#donate)

## Introduction
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/altcoincasino/Lobby?utm_source=share-link&utm_medium=link&utm_campaign=share-link)
[![GitHub issues](https://img.shields.io/github/issues/Jfaler/bitcoin-casino.svg)](https://github.com/Jfaler/Bitcoin-Slot-Machine/issues)
![](https://img.shields.io/github/stars/jfaler/bitcoin-casino.svg)
[![](https://img.shields.io/twitter/follow/bitlits.svg?label=Follow&style=social)](https://twitter.com/bitlits)

:memo: Available Translations: [Korean](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/KO_README.md) | [Simplified Chinese](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/) | [Brazilian Portuguese](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/) | [Traditional Chinese](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/) | [Spanish](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/) | [Turkish](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/) | [German](https://github.com/Jfaler/bitcoin-casino/blob/master/doc/)
Official repository for a crypto-currency casino implementation using the PHP framework and other cutting-edge technology. User accounts are anonymous and created with a unique hash. Weekly and Monthly jackpots are taken from slot rolls.

### Mission

Our mission is to build the worlds best crypto-currency game with a high performance gaming engine which can be trusted and enjoyed by users. Additionally, we want to move the crypto-currency gaming technology forward by providing support and add new features. We are helping people to build their own crypto gaming site around the world.

Help is greatly appreciated, feel free to submit pull-requests or open issues.

### Features

* 🎰 Designed as a high performance crypto-currency game.
* 🧠 Built-in high performance RNG-engine.
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


### Requirements

* Linux
* Git 1.7.10+
* Sqlite
* Mustache
* PhpLiteAdmin v1.9.7.1
* Apache2
* RedBean

** More details are in the [doc](doc).

### Getting started

* [Setup on Mac OS X](doc/setup-local-osx.md)
* [Setup on Ubuntu](doc/setup-local-ubuntu.md)
* [Deploy production server](doc/deploy-production-server.md)

## Installation

* <p>Sign up with <a target="_blank" href="https://m.do.co/c/397fb2277475">Digital Ocean</a><img width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /></p>
* Install LAMP https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04
* Edit the configuration file `sudo nano /base/init.php`
* Install Litecoin & start the Litecoin Daemon `sudo litecoind` https://github.com/Jfaler/Bitcoin-Casino/wiki/Install-Litecoin-for-Bitcoin-Casino-&-Bitcoin-Slot-Machine
* Edit the configuration file `sudo nano /vendor/sql/phpliteadmin.conf.php`
* Access PhpLiteAdmin Dashboard http://example.com/vendor/sql/phpliteadmin.php

### Clone

- Clone this repo to your local machine using `sudo git clone https://github.com/Jfaler/Bitcoin-Casino`

## Getting Involved

Want to report a bug, request a feature, contribute or translate Bitcoin-Casino?


### Step 1

- **Option 1**
    - 🍴 Fork & star this repo!

- **Option 2**
    - 👯 Clone this repo to your local machine using `https://github.com/Jfaler/Bitcoin-Casino.git`

- **Option 3**
    - 🔔 Browse our [issues](https://github.com/Jfaler/Bitcoin-Casino/issues), comment on proposals, report bugs.

### Step 2

- **HACK AWAY!** 🔨🔨🔨

### Step 3

- 🔃 Create a new pull request using <a href="https://github.com/jfaler/Bitcoin-Casino/compare/" target="_blank">`https://github.com/jfaler/Bitcoin-Casino/compare/`</a>.

### Step 4

- **Option 1**
    - Anything you want to tell us please send it to: 📥 [support@bitlits.com](mailto:support@bitlits.com)
    
- **Option 2**
    - If you need technical support or customization service, contact us: 📥 [contact@bitlits.com](mailto:contact@bitlits.com)
    
## Donate
Every satoshi of your kind donation goes into the ongoing work of making this project more awesome. Want to sponsor this project? Send a donation & logo to: 📥 [contact@bitlits.com](mailto:contact@bitlits.com)
