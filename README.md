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

# DESIGN
- menusor legalul
- termekek listazasa telefonon tiktok/insta szeruen
- termek licit -> bybit app
- termekek ara grafikonszeruen megjelenik

# KÉSÖBBI FEATUREOK
1. popup felület -> hirlevel
2. google maps
3. php hirlevel rendszer
4. wbesocket -> php + js
5. regisztrációnál interaktívan lehet hobbyt, foglalkozást, kedvenc sportot, kedvenc zenei előadót választani -> személyreszabott termékek ajánlása
6. virtual wallet

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
    - title          VARCHAR
    - description   VARCHAR
    - images        VARCHAR -> , separator
    - postDate      DATE
    - owner         VARCHAR
    - price         INT
    - priceMin      INT
    - pPrice        VARCHAR -> previous price (tombben tarolja az elozo arakat es ebbol ijra ki a grafikont)

# SQL
- CREATE DATABASE IF NOT EXISTS adnijo DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
- CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY,
    uname VARCHAR(256) UNIQUE,
    name VARCHAR(256),
    email VARCHAR(256) UNIQUE,
    bornDate DATE,
    type VARCHAR(25),
    badge VARCHAR(512),
    coupon VARCHAR(255),
    level INT,
    hobby VARCHAR(256),
    work VARCHAR(256),
    sport VARCHAR(256),
    music VARCHAR(256)
);
- CREATE TABLE products(
    id INT NOT NULL PRIMARY KEY,
    uid INT,
    title VARCHAR(256),
    description VARCHAR(512),
    images VARCHAR(512),
    postDate DATE,
    owner VARCHAR(256),
    price INT,
    priceMin INT,
    pPrice VARCHAR(512),
    FOREIGN KEY(uid) REFERENCES users(id)
);
