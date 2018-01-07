create database hurtownia charset latin2 collate latin2_general_ci;
use hurtownia;

CREATE TABLE klienci (
id_klienta int not null AUTO_INCREMENT,
imie varchar(20) not null,
nazwisko varchar(20) not null,
ulica varchar(30) not null,
miasto varchar(20) not null,
kod_pocztowy int(10) not null,
telefon int(20) not null,
nip varchar(30),
CONSTRAINT k_pk PRIMARY KEY(id_klienta)
) ;

CREATE TABLE pracownicy (
id_pracownika int not null AUTO_INCREMENT,
imie varchar(20) not null,
nazwisko varchar(20) not null,
adres varchar(30),
CONSTRAINT p_pk PRIMARY KEY(id_pracownika)
);

CREATE TABLE magazyn (
id_produktu int not null AUTO_INCREMENT,
cena float,
ilosc int,
CONSTRAINT m_pk PRIMARY KEY(id_produktu)
);

CREATE TABLE dostawcy(
id_dostawcy int not null,
nazwa_dostawcy varchar(30),
email varchar(20),
CONSTRAINT d_pk PRIMARY KEY(id_dostawcy)
);

CREATE TABLE logowanie(
id_klienta int not null,
login_klienta varchar(20) not null,
haslo_klienta varchar(200) not null,
pracownik boolean,
CONSTRAINT log_pk PRIMARY KEY(id_klienta),
CONSTRAINT log_fk FOREIGN KEY(id_klienta) REFERENCES  klienci(id_klienta)
);


CREATE TABLE baza_produktow(
id_produktu int not null,
nazwa varchar(40),
kategoria enum('monitory', 'hardware', 'obudowy', 'akcesoria'),
id_dostawcy int not null,
popularnosc int default 0;
CONSTRAINT bp_pk PRIMARY KEY(id_produktu),
CONSTRAINT bp_fk1 FOREIGN KEY(id_produktu) REFERENCES magazyn(id_produktu),
CONSTRAINT bp_fk2 FOREIGN KEY(id_dostawcy) REFERENCES dostawcy(id_dostawcy)
);

CREATE TABLE zamowienie(
id_zamowienia int not null AUTO_INCREMENT,
id_klienta int not null,
data_zamowienia TIMESTAMP,
status ENUM('zamowione', 'realizacja', 'wyslane'),
kwota float,
CONSTRAINT zm_pk PRIMARY KEY(id_zamowienia),
CONSTRAINT zm_fk1 FOREIGN KEY(id_klienta) REFERENCES logowanie(id_klienta)
);

CREATE TABLE dane_zamowienia(
id_produktu int not null,
id_zamowienia int not null,
ilosc_zamowionych int not null,

CONSTRAINT dz_pk PRIMARY KEY(id_produktu, id_zamowienia),
CONSTRAINT dz_fk FOREIGN KEY(id_produktu) REFERENCES baza_produktow(id_produktu),
CONSTRAINT dz_fk1 FOREIGN KEY(id_zamowienia) REFERENCES zamowienie(id_zamowienia)
);

use hurtownia;
INSERT INTO klienci(id_klienta, imie, nazwisko, ulica, miasto, kod_pocztowy, telefon) VALUES(1, 'Jurek', 'Owsiak', 'Wrzeciono', 'Warszawa', 23851, 446112113);
INSERT INTO klienci(id_klienta, imie, nazwisko, ulica, miasto, kod_pocztowy, telefon) VALUES(2, 'Pracownik', 'Czarek', 'Czarnobylska', 'Prypeć', 45956, 45847489);

INSERT INTO pracownicy(id_pracownika, imie, nazwisko, adres) VALUES(1, 'Diho', 'Orangutan', 'Ty z ekipą ja sam z bronią');

INSERT INTO logowanie(id_klienta, login_klienta, haslo_klienta, pracownik) VALUES(1, 'test', '202cb962ac59075b964b07152d234b70',0);
INSERT INTO logowanie(id_klienta, login_klienta, haslo_klienta, pracownik) VALUES(2, 'pracownik', '202cb962ac59075b964b07152d234b70',1);

INSERT INTO dostawcy VALUES(1, 'go4PC', 'gopc@example.com');
INSERT INTO dostawcy VALUES(2, 'pchardware', 'pchard@example.com');
INSERT INTO dostawcy VALUES(3, 'whocares', 'wc3@example.com'); 

INSERT INTO magazyn VALUES(1, 412.99, 30);
INSERT INTO magazyn VALUES(2, 79.30, 40);
INSERT INTO magazyn VALUES(3, 315.80, 10);
INSERT INTO magazyn VALUES(4, 25.69, 20);
INSERT INTO magazyn VALUES(5, 65.40, 50);
INSERT INTO magazyn VALUES(6, 685.42, 27);
INSERT INTO magazyn VALUES(7, 2540.00, 3);
INSERT INTO magazyn VALUES(8, 365.99, 42);
INSERT INTO magazyn VALUES(9, 99.85, 30);
INSERT INTO magazyn VALUES(10, 100.23, 18);

INSERT INTO baza_produktow VALUES(1, 'LG G21', 'monitory', 1);
INSERT INTO baza_produktow VALUES(2, 'GOODRAM BR12 DDR3', 'hardware', 2);
INSERT INTO baza_produktow VALUES(3, 'INTEL i3 4500K', 'hardware', 1);
INSERT INTO baza_produktow VALUES(4, 'HUB USB X3', 'akcesoria', 3);
INSERT INTO baza_produktow VALUES(5, 'Karta sieciowa LAN', 'akcesoria', 2);
INSERT INTO baza_produktow VALUES(6, 'EZIO Z450 27"', 'monitory', 3);
INSERT INTO baza_produktow VALUES(7, 'GeForce GTX1080', 'hardware', 1);
INSERT INTO baza_produktow VALUES(8, 'AMD FX434', 'hardware', 1);
INSERT INTO baza_produktow VALUES(9, 'Obudowa Aerocool Q34', 'akcesoria', 1);
INSERT INTO baza_produktow VALUES(10, 'Klawiatura Corsair Strafe', 'akcesoria', 3);



