
-- BDD_ENERBIOFLEX

-- CREATION TABLES

CREATE TABLE `utilisateur` (
	`id_utilisateur` INT NOT NULL,
	`nom` varchar(255) NOT NULL,
	`prenom` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`mot_de_passe` varchar(255) NOT NULL,
	`date_de_naissance` DATE NOT NULL,
	`numeros_telephone` varchar(255) NOT NULL,
	`type` varchar(255) NOT NULL,
	`id_ville` INT NOT NULL,
	`est_pro` BOOLEAN NOT NULL,
	`profession` varchar(255) NOT NULL,
	`nom_entreprise` varchar(255) NOT NULL,
	`voie` varchar(255) NOT NULL,
	`photo_profil` varchar(255) NOT NULL,
	`id_alerte` INT NOT NULL,
	PRIMARY KEY (`id_utilisateur`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `alerte` (
	`id_alerte` INT NOT NULL,
	`frequence` INT NOT NULL,
	PRIMARY KEY (`id_alerte`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ressource` (
	`id_ressource` INT NOT NULL,
	`ressource` varchar(255) NOT NULL,
	PRIMARY KEY (`id_ressource`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `article` (
	`id_article` INT NOT NULL,
	`titre` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`voie` varchar(255) NOT NULL,
	`photo` varchar(255) NOT NULL,
	`prix` FLOAT NOT NULL,
	`date_publication` DATE NOT NULL,
	`date_peremption` DATE NOT NULL,
	`id_utilisateur` INT NOT NULL,
	`id_ville` INT NOT NULL,
	`id_departement` INT NOT NULL,
	`id_region` INT NOT NULL,
	`id_ressource` INT NOT NULL,
	`id_statistique` INT NOT NULL,
	PRIMARY KEY (`id_article`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ville` (
	`id_ville` INT NOT NULL,
	`ville` varchar(255) NOT NULL,
	`code_postal` INT NOT NULL,
	PRIMARY KEY (`id_ville`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `departement` (
	`id_departement` INT NOT NULL,
	`departement` varchar(255) NOT NULL,
	PRIMARY KEY (`id_departement`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `region` (
	`id_region` INT NOT NULL,
	`region` varchar(255) NOT NULL,
	PRIMARY KEY (`id_region`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `lieu` (
	`id_ville` INT NOT NULL,
	`id_departement` INT NOT NULL,
	`id_region` INT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `statistique` (
	`id_statistique` BINARY NOT NULL,
	`nb_vues` INT NOT NULL,
	`nb_clics` INT NOT NULL,
	PRIMARY KEY (`id_statistique`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- AUTO INCREMENT


-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `id_alerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `id_ressource` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `statistique`
--
ALTER TABLE `statistique`
  MODIFY `id_statistique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;




ALTER TABLE `lieu`
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_ville` (`id_ville`);
  
  
ALTER TABLE `ville`
  ADD KEY `id_ville` (`id_ville`);
  
ALTER TABLE `departement`
  ADD KEY `id_departement` (`id_departement`);
  
ALTER TABLE `region`
  ADD KEY `id_region` (`id_region`);
  
ALTER TABLE `utilisateur`
  ADD KEY `id_utilisateur` (`id_utilisateur`);

  
ALTER TABLE `alerte`
  ADD KEY `id_alerte` (`id_alerte`);
  
ALTER TABLE `statistique` 
  ADD KEY `id_statistique` (`id_statistique`);
  
  
ALTER TABLE `ressource` 
  ADD KEY `id_ressource` (`id_ressource`);


--

ALTER TABLE `utilisateur` ADD CONSTRAINT `utilisateur_fk0` FOREIGN KEY (`id_ville`) REFERENCES `lieu`(`id_ville`);

ALTER TABLE `utilisateur` ADD CONSTRAINT `utilisateur_fk1` FOREIGN KEY (`id_alerte`) REFERENCES `alerte`(`id_alerte`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk0` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur`(`id_utilisateur`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk1` FOREIGN KEY (`id_ville`) REFERENCES `lieu`(`id_ville`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk2` FOREIGN KEY (`id_departement`) REFERENCES `lieu`(`id_departement`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk3` FOREIGN KEY (`id_region`) REFERENCES `lieu`(`id_region`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk4` FOREIGN KEY (`id_ressource`) REFERENCES `ressource`(`id_ressource`);

ALTER TABLE `article` ADD CONSTRAINT `article_fk5` FOREIGN KEY (`id_statistique`) REFERENCES `statistique`(`id_statistique`);

ALTER TABLE `lieu` ADD CONSTRAINT `lieu_fk0` FOREIGN KEY (`id_ville`) REFERENCES `ville`(`id_ville`);

ALTER TABLE `lieu` ADD CONSTRAINT `lieu_fk1` FOREIGN KEY (`id_departement`) REFERENCES `departement`(`id_departement`);

ALTER TABLE `lieu` ADD CONSTRAINT `lieu_fk2` FOREIGN KEY (`id_region`) REFERENCES `region`(`id_region`);




INSERT INTO `ressource` (`id_ressource`, `ressource`) VALUES
(1, 'Effluent'),
(2, 'Effluent liquide'),
(3, 'Effluent solide'),
(4, 'Déchets verts'),
(5, 'Electrique'),
(6, 'Thermique'),
(7, 'Autre');

