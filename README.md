# Bitcoin-keno
Bitcoin keno using the blockchain

![iphonekeno](https://cloud.githubusercontent.com/assets/8336385/21592965/289ac59c-d0c7-11e6-9ec3-8459e37b9678.jpg)

## Version 

v1.0.0.0

## Usage 
```$ git clone https://github.com/Jfaler/Palletizer.git
```



## TODO List

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




## License 

This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
