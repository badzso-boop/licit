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