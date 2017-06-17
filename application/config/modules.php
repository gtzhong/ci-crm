<?php
defined('BASEPATH') or exit('No direct script access allowed');

$modules = array(
    'actions'              => array('table' => 't_actions', 'name' => 'Actions'),
    'adresses'             => array('table' => 't_adresses', 'name' => 'Adresses'),
    'airmail'              => array('table' => 't_airmail', 'name' => 'Airmail'),
    'alertes'              => array('table' => 't_alertes', 'name' => 'Alertes'),
    'amalgame'             => array('table' => 't_amalgame', 'name' => 'Amalgame'),
    'articles'             => array('table' => 't_articles', 'name' => 'Articles'),
    'avoirs'               => array('table' => 't_avoirs', 'name' => 'Avoirs'),
    'boites_archive'       => array('table' => 't_boites_archive', 'name' => 'Boites archive'),
    'cartes_blues'         => array('table' => 't_cartes_blues', 'name' => 'Cartes blues'),
    'catalogues'           => array('table' => 't_catalogues', 'name' => 'Catalogues'),
    'commandes'            => array('table' => 't_commandes', 'name' => 'Commandes'),
    'contacts'             => array('table' => 't_contacts', 'name' => 'Contacts'),
    //'controle_recurrents'  => array('table' => 't_controle_recurrents', 'name' => 'Controle recurrents'),
    'correspondants'       => array('table' => 't_correspondants', 'name' => 'correspondants'),
    'developpers_followup' => array('table' => 't_developpers_followup', 'name' => 'Developpers followup'),
    //'devis'                => array('table' => 't_devis', 'name' => 'Devis'),
    'disques_archivage'    => array('table' => 't_disques_archivage', 'name' => 'Disques archivage'),
    'documents_autres'     => array('table' => 't_documents_autres', 'name' => 'Documents autres'),
    'documents_contacts'   => array('table' => 't_documents_contacts', 'name' => 'Documents contacts'),
    'documents_employes'   => array('table' => 't_documents_employes', 'name' => 'Documents employes'),
    'documents_factures'   => array('table' => 't_documents_factures', 'name' => 'Documents factures'),
    'document_templates'   => array('table' => 't_document_templates', 'name' => 'Document templates'),
    'domains'              => array('table' => 't_domains', 'name' => 'Domains'),
    'droits'               => array('table' => 't_droits', 'name' => 'Droits utilisation'),
    'emails_emp'           => array('table' => 't_emails_emp', 'name' => 'Emails emp'),    
    'employes'             => array('table' => 't_employes', 'name' => 'Employes'),
    'evenements'           => array('table' => 't_evenements', 'name' => 'Evenements'),
    'factures'             => array('table' => 't_factures', 'name' => 'Factures'),
    'factures_compta'      => array('table' => 't_factures_compta', 'name' => 'Factures compta'),
    'feuilles_de_tri'      => array('table' => 't_feuilles_de_tri', 'name' => 'Feuilles de tri'),
    'feuille_controle'     => array('table' => 't_feuille_controle', 'name' => 'Feuille controle'),
    'feuille_de_route'     => array('table' => 't_feuille_de_routes', 'name' => 'Feuille de routes'),
    //'files'                => array('table' => 't_files', 'name' => 'Ged'),
    'gestion_heures'       => array('table' => 't_gestion_heures', 'name' => 'Gestion heures'),
    'hosts'                => array('table' => 't_hosts', 'name' => 'Hosts'),
    'imputations'          => array('table' => 't_imputations', 'name' => 'Imputations'),
    'ips'                  => array('table' => 't_ips', 'name' => 'Ips'),
    'lignes_factures'      => array('table' => 't_lignes_factures', 'name' => 'Lignes factures'),
    'list_utilisateurs'    => array('table' => 't_utilisateurs', 'name' => 'List Utilisateurs'),
    'livraisons'           => array('table' => 't_livraisons', 'name' => 'Livraisons'),
    'mailchimp'            => array('table' => 't_mailchimp', 'name' => 'Mailchimp'),
    'manual_sending'       => array('table' => 't_manual_sending', 'name' => 'Manual sending'),
    'max_bulk'             => array('table' => 't_max_bulk', 'name' => 'Max bulk'),
    //'messages'             => array('table' => 't_messages', 'name' => 'Messages'),
    'message_list'         => array('table' => 't_message_list', 'name' => 'Message_list'),
    'modeles_documents'    => array('table' => 't_modeles_documents', 'name' => 'Modeles documents'),
    'objectif'             => array('table' => 't_objectif', 'name' => 'Objectif'),
    //'objectifs'            => array('table' => 't_objectifs', 'name' => 'Objectifs'),
    'openemm'              => array('table' => 't_openemm', 'name' => 'Openemm'),
    'ordres_production'    => array('table' => 't_ordres_production', 'name' => 'Ordres production'),
    'owners'               => array('table' => 't_owners', 'name' => 'Owners'),
    'pages_jaunes'         => array('table' => 't_pages_jaunes', 'name' => 'Pages jaunes'),
    'plaintes'             => array('table' => 't_plaintes', 'name' => 'Plaintes'),   
    'production_mails'     => array('table' => 't_production_mails', 'name' => 'Production mails'),
    'profils'              => array('table' => 't_profils', 'name' => 'Profils'),   
    'providers'            => array('table' => 't_providers', 'name' => 'Providers'),
    'purchases'            => array('table' => 't_purchases', 'name' => 'Purchases'),
    'rbl_list'             => array('table' => 't_rbl_liste', 'name' => 'Rbl liste'),
    //'reglements'           => array('table' => 't_reglements', 'name' => 'Reglements'),
    'secteurs'             => array('table' => 't_secteurs', 'name' => 'Secteurs'),
    'sendgrid'             => array('table' => 't_sendgrid', 'name' => 'Sendgrid'),
    'sendinblue'           => array('table' => 't_sendinblue', 'name' => 'Sendinblue'),
    'servers'              => array('table' => 't_servers', 'name' => 'Servers'),
    'societes_vendeuses'   => array('table' => 't_societes_vendeuses', 'name' => 'Societes vendeuses'),
    'softwares'            => array('table' => 't_softwares', 'name' => 'Softwares'),
    'suivi_adwords'        => array('table' => 't_suivi_adwords', 'name' => 'Suivi_adwords'),
    'taches'               => array('table' => 't_taches', 'name' => 'Taches'),
    'taux_tva'             => array('table' => 't_taux_tva', 'name' => 'Taux tva'),
    'telephones'           => array('table' => 't_telephones', 'name' => 'Telephones'),
    'tests_followup'       => array('table' => 't_tests_followup', 'name' => 'Tests followup'),
    'users_permissions'     => array('table' => 't_users_permissions', 'name' => "Users Permissions"),    
    'vehicules'            => array('table' => 't_vehicules', 'name' => 'Vehicules'),
    'villes'               => array('table' => 't_villes', 'name' => 'Villes'),
    'vues'                 => array('table' => 't_vues', 'name' => 'Vues'),
);
