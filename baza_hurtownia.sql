create database hurtownia charset latin2 collate latin2_general_ci;
use hurtownia;

CREATE TABLE klienci (
id_klienta int not null,
imie varchar(20) not null,
nazwisko varchar(20) not null,
ulica varchar(30) not null,
miasto varchar(20) not null,
kod_pocztowy int(10) not null,
telefon int(20) not null,
nip int(30),
CONSTRAINT k_pk PRIMARY KEY(id_klienta)
) ENGINE = InnoDB;

CREATE TABLE pracownicy (
id_pracownika int not null,
imie varchar(20) not null,
nazwisko varchar(20) not null,
adres varchar(30),
CONSTRAINT p_pk PRIMARY KEY(id_pracownika)
) ENGINE = InnoDB;

CREATE TABLE magazyn (
id_produktu int not null,
cena float,
ilosc int,
CONSTRAINT m_pk PRIMARY KEY(id_produktu)
)ENGINE=InnoDB;

CREATE TABLE dostawcy(
id_dostawcy int not null,
nazwa_dostawcy varchar(30),
email varchar(20),
CONSTRAINT d_pk PRIMARY KEY(id_dostawcy)
) ENGINE=InnoDB;

CREATE TABLE logowanie_klienta(
id_klienta int not null,
login_klienta varchar(20) not null,
haslo_klienta varchar(20) not null,
CONSTRAINT log_pk PRIMARY KEY(id_klienta),
CONSTRAINT log_fk FOREIGN KEY(id_klienta) REFERENCES  klienci(id_klienta)
) ENGINE=InnoDB;

CREATE TABLE logowanie_pracownika(
id_pracownika int not null,
login_pracownika varchar(20) not null,
haslo_pracownika varchar(20) not null,
CONSTRAINT logp_pk PRIMARY KEY(id_pracownika),
CONSTRAINT logp_fk FOREIGN KEY(id_pracownika) REFERENCES pracownicy(id_pracownika)
) ENGINE=InnoDB;

CREATE TABLE baza_produktow(
id_produktu int not null,
nazwa varchar(40),
jednostka int,
kategoria enum('monitory', 'hardware', 'obudowy', 'akcesoria'),
id_dostawcy int not null,
CONSTRAINT bp_pk PRIMARY KEY(id_produktu),
CONSTRAINT bp_fk1 FOREIGN KEY(id_produktu) REFERENCES magazyn(id_produktu),
CONSTRAINT bp_fk2 FOREIGN KEY(id_dostawcy) REFERENCES dostawcy(id_dostawcy)
) ENGINE=InnoDB;

CREATE TABLE zamowienie(
id_zamowienia int not null,
id_klienta int not null,
data_zamowienia TIMESTAMP,
status ENUM('zamowione', 'realizacja', 'wyslane'),
data_doreczenia DATE,
CONSTRAINT zm_pk PRIMARY KEY(id_zamowienia),
CONSTRAINT zm_fk1 FOREIGN KEY(id_klienta) REFERENCES logowanie_klienta(id_klienta)
) ENGINE=InnoDB;

CREATE TABLE dane_zamowienia(
id_produktu int not null,
id_zamowienia int not null,
CONSTRAINT dz_pk PRIMARY KEY(id_produktu, id_zamowienia),
CONSTRAINT dz_fk FOREIGN KEY(id_produktu) REFERENCES baza_produktow(id_produktu),
CONSTRAINT dz_fk1 FOREIGN KEY(id_zamowienia) REFERENCES zamowienie(id_zamowienia)
)ENGINE=InnoDB;





