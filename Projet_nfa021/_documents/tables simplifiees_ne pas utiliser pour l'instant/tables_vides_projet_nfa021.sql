#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


CREATE TABLE utilisateur(
        id_utilisateur int (11) Auto_increment  NOT NULL ,
        administrateur Bool ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        pseudo         Varchar (25) NOT NULL ,
        email          Varchar (100) NOT NULL ,
        password       Varchar (25) NOT NULL ,
        sexe           Char (1) NOT NULL ,
        id_date        Int NOT NULL ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=MyISAM;


CREATE TABLE outil(
        id_outil  int (11) Auto_increment  NOT NULL ,
        nom_outil Varchar (50) NOT NULL ,
        version   Varchar (25) ,
        PRIMARY KEY (id_outil ) ,
        UNIQUE (nom_outil )
)ENGINE=MyISAM;


CREATE TABLE probleme(
        id_probleme       int (11) Auto_increment  NOT NULL ,
        nom_probleme      Varchar (50) NOT NULL ,
        id_sous_categorie Int NOT NULL ,
        id_utilisateur    Int NOT NULL ,
        PRIMARY KEY (id_probleme ) ,
        UNIQUE (nom_probleme )
)ENGINE=MyISAM;


CREATE TABLE bibliotheque_TPTP(
        id_biblio      int (11) Auto_increment  NOT NULL ,
        nom_biblio     Varchar (25) NOT NULL ,
        version        Varchar (25) ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_biblio )
)ENGINE=MyISAM;


CREATE TABLE date(
        id_date     int (11) Auto_increment  NOT NULL ,
        date_action Date NOT NULL ,
        PRIMARY KEY (id_date ) ,
        UNIQUE (date_action )
)ENGINE=MyISAM;


CREATE TABLE appel(
        id_appel       int (11) Auto_increment  NOT NULL ,
        commentaire    Text ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_appel )
)ENGINE=MyISAM;


CREATE TABLE test(
        id_test         int (11) Auto_increment  NOT NULL ,
        nom_test        Varchar (100) ,
        preuve_trouvee  Bool ,
        temps_execution Varchar (25) ,
        nb_coeur        Int ,
        temps_limite    Double ,
        memoire_limite  Double ,
        id_outil        Int NOT NULL ,
        id_date         Int NOT NULL ,
        id_probleme     Int NOT NULL ,
        PRIMARY KEY (id_test )
)ENGINE=MyISAM;


CREATE TABLE categorie(
        id_categorie   int (11) Auto_increment  NOT NULL ,
        nom_categorie  Varchar (25) ,
        id_biblio      Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_categorie )
)ENGINE=MyISAM;


CREATE TABLE sous_categorie(
        id_sous_categorie  int (11) Auto_increment  NOT NULL ,
        nom_sous_categorie Varchar (10) ,
        id_categorie       Int NOT NULL ,
        PRIMARY KEY (id_sous_categorie )
)ENGINE=MyISAM;


CREATE TABLE executer(
        id_outil Int NOT NULL ,
        id_appel Int NOT NULL ,
        PRIMARY KEY (id_outil ,id_appel )
)ENGINE=MyISAM;

ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_id_date FOREIGN KEY (id_date) REFERENCES date(id_date);
ALTER TABLE probleme ADD CONSTRAINT FK_probleme_id_sous_categorie FOREIGN KEY (id_sous_categorie) REFERENCES sous_categorie(id_sous_categorie);
ALTER TABLE probleme ADD CONSTRAINT FK_probleme_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE bibliotheque_TPTP ADD CONSTRAINT FK_bibliotheque_TPTP_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE appel ADD CONSTRAINT FK_appel_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE test ADD CONSTRAINT FK_test_id_outil FOREIGN KEY (id_outil) REFERENCES outil(id_outil);
ALTER TABLE test ADD CONSTRAINT FK_test_id_date FOREIGN KEY (id_date) REFERENCES date(id_date);
ALTER TABLE test ADD CONSTRAINT FK_test_id_probleme FOREIGN KEY (id_probleme) REFERENCES probleme(id_probleme);
ALTER TABLE categorie ADD CONSTRAINT FK_categorie_id_biblio FOREIGN KEY (id_biblio) REFERENCES bibliotheque_TPTP(id_biblio);
ALTER TABLE categorie ADD CONSTRAINT FK_categorie_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE sous_categorie ADD CONSTRAINT FK_sous_categorie_id_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie);
ALTER TABLE executer ADD CONSTRAINT FK_executer_id_outil FOREIGN KEY (id_outil) REFERENCES outil(id_outil);
ALTER TABLE executer ADD CONSTRAINT FK_executer_id_appel FOREIGN KEY (id_appel) REFERENCES appel(id_appel);
