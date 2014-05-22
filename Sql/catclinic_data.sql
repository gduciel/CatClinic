use catclinic;

insert into chat(nom, age, tatouage) values ('Sylvestre', 7, 'ABCDEF');
insert into chat(nom, age, tatouage) values ('Ninja', 1, 'ABCDEG');
insert into chat(nom, age, tatouage) values ('Grosminet', 10, 'ABCDEH');

insert into praticien(nom, prenom) values ('Jean', 'Matou');
insert into praticien(nom, prenom) values ('Félix', 'Lechat');
insert into praticien(nom, prenom) values ('Sylvain', 'Minou');

insert into utilisateur(login, motdepasse) values ('invite', SHA1('invite123cat5'));
insert into utilisateur(login, motdepasse, admin) values ('admincat', SHA1('admincat123cat5'), 1);

insert into proprietaire(nom, prenom, id_utilisateur, id_chat) values ('Ferrandez', 'Sébastien', 1, 1);

insert into visite(id_praticien, id_chat, date, prix, observations) values (1,1,current_timestamp(), 79.90, 'Opération bien déroulée');
