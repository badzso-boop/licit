# LICIT - ROADMAP
0. Adatbázis kiépítése
1. Belépés/Regisztráció
    - GOOGLE FIÓK/APPLE FIÓK szinkronizálás ?
    - Belépés
        - felhasználónév/email
        - jelszó
    - Regisztráció
        - Név
        - Születési dátum
        - felhasználónév
        - email
        - jelszó
2. Admin/User felület
3. Admin user management
4. Admin termék feltöltés
5. User termék megjelenítés
6. navbar kesobb visszaallitasa a fejlesztoi kornyezetrol
7. Felhasználó törlésnél kérdezze meg, hogy az adott felhasználóhoz tartozó adatok melyik felhasznalora szaljanak ra

# FELADATOK
- regisztráció
    - sql injection elleni védelem
    - 16 alatt nem lehet regelni
    - nincs 2 azonos felhasznalonev
    - nincs 2 azonos email, ha igen popup hogy elfelejtett jelszo
    - **REGEX**
- belépés
    - email cim/felhasznalonev alapjan
- elfelejtett jelszo
    - php email system
- kilépés
    - session_destroy()

# PHP EMAIL SYSTEM
- elfelejtett jelszo
- admin feluletbol uj jelszo kuldese

# DESIGN
- menusor legalul
- termekek listazasa telefonon tiktok/insta szeruen
- termek licit -> bybit app
- termekek ara grafikonszeruen megjelenik -> charts.css (https://chartscss.org/)
- bootstrap icons

# KÉSÖBBI FEATUREOK
1. popup felület -> hirlevel
2. google maps
3. php hirlevel rendszer
4. wbesocket -> php + js
5. regisztrációnál interaktívan lehet hobbyt, foglalkozást, kedvenc sportot, kedvenc zenei előadót választani -> személyreszabott termékek ajánlása
6. virtual wallet
7. hirdetesek -> https://adsense.google.com/intl/hu_hu/start/?utm_campaign=Googledevproductsadsense

# ADATBÁZIS TERV
(MINDEN ANGOL AZ EGYSÉG KEDVÉÉRT)
- users
    - id            INT
    - uname         VARCHAR
    - name          VARCHAR
    - email         VARCHAR
    - bornDate      DATE
    - type          VARCHAR -> felhasznalonak a tipusa (admin, user)
    
    - badge         VARCHAR -> kiemelt jelvenyek, juttatasok
    - coupon        VARCHAR -> ha valamilyen juttatasban reszesul
    - level         INT
    - hobby         VARCHAR
    - work          VARCHAR
    - sport         VARCHAR
    - music         VARCHAR
- products
    - id            INT
    - uid           INT -> foreign key -> users.id
    - title         VARCHAR
    - description   VARCHAR
    - images        VARCHAR -> , separator
    - postDate      DATE
    - owner         VARCHAR
    - price         INT
    - priceMin      INT
    - steppingPrice INT
    - pPrice        VARCHAR -> previous price (tombben tarolja az elozo arakat es ebbol ijra ki a grafikont)
- bid_table -> bid logging
    - id            INT
    - uid           INT -> user id
    - pid           INT -> product id
    - bidAmount     INT
    - timeStamp     DATE/TIME
- payments -> payment logging
    - id
    - uid           INT -> user id
    - pid           INT -> product id
    - price         INT
    - paymentStatus VARCHAR
    - timeStamp     DATE/TIME

# SQL
- CREATE DATABASE IF NOT EXISTS adnijo DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
- CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    uname VARCHAR(256) UNIQUE,
    name VARCHAR(256),
    email VARCHAR(256) UNIQUE,
    bornDate DATE,
    type VARCHAR(25),
    pwd VARCHAR(512),
    profileImg VARCHAR(256),
    about VARCHAR(1024),
    links VARCHAR(512),
    badge VARCHAR(512),
    coupon VARCHAR(255),
    level INT,
    addr VARCHAR(255),
    phone VARCHAR(15),
    zip INT,
    city VARCHAR(255),
    hobby VARCHAR(256),
    work VARCHAR(256),
    sport VARCHAR(256),
    music VARCHAR(256)
);
- CREATE TABLE products(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    uid INT,
    title VARCHAR(256),
    description VARCHAR(512),
    images VARCHAR(512),
    postDate DATE,
    owner VARCHAR(256),
    price INT,
    priceMin INT,
    pPrice VARCHAR(512),
    steppingPrice INT,
    pPrice VARCHAR(512),
    FOREIGN KEY(uid) REFERENCES users(id)
);
- CREATE TABLE usersLog(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    uname VARCHAR(255)
    date DATE,
    workType VARCHAR(255),
    workerUser VARCHAR(255),
);
