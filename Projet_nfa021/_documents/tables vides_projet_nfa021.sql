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
        PRIMARY KEY (id_outil ) ,
        UNIQUE (nom_outil )
)ENGINE=MyISAM;


CREATE TABLE version(
        id_version     int (11) Auto_increment  NOT NULL ,
        version_biblio Varchar (25) ,
        id_biblio      Int NOT NULL ,
        PRIMARY KEY (id_version )
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
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_biblio )
)ENGINE=MyISAM;


CREATE TABLE date(
        id_date     int (11) Auto_increment  NOT NULL ,
        date_action Date NOT NULL ,
        PRIMARY KEY (id_date ) ,
        UNIQUE (date_action )
)ENGINE=MyISAM;


CREATE TABLE temps_limite(
        id_temps_limite int (11) Auto_increment  NOT NULL ,
        temps           Double ,
        PRIMARY KEY (id_temps_limite ) ,
        UNIQUE (temps )
)ENGINE=MyISAM;


CREATE TABLE memoire_limite(
        id_memoire int (11) Auto_increment  NOT NULL ,
        memoire    Double ,
        PRIMARY KEY (id_memoire ) ,
        UNIQUE (memoire )
)ENGINE=MyISAM;


CREATE TABLE temps_execution(
        id_temps_execution int (11) Auto_increment  NOT NULL ,
        chrono             Double NOT NULL ,
        PRIMARY KEY (id_temps_execution )
)ENGINE=MyISAM;


CREATE TABLE preuve(
        id_preuve          int (11) Auto_increment  NOT NULL ,
        trouve             Bool NOT NULL ,
        id_test            Int NOT NULL ,
        id_temps_execution Int NOT NULL ,
        PRIMARY KEY (id_preuve )
)ENGINE=MyISAM;


CREATE TABLE appel(
        id_appel        int (11) Auto_increment  NOT NULL ,
        commentaire     Text ,
        id_temps_limite Int NOT NULL ,
        id_memoire      Int NOT NULL ,
        id_utilisateur  Int NOT NULL ,
        id_coeur        Int ,
        PRIMARY KEY (id_appel )
)ENGINE=MyISAM;


CREATE TABLE test(
        id_test     int (11) Auto_increment  NOT NULL ,
        nom_test    Varchar (100) ,
        id_preuve   Int NOT NULL ,
        id_outil    Int NOT NULL ,
        id_date     Int NOT NULL ,
        id_probleme Int NOT NULL ,
        PRIMARY KEY (id_test )
)ENGINE=MyISAM;


CREATE TABLE categorie(
        id_categorie   int (11) Auto_increment  NOT NULL ,
        nom_categorie  Varchar (25) ,
        id_biblio      Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_categorie )
)ENGINE=MyISAM;


CREATE TABLE version_outil(
        id_version_outil  int (11) Auto_increment  NOT NULL ,
        nom_version_outil Varchar (25) ,
        PRIMARY KEY (id_version_outil ) ,
        UNIQUE (nom_version_outil )
)ENGINE=MyISAM;


CREATE TABLE sous_categorie(
        id_sous_categorie  int (11) Auto_increment  NOT NULL ,
        nom_sous_categorie Varchar (10) ,
        id_categorie       Int NOT NULL ,
        PRIMARY KEY (id_sous_categorie )
)ENGINE=MyISAM;


CREATE TABLE coeur(
        id_coeur int (11) Auto_increment  NOT NULL ,
        nombre   Int ,
        PRIMARY KEY (id_coeur )
)ENGINE=MyISAM;


CREATE TABLE editer(
        id_outil         Int NOT NULL ,
        id_version_outil Int NOT NULL ,
        PRIMARY KEY (id_outil ,id_version_outil )
)ENGINE=MyISAM;


CREATE TABLE executer(
        id_outil Int NOT NULL ,
        id_appel Int NOT NULL ,
        PRIMARY KEY (id_outil ,id_appel )
)ENGINE=MyISAM;

ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_id_date FOREIGN KEY (id_date) REFERENCES date(id_date);
ALTER TABLE version ADD CONSTRAINT FK_version_id_biblio FOREIGN KEY (id_biblio) REFERENCES bibliotheque_TPTP(id_biblio);
ALTER TABLE probleme ADD CONSTRAINT FK_probleme_id_sous_categorie FOREIGN KEY (id_sous_categorie) REFERENCES sous_categorie(id_sous_categorie);
ALTER TABLE probleme ADD CONSTRAINT FK_probleme_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE bibliotheque_TPTP ADD CONSTRAINT FK_bibliotheque_TPTP_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE preuve ADD CONSTRAINT FK_preuve_id_test FOREIGN KEY (id_test) REFERENCES test(id_test);
ALTER TABLE preuve ADD CONSTRAINT FK_preuve_id_temps_execution FOREIGN KEY (id_temps_execution) REFERENCES temps_execution(id_temps_execution);
ALTER TABLE appel ADD CONSTRAINT FK_appel_id_temps_limite FOREIGN KEY (id_temps_limite) REFERENCES temps_limite(id_temps_limite);
ALTER TABLE appel ADD CONSTRAINT FK_appel_id_memoire FOREIGN KEY (id_memoire) REFERENCES memoire_limite(id_memoire);
ALTER TABLE appel ADD CONSTRAINT FK_appel_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE appel ADD CONSTRAINT FK_appel_id_coeur FOREIGN KEY (id_coeur) REFERENCES coeur(id_coeur);
ALTER TABLE test ADD CONSTRAINT FK_test_id_preuve FOREIGN KEY (id_preuve) REFERENCES preuve(id_preuve);
ALTER TABLE test ADD CONSTRAINT FK_test_id_outil FOREIGN KEY (id_outil) REFERENCES outil(id_outil);
ALTER TABLE test ADD CONSTRAINT FK_test_id_date FOREIGN KEY (id_date) REFERENCES date(id_date);
ALTER TABLE test ADD CONSTRAINT FK_test_id_probleme FOREIGN KEY (id_probleme) REFERENCES probleme(id_probleme);
ALTER TABLE categorie ADD CONSTRAINT FK_categorie_id_biblio FOREIGN KEY (id_biblio) REFERENCES bibliotheque_TPTP(id_biblio);
ALTER TABLE categorie ADD CONSTRAINT FK_categorie_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE sous_categorie ADD CONSTRAINT FK_sous_categorie_id_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie);
ALTER TABLE editer ADD CONSTRAINT FK_editer_id_outil FOREIGN KEY (id_outil) REFERENCES outil(id_outil);
ALTER TABLE editer ADD CONSTRAINT FK_editer_id_version_outil FOREIGN KEY (id_version_outil) REFERENCES version_outil(id_version_outil);
ALTER TABLE executer ADD CONSTRAINT FK_executer_id_outil FOREIGN KEY (id_outil) REFERENCES outil(id_outil);
ALTER TABLE executer ADD CONSTRAINT FK_executer_id_appel FOREIGN KEY (id_appel) REFERENCES appel(id_appel);
