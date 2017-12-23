 [![GitHub issues](https://img.shields.io/github/issues/Jfaler/Bitcoin-Slot-Machine.svg)](https://github.com/Jfaler/Bitcoin-Slot-Machine/issues)

:memo: Available Translations: [Korean](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/ko-KR/project/README.md) | [Simplified Chinese](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/zh-CN/project/README.md) | [Brazilian Portuguese](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/pt-BR/project/README.md) | [Traditional Chinese](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/zh-TW/project/README.md) | [Spanish](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/es/project/README.md) | [Turkish](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/tr-TR/project/README.md) | [German](https://github.com/Jfaler/bitcoin-slot-machine/tree/master/docs-translations/de-DE/project/README.md)

![iphonekeno](https://cloud.githubusercontent.com/assets/8336385/21592965/289ac59c-d0c7-11e6-9ec3-8459e37b9678.jpg)

# Bitcoin-Keno
Official repository for Bitcoin Keno a crypto-currency casino implementation with the PHP framework and other cutting-edge technology. User accounts are anonymous and created with a unique hash. Slots are progressive. Weekly and Monthly jackpots are taken from slot rolls.

## Version 

v1.0.0.0

### Mission

Our mission is to build the worlds best crypto-currency casino with a high performance gaming engine which can be trusted and enjoyed by users. Additionally, we want to move the crypto-currency casino technology forward by providing support and add new features. We are helping people to build their own crypto gaming site around the world.

Help is greatly appreciated, feel free to submit pull-requests or open issues.

### Features

* Designed as high performance crypto currency slot machine.
* Built-in high performance RNG-engine.
* Built-in [Proof of Solvency] Audit.
* Usability and scalability.
* Supports multiple digital currencies (eg. Bitcoin, Litecoin, Dogecoin etc.).
* Powerful admin dashboard and management tools.
* Highly configurable and extendable.
* Industry standard security out of box.
* Active community behind.

### Requirements

* Linux / Mac OSX
* Git 1.7.10+
* MySQL

** More details are in the [doc](doc).

### Getting started

* [Setup on Mac OS X](doc/setup-local-osx.md)
* [Setup on Ubuntu](doc/setup-local-ubuntu.md)
* [Deploy production server](doc/deploy-production-server.md)

## Installation
`
$ git clone https://github.com/Jfaler/Bitcoin-Slot-Machine
`

Page
->Enter Address
->Roll
->Send depositAddress/gameType
->Store
->Send back generatedAddress based on ID.
->Send Back Addy
->Check for txid/payment

Cron
->Check all open games that are less than 30 minutes old
->Check if each recieved funds
->Store amount/txid
->Calculate rate/winAmount based off gameType/txid
->Set to pending if winAmount > 0 else finished
->Store

Cron
->Check all pending games
->Get winAmount/depositAddress
->Send funds
->Set game finished
->Store

### Getting Involved

Want to report a bug, request a feature, contribute or translate Bitlits?

* Browse our [issues](https://github.com/Jfaler/bitcoin-slot-machine/issues), comment on proposals, report bugs.
* Clone the bitcoin-slot-machine repo, make some changes according to our development guidelines and issue a pull-request with your changes.
* Anything you want to tell us please send it to [jfaler216@student.msjc.edu](mailto:jfaler216@student.msjc.edu)
* If you need technical support or customization service, contact us: [jfaler216@student.msjc.edu](mailto:jfaler216@student.msjc.edu)
