# Humble Associates

## Getting Started

### Setup Composer
[Composer](https://getcomposer.org/) - Get Composer

the wp-config.php file uses dynamic variables. composer deals with this

Setup composer, then create an ".env" file in the "wp" folder, which contains the following, change the values to match the server:

```
DB_NAME="DBNAME"
DB_USER="USERNAME"
DB_PASSWORD="PASSWORD"
DB_HOST="localhost"
TABLE_PREFIX="db_wp_"
AUTH_KEY='8o^z(Ei`iH[Y4_%1nFfBfj3 )y79$U;_0u^k84 ~;+7v6U25%YUg>prk:?cu=31x'
SECURE_AUTH_KEY='Tp9*tWO0W_./Uurq?xgQ,MK1%5^dm4EBT T-RHFKIGJ8iR8}<kI1y&KFUg>q.!rq'
LOGGED_IN_KEY='v?_bL&.j4]1??x1zW>!B~5I R<i_- b26?8Wgz+y7y8|Nl}M^HutM~n$$A/KOwG='
NONCE_KEY='*a.QcdA4ZKp$Wm|D`/ZTk:ZU,]/fw!n(G/9,wB5#0xzrR:aK{!y,X{cyRH Atd'
AUTH_SALT'='l*k8X)RYkqex35}Wp-}`(*dF:UK1PNcaiK[MyEMvYZBFi/Lk>~SmA0kA-&e18AFs'
SECURE_AUTH_SALT='RY3G  bIm1+6xyl~Q~&)DOS&U13K]g?@*?@x)a!Fgg{-;qpq)Lc0(-d>M.a^*r_0'
LOGGED_IN_SALT='}:~re|fn?Y9&C:pTPLwyLe]kdh^,cN18iB{JjqZ<|0RlcIkN4Mf/7$S&VK3ch8Sv'
NONCE_SALT=')uL[~t@xEZoVo}M63)1yyE-MB(jsGv2(q*nATsj:HxGKfOaG#0A{kIP`Sa64RoJr'
WP_CACHE_KEY_SALT='XT_=RG373gkUh7c;jzL|b`(gZm$v5&7v?tSG<wA3WN:6vJ>ZLH6IivAq]`C/fq]n'
```

Then run "composer install" in "wp" directory

### Build
From the ROOT directory, run "npm install" then "npm start" whilst in development, or "npm run build" for final build

