<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: bernardtrevisan_imac
 * Date: 13/02/2016
 * Time: 11:02
 */
$administrateur = 'Administrateur';
$commercial     = 'Commercial';
$client = 'Droits limités';

require_once( BASEPATH .'database/DB.php' );

$db =& DB();

//route for module pages
$query = $db->select('prf_id as id, prf_nom as profil')->get('t_profils');
$result = $query->result();
$all_profils = array();
$extra_profil = array($administrateur, $commercial);

foreach( $result as $row )
{
    $all_profils[] = $row->profil;
    if($row->id == 3) {
        $extra_profil[] = $row->profil;
    }

    if($row->id == 4) {
        $extra_profil[] = $row->profil;
    }
}



$droits = array(
    'actions.index' => array($administrateur,$commercial),
    'actions.actions_utilisateur' => array($administrateur,$commercial),
    'actions.historique' => array($administrateur,$commercial),
    'actions.detail' => array($administrateur,$commercial),
    'actions.restaurer' => array($administrateur,$commercial),
    'adresses.adresses_secteur' => array($administrateur,$commercial),
    'adresses.nouveau' => array($administrateur,$commercial),
    'adresses.detail' => array($administrateur,$commercial),
    'adresses.modification' => array($administrateur,$commercial),
    'adresses.suppression' => array($administrateur,$commercial),
    'alertes.index' => array($administrateur,$commercial),
    'alertes.detail' => array($administrateur,$commercial),
    'alertes.acquitter' => array($administrateur,$commercial),
    'articles.articles_cat' => array($administrateur,$commercial),
    'articles.detail' => array($administrateur,$commercial),
    'articles_devis.articles_devis' => array($administrateur,$commercial),
    'articles_devis.detail' => array($administrateur,$commercial),
    'avoirs.index' => array($administrateur,$commercial),
    'avoirs.avoirs_client' => array($administrateur,$commercial),
    'avoirs.detail' => array($administrateur,$commercial),
    'avoirs.modification' => array($administrateur,$commercial),
    'avoirs.suppression' => array($administrateur,$commercial),
    'boites_archive.index' => array($administrateur,$commercial),
    'boites_archive.nouveau' => array($administrateur,$commercial),
    'boites_archive.detail' => array($administrateur,$commercial),
    'boites_archive.modification' => array($administrateur,$commercial),
    'boites_archive.suppression' => array($administrateur,$commercial),
    'catalogues.index' => array($administrateur,$commercial),
    'catalogues.nouveau' => array($administrateur,$commercial),
    'catalogues.detail' => array($administrateur,$commercial),
    'catalogues.modification' => array($administrateur,$commercial),
    'catalogues.suppression' => array($administrateur,$commercial),
    'catalogues.importation' => array($administrateur,$commercial),
    'catalogues.exportation' => array($administrateur,$commercial),
    'commandes.index' => array($administrateur,$commercial),
    'commandes.commandes_client' => array($administrateur,$commercial),
    'commandes.commandes_escli' => array($administrateur,$commercial),
    'commandes.facturer' => array($administrateur,$commercial),
    'commandes.lancer' => array($administrateur,$commercial),
    'commandes.annuler' => array($administrateur,$commercial),
    'commandes.detail' => array($administrateur,$commercial),
    'commandes.detail_escli' => array($administrateur,$commercial),
    'contacts.index' => array($administrateur,$commercial),
    'contacts.nouveau' => array($administrateur,$commercial),
    'contacts.detail' => array($administrateur,$commercial),
    'contacts.modification' => array($administrateur,$commercial),
    'contacts.suppression' => array($administrateur,$commercial),
    'contacts.fichiers' => array($administrateur,$commercial),  
    'contact_document_files.index' => array($administrateur,$commercial),
    'contact_document_files.nouveau' => array($administrateur,$commercial),
    'contact_document_files.detail' => array($administrateur,$commercial),
    'contact_document_files.modification' => array($administrateur,$commercial),
    'contact_document_files.suppression' => array($administrateur,$commercial),
    'contact_document_files.fichiers' => array($administrateur,$commercial),
    'correspondants.index' => array($administrateur,$commercial),
    'correspondants.correspondants_contact' => array($administrateur,$commercial),
    'correspondants.nouveau' => array($administrateur,$commercial),
    'correspondants.detail' => array($administrateur,$commercial),
    'correspondants.modification' => array($administrateur,$commercial),
    'correspondants.mon_compte' => array($administrateur,$commercial),
    'correspondants.suppression' => array($administrateur,$commercial),
    'devis.index' => array($administrateur,$commercial),
    'devis.devis_client' => array($administrateur,$commercial),
    'devis.passer_commande' => array($administrateur,$commercial),
    'devis.marquer_refus' => array($administrateur,$commercial),
    'devis.envoyer_email' => array($administrateur,$commercial),
    'devis.marquer_transmis' => array($administrateur,$commercial),
    'devis.valider' => array($administrateur,$commercial),
    'devis.dupliquer' => array($administrateur,$commercial),
    'devis.nouveau' => array($administrateur,$commercial),
    'devis.detail' => array($administrateur,$commercial),
    'devis.detail2' => array($administrateur,$commercial),
    'devis.modification' => array($administrateur,$commercial),
    'devis.suppression' => array($administrateur,$commercial),
    'devis.apercu_html' => array($administrateur,$commercial),
    'devis.exporter_pdf' => array($administrateur,$commercial),
    'devis.genere_pdf' => array($administrateur,$commercial),
    'devis.imprimer_pdf' => array($administrateur,$commercial),
    'disques_archivage.index' => array($administrateur,$commercial),
    'disques_archivage.nouveau' => array($administrateur,$commercial),
    'disques_archivage.detail' => array($administrateur,$commercial),
    'disques_archivage.modification' => array($administrateur,$commercial),
    'disques_archivage.suppression' => array($administrateur,$commercial),
    'documents_autres.index' => array($administrateur,$commercial),
    'documents_autres.nouveau' => array($administrateur,$commercial),
    'documents_autres.detail' => array($administrateur,$commercial),
    'documents_autres.modification' => array($administrateur,$commercial),
    'documents_contacts.index' => array($administrateur,$commercial),
    'documents_contacts.documents_contact' => array($administrateur,$commercial),
    'documents_contacts.nouveau' => array($administrateur,$commercial),
    'documents_contacts.detail' => array($administrateur,$commercial),
    'documents_employes.index' => array($administrateur,$commercial),
    'documents_employes.documents_employe' => array($administrateur,$commercial),
    'documents_employes.nouveau' => array($administrateur,$commercial),
    'documents_employes.detail' => array($administrateur,$commercial),
    'documents_factures.index' => array($administrateur,$commercial),
    'documents_factures.nouveau' => array($administrateur,$commercial),
    'documents_factures.detail' => array($administrateur,$commercial),
    'documents_factures.modification' => array($administrateur,$commercial),
    'document_templates.index' => array($administrateur,$commercial),
    'document_templates.nouveau' => array($administrateur,$commercial),
    'document_templates.detail' => array($administrateur,$commercial),
    'document_templates.modification' => array($administrateur,$commercial),
    'droits_utilisation.droits_profil' => array($administrateur),
    'droits_utilisation.nouveau' => array($administrateur),
    'droits_utilisation.detail' => array($administrateur),
    'droits_utilisation.modification' => array($administrateur),
    'droits_utilisation.suppression' => array($administrateur),
    'emails_emp.email' => array($administrateur),
    'employes.index' => array($administrateur),
    'employes.nouveau' => array($administrateur),
    'employes.detail' => array($administrateur),
    'employes.modification' => array($administrateur),
    'employes.suppression' => array($administrateur),
    'evenements.evenements_client' => array($administrateur,$commercial),
    'evenements.nouveau' => array($administrateur,$commercial),
    'evenements.appel' => array($administrateur,$commercial),
    'evenements.email_correspondant' => array($administrateur,$commercial),
    'evenements.email_contact' => array($administrateur,$commercial),
    'evenements.detail' => array($administrateur,$commercial),
    'evenements.modification' => array($administrateur,$commercial),
    'evenements.suppression' => array($administrateur,$commercial),
    'evenements_taches.evenements_tache' => array($administrateur,$commercial),
    'evenements_taches.detail' => array($administrateur,$commercial),
    'factures.index' => array($administrateur,$commercial),
    'factures.factures_client' => array($administrateur,$commercial),
    'factures.transferer_avoir' => array($administrateur,$commercial),
    'factures.saisir_reglement' => array($administrateur,$commercial),
    'factures.envoyer_email' => array($administrateur,$commercial),
    'factures.marquer_transmise' => array($administrateur,$commercial),
    'factures.genere_pdf' => array($administrateur,$commercial),
    'factures.valider' => array($administrateur,$commercial),
    'factures.dupliquer' => array($administrateur,$commercial),
    'factures.detail' => array($administrateur,$commercial),
    'factures.detail2' => array($administrateur,$commercial),
    'factures.modification' => array($administrateur,$commercial),
    'factures.suppression' => array($administrateur,$commercial),
    'factures.apercu_html' => array($administrateur,$commercial),
    'fichiers.pdf' => array($administrateur,$commercial),
    'fichiers.telecharger' => array($administrateur,$commercial),
    'imputations.imputations_client' => array($administrateur,$commercial),
    'imputations.nouveau' => array($administrateur,$commercial),
    'imputations.detail' => array($administrateur,$commercial),
    'imputations.modification' => array($administrateur,$commercial),
    'imputations.suppression' => array($administrateur,$commercial),
    'imputations.tableau' => array($administrateur,$commercial),
    'interface_comptable.index' => array($administrateur,$commercial),
    'lignes_factures.lignes_facture' => array($administrateur,$commercial),
    'lignes_factures.constitution' => array($administrateur,$commercial),
    'messages.emis' => array($administrateur,$commercial),
    'messages.recus' => array($administrateur,$commercial),
    'messages.nouveau' => array($administrateur,$commercial),
    'messages.nouveau_utilisateur' => array($administrateur,$commercial),
    'messages.detail_recu' => array($administrateur,$commercial),
    'messages.detail_emis' => array($administrateur,$commercial),
    'modeles_documents.index' => array($administrateur,$commercial),
    'modeles_documents.nouveau' => array($administrateur,$commercial),
    'modeles_documents.detail' => array($administrateur,$commercial),
    'modeles_documents.modification' => array($administrateur,$commercial),
    'modeles_documents.champs_fusion' => array($administrateur,$commercial),
    'modeles_documents.documents_generes' => array($administrateur,$commercial),
    'objectifs.objectifs_employe' => array($administrateur,$commercial),
    'objectifs.nouveau' => array($administrateur),
    'objectifs.detail' => array($administrateur,$commercial),
    'objectifs.modification' => array($administrateur),
    'objectifs.suppression' => array($administrateur),
    'ordres_production.index' => array($administrateur,$commercial),
    'ordres_production.op_commande' => array($administrateur,$commercial),
    'plaintes.index' => array($administrateur,$commercial),
    'plaintes.nouveau' => array($administrateur,$commercial),
    'plaintes.detail' => array($administrateur,$commercial),
    'plaintes.modification' => array($administrateur,$commercial),
    'plaintes.suppression' => array($administrateur,$commercial),
    'preparation.index' => array($administrateur,$commercial),
    'preparation.preparation' => array($administrateur,$commercial),
    'profils.index' => array($administrateur),
    'profils.nouveau' => array($administrateur),
    'profils.detail' => array($administrateur),
    'profils.modification' => array($administrateur),
    'profils.suppression' => array($administrateur),
    'promotions.index' => array($administrateur,$commercial),
    'reglements.index' => array($administrateur,$commercial),
    'reglements.reglements_client' => array($administrateur,$commercial),
    'reglements.nouveau' => array($administrateur,$commercial),
    'reglements.detail' => array($administrateur,$commercial),
    'reglements.modification' => array($administrateur,$commercial),
//    'reglements.modif_apres_facture' => array($administrateur,$commercial),
    'reglements.suppression' => array($administrateur,$commercial),
    'secteurs.secteurs_ville' => array($administrateur,$commercial),
    'secteurs.nouveau' => array($administrateur,$commercial),
    'secteurs.detail' => array($administrateur,$commercial),
    'secteurs.modification' => array($administrateur,$commercial),
    'societes_vendeuses.index' => array($administrateur,$commercial),
    'societes_vendeuses.nouveau' => array($administrateur),
    'societes_vendeuses.detail' => array($administrateur,$commercial),
    'societes_vendeuses.modification' => array($administrateur),
    'suivi.index' => array($administrateur,$commercial),
    'suivi.suivi' => array($administrateur,$commercial),
    'tableaux_bord.index' => array($administrateur,$commercial),
    'taches.sous_traitees' => array($administrateur,$commercial),
    'taches.affectees' => array($administrateur,$commercial),
    'taches.index' => array($administrateur,$commercial),
    'taches.taches_employe' => array($administrateur,$commercial),
    'taches.nouveau' => array($administrateur,$commercial),
    'taches.nouveau_utilisateur' => array($administrateur,$commercial),
    'taches.detail' => array($administrateur,$commercial),
    'taches.detail_sous_traitee' => array($administrateur,$commercial),
    'taches.detail_affectee' => array($administrateur,$commercial),
    'taches.modification' => array($administrateur,$commercial),
    'taches.annuler' => array($administrateur,$commercial),
    'taches.terminer' => array($administrateur,$commercial),
    
    'contacts.fichiers' => array($administrateur,$commercial),
    '.index' => array($administrateur,$commercial),
    'index.index' => array($administrateur,$commercial),
    'vigik.index' => array($administrateur,$commercial),
    'fraiskm.index' => array($administrateur,$commercial),
    'v.7.4.index' => array($administrateur,$commercial),
    
    'purchases.index' => array($administrateur,$commercial),
    'purchases.create' => array($administrateur,$commercial),
    'purchases.modification' => array($administrateur,$commercial),
    'purchases.detail' => array($administrateur,$commercial),   
    'purchases.archive' => array($administrateur,$commercial),
    'purchases.suppression' => array($administrateur,$commercial),
    
    'users_permissions.settings' => array($administrateur),

    'demande_devis_general.index' => array($administrateur,$commercial),
    'demande_devis_general.nouveau' => array($administrateur,$commercial),
    'demande_devis_general.modification' => array($administrateur,$commercial),
    'demande_devis_general.detail' => array($administrateur,$commercial),    
    'demande_devis_general.archive' => array($administrateur,$commercial),
    'demande_devis_general.suppression' => array($administrateur,$commercial),

    'demande_devis_commerciaux_dt.index' => array($administrateur,$commercial),
    'demande_devis_commerciaux_dt.nouveau' => array($administrateur,$commercial),
    'demande_devis_commerciaux_dt.modification' => array($administrateur,$commercial),
    'demande_devis_commerciaux_dt.detail' => array($administrateur,$commercial),    
    'demande_devis_commerciaux_dt.archive' => array($administrateur,$commercial),
    'demande_devis_commerciaux_dt.suppression' => array($administrateur,$commercial),

    'demande_devis_quick_followup.index' => array($administrateur,$commercial),
    'demande_devis_quick_followup.nouveau' => array($administrateur,$commercial),
    'demande_devis_quick_followup.modification' => array($administrateur,$commercial),
    'demande_devis_quick_followup.detail' => array($administrateur,$commercial),    
    'demande_devis_quick_followup.archive' => array($administrateur,$commercial),
    'demande_devis_quick_followup.suppression' => array($administrateur,$commercial), 
    
    'emm_followup.index' => array($administrateur,$commercial),
    'emm_followup.nouveau' => array($administrateur,$commercial),
    'emm_followup.modification' => array($administrateur,$commercial),
    'emm_followup.detail' => array($administrateur,$commercial),    
    'emm_followup.archive' => array($administrateur,$commercial),
    'emm_followup.suppression' => array($administrateur,$commercial),         

    'taux_tva.index' => array($administrateur,$commercial),
    'taux_tva.nouveau' => array($administrateur,$commercial),
    'taux_tva.detail' => array($administrateur,$commercial),
    'taux_tva.modification' => array($administrateur,$commercial),
    'taux_tva.suppression' => array($administrateur,$commercial),
    // 'utilisateurs.accueil' => array($administrateur,$commercial,$client),
    //'utilisateurs.logout' => array($administrateur,$commercial,$client),
    'utilisateurs.login' => array('public'),
    'utilisateurs.index' => array($administrateur),
    'utilisateurs.utilisateurs_profil' => array($administrateur),
    'utilisateurs.nouveau' => array($administrateur),
    'utilisateurs.detail' => array($administrateur),
    'utilisateurs.modification' => array($administrateur),
    'utilisateurs.suppression' => array($administrateur),
    'utilisateurs.mon_compte' => array($administrateur,$commercial),
    'utilisateurs.modification_param' => array($administrateur,$commercial),
    'utilisateurs.detail_param' => array($administrateur,$commercial),
    'utilisateurs.chgt_mdp' => array($administrateur,$commercial),
    'utilisateurs.taches' => array($administrateur,$commercial),
    'utilisateurs.objectifs' => array($administrateur,$commercial),
    'villes.index' => array($administrateur,$commercial),
    'villes.nouveau' => array($administrateur,$commercial),
    'villes.detail' => array($administrateur,$commercial),
    'villes.modification' => array($administrateur,$commercial),
    'vues.vues' => array($administrateur,$commercial),
    'vues.detail' => array($administrateur,$commercial),
    'vues.modification' => array($administrateur,$commercial),
    'vues.suppression' => array($administrateur,$commercial),

    'commandes_trier.index' => array($administrateur,$commercial),
    'commandes_trier.create' => array($administrateur,$commercial),
    'commandes_trier.modification' => array($administrateur,$commercial),
    'commandes_trier.detail' => array($administrateur,$commercial), 
    'commandes_trier.archive' => array($administrateur,$commercial),
    'commandes_trier.suppression' => array($administrateur,$commercial), 

    'feuilles_de_tri.index' => array($administrateur,$commercial),
    'feuilles_de_tri.create' => array($administrateur,$commercial),
    'feuilles_de_tri.modification' => array($administrateur,$commercial),
    'feuilles_de_tri.detail' => array($administrateur,$commercial), 
    'feuilles_de_tri.archive' => array($administrateur,$commercial),
    'feuilles_de_tri.suppression' => array($administrateur,$commercial),

    'feuille_de_route.index' => array($administrateur,$commercial),
    'feuille_de_route.create' => array($administrateur,$commercial),
    'feuille_de_route.modification' => array($administrateur,$commercial),
    'feuille_de_route.detail' => array($administrateur,$commercial), 
    'feuille_de_route.archive' => array($administrateur,$commercial),
    'feuille_de_route.suppression' => array($administrateur,$commercial),

    'list_utilisateurs.index' => array($administrateur,$commercial),
    'list_utilisateurs.create' => array($administrateur,$commercial),
    'list_utilisateurs.modification' => array($administrateur,$commercial),
    'list_utilisateurs.detail' => array($administrateur,$commercial), 
    'list_utilisateurs.archive' => array($administrateur,$commercial),
    'list_utilisateurs.suppression' => array($administrateur,$commercial),
    'statistiques_prospection.index' => array($administrateur,$commercial),
    'demande_des_devis.index' => array($administrateur,$commercial), 

    'articles_distribution_base_price.index' => array($administrateur,$commercial),
    'articles_distribution_base_price.nouveau' => array($administrateur,$commercial),
    'articles_distribution_base_price.modification' => array($administrateur,$commercial),
    'articles_distribution_base_price.detail' => array($administrateur,$commercial),  
    'articles_distribution_base_price.archive' => array($administrateur,$commercial),
    'articles_distribution_base_price.dupliquer' => array($administrateur,$commercial),
    'articles_distribution_base_price.suppression' => array($administrateur,$commercial), 

    'articles_distribution_price.index' => array($administrateur,$commercial),
    'articles_distribution_price.nouveau' => array($administrateur,$commercial),
    'articles_distribution_price.modification' => array($administrateur,$commercial),
    'articles_distribution_price.detail' => array($administrateur,$commercial),  
    'articles_distribution_price.archive' => array($administrateur,$commercial),
    'articles_distribution_price.dupliquer' => array($administrateur,$commercial),
    'articles_distribution_price.suppression' => array($administrateur,$commercial),  

//    'extra.index' => array($administrateur,$commercial), // toutes cibles externes

    'alertes.verification' => array(),
    'vues.ajax' => array()
);

//EXTRA MENU    
$menu_extra_actions = array('index','nouveau','modification','detail','archive','suppression','dupliquer');
$menu_extras = array(
    'newsous_traitants',    
    'servers',
    'hosts',
    'owners',
    'domains',
    'ips',
    'cartes_blues',
    'providers',
    'production_mails',
    'softwares',
    'message_list',
    'rbl_list',
    'global_list',
    'emailing',
    'manual_sending',
    'max_bulk',
    'pages_jaunes',
    'openemm',
    'sendgrid',
    'sendinblue',
    'airmail',
    'mailchimp',
    'ged',
    'vehicules',
    'livraisons',
    'amalgame',
    'telephones',
    'controle_recurrents',
    'gestion_heures',
    'objectif',
    'feuille_controle',
    'suivi_adwords',
    'factures_compta',
    'developpers_followup',
    'tests_followup'
);

foreach($menu_extras as $menu) {
    foreach($menu_extra_actions as $action) {
        $droits[$menu.".".$action] = $extra_profil;
    }
}

//temp set access profil to utilisateurs/accueil for all users can access this url
$droits['utilisateurs.accueil'] = $all_profils;
$droits['utilisateurs.logout'] = $all_profils;