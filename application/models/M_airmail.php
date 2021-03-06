<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_airmail extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_champs($type, $data = null)
    {
        $champs = array(
            'read.parent'  => array(
                array('checkbox', 'text', "&nbsp;", 'checkbox'),
                array('airmail_id', 'ref', "airmail#", 'airmail', 'airmail_id', 'airmail_id'),
                //PARAMETRES
                array('software_nom', 'text', "Software", 'software_nom'),
                //INFO FACTURATION
                array('client_name', 'text', "Client", 'client_name'),
                array('commande_name', 'text', "Commande", 'commande_name'),
                array('facture_name', 'text', "Facture", 'facture_name'),
                array('ht', 'text', "HT", 'ht'),
                //MESSAGE
                array('message_numero', 'text', "Numéro", 'message_numero'),
                array('message_name', 'text', "Nom", 'message_name'),
                array('message_view', 'text', "View Message", 'message_view'),
                array('message_lien', 'text', 'Lien Pour Télécharger', 'message_lien'),
                array('message_object', 'text', 'Objet Du Message', 'message_object'),
                array('message_type', 'text', 'Type', 'message_type'),
                //CORPS DU MESSSAGE
                array('message_famille', 'text', "famille d'articles", 'message_famille'),
                array('message_societe', 'text', "société", 'message_societe'),
                array('message_commercial', 'text', "Commercial", 'message_commercial'),
                array('message_email', 'text', "e-mail du corps", 'message_email'),
                array('message_telephone', 'text', "telephone", 'message_telephone'),
                //SEGMENT
                array('segment_nom', 'text', "Segment Numéro", 'segment_nom'),
                array('critere', 'text', "Critere", 'critere'),
                array('date_envoi', 'date', "Date envoi", 'date_envoi'),
                array('date_limite_de_fin', 'date', "Date limite de fin", 'date_limite_de_fin'),
                array('quantite_envoyer', 'text', "Quantité à envoyer", 'quantite_envoyer'),

                array('view_detail', 'text', "View Detail", 'view_detail'),

                array('segment_part', 'text', "Segment number", 'segment_part'),
                // array('critere_one', 'text', "Critere 1", 'critere_one'), //
                // array('critere_two', 'text', "Critere 2", 'critere_two'), //
                // array('many_criterias', 'text', "As Many Criterias As Necessary", 'many_criterias'), //
                //ENVOI
                array('stats', 'text', "Stats", 'stats'),
                array('quantite_envoyee', 'text', "Quantité envoyée", 'quantite_envoyee'),
                array('open', 'text', "Open", 'open'),
                array('open_pourcentage', 'text', "Open %", 'open_pourcentage'),
                /*array('airmail_number_of_open', 'text', "Open", 'airmail_number_of_open'),
                array('airmail_open_rate', 'text', "%Open", 'airmail_open_rate'),*/
                array('airmail_number_of_click', 'text', "Click", 'airmail_number_of_click'),
                array('airmail_click_rate', 'text', "%Click", 'airmail_click_rate'),

                //DELIVRABILITE SUR TEST
                array('deliv_sur_test_orange', 'text', "Orange", 'deliv_sur_test_orange'),
                array('deliv_sur_test_free', 'text', "Free", 'deliv_sur_test_free'),
                array('deliv_sur_test_sfr', 'text', "SFR", 'deliv_sur_test_sfr'),
                array('deliv_sur_test_gmail', 'text', "Gmail", 'deliv_sur_test_gmail'),
                array('deliv_sur_test_yahoo', 'text', "Yahoo", 'deliv_sur_test_yahoo'),
                array('deliv_sur_test_microsoft', 'text', "Microsoft", 'deliv_sur_test_microsoft'),
                array('deliv_sur_test_ovh', 'text', "OVH", 'deliv_sur_test_ovh'),
                array('deliv_sur_test_oneandone', 'text', "1and1", 'deliv_sur_test_oneandone'),
                //TECHNICAL
                array('operateur_qui_envoie_name', 'text', "Opérateur qui envoie", 'operateur_qui_envoie_name'),
                array('physical_server', 'text', "Physical server", 'physical_server'),
                array('smtp', 'text', "SMTP", 'smtp'),
                array('rotation', 'text', "Rotation", 'rotation'),
            ),
            'read.child'   => array(),
            'write.parent' => array(
                'client'             => array("Client", 'select', array('client', 'ctc_id', 'ctc_nom'), false),
                'commande'           => array("Commande", 'select', array('commande', 'cmd_id', 'cmd_reference'), false),
                'message'            => array("Nom", 'select', array('message', 'message_list_id', 'name'), false),
                'segment_numero'     => array("Segment Numéro", 'select', array('segment_numero', 'id', 'value'), false),
                'segment_criteria'   => array("Criteria", 'textarea', 'segment_criteria', false),                
                'date_limite_de_fin' => array("Date Limite de Fin", 'date', 'date_limite_de_fin', false),
                'quantite_envoyer'   => array("Quantité à envoyer", 'text', 'quantite_envoyer', false),
            ),
            'write.child'  => array(
                'parent_id'                => array("Parent Sending", 'select', array('parent_id', 'id', 'value'), false),
                'date_envoi'               => array("Date Envoi", 'date', 'date_envoi', false),
                'operateur_qui_envoie'     => array("Opérateur qui envoie", 'select', array('operateur_qui_envoie', 'id', 'value'), false),
                'stats'                    => array("Stats", 'select', array('stats', 'id', 'value'), false),
                'segment_part'             => array("Segment number", 'select', array('segment_part', 'id', 'value'), false),

                'deliv_sur_test_orange'    => array("Orange", 'select', array('deliv_sur_test_orange', 'id', 'value'), false),
                'deliv_sur_test_free'      => array("Free", 'select', array('deliv_sur_test_free', 'id', 'value'), false),
                'deliv_sur_test_sfr'       => array("SFR", 'select', array('deliv_sur_test_sfr', 'id', 'value'), false),
                'deliv_sur_test_gmail'     => array("Gmail", 'select', array('deliv_sur_test_gmail', 'id', 'value'), false),
                'deliv_sur_test_yahoo'     => array("Yahoo", 'select', array('deliv_sur_test_yahoo', 'id', 'value'), false),
                'deliv_sur_test_microsoft' => array("Microsoft", 'select', array('deliv_sur_test_microsoft', 'id', 'value'), false),
                'deliv_sur_test_ovh'       => array("OVH", 'select', array('deliv_sur_test_ovh', 'id', 'value'), false),
                'deliv_sur_test_oneandone' => array("1and1", 'select', array('deliv_sur_test_oneandone', 'id', 'value'), false),

                'physical_server'          => array("Physical server", 'select', array('physical_server', 'id', 'value'), false),
                'smtp'                     => array("SMTP", 'select', array('smtp', 'id', 'value'), false),
                'rotation'                 => array("Rotation", 'select', array('rotation', 'id', 'value'), false),
                'quantite_envoyee'         => array("Quantité envoyee", 'text', 'quantite_envoyee', false),
                'open'                     => array("Open", 'text', 'open', false),
                'open_pourcentage'         => array("Open %", 'text', 'open_pourcentage', false),
            ),
        );

        if ($data != null) {
            $result = $champs[$type . "." . $data];
        } else {
            $result = array_merge($champs[$type . ".parent"], $champs[$type . ".child"]);
        }

        return $result;
    }

    /******************************
     * Liste Livraisons Data
     ******************************/
    public function liste($void, $limit = 10, $offset = 1, $filters = null, $ordercol = 2, $ordering = "asc")
    {
        //$this->load->helper("calcul_factures");
        $table = 't_airmail';
        $this->db->start_cache();

        $airmail_id = $table . ".airmail_id as RowID";
        $checkbox   = $table . ".airmail_id as checkbox";

        //$date_airmail = formatte_sql_date("date_airmail");
        /*$date_envoi                = "'' as date_envoi";
        $date_limite_de_fin        = "'' as date_limite_de_fin";*/
        $client                    = "ctc_nom";
        $client_name               = $client . " AS client_name";
        $commande                  = "CASE WHEN commande = -1 THEN 'Pas de Commande' ELSE cmd_reference END";
        $commande_name             = $commande . " AS commande_name";
        $operateur_qui_envoie      = "''";
        $operateur_qui_envoie_name = $operateur_qui_envoie . " AS operateur_qui_envoie_name";
        $message_numero            = $table . ".message as message_numero";
        $message_name              = "t_message.name as message_name";
        $message_lien              = "t_message.lien_pour_telecharger as message_lien";
        $message_object            = "t_message.object as message_object";
        $message_type              = "t_message.type as message_type";
        $message_telephone         = "t_message.telephone as message_telephone";
        $message_email             = "t_message.email as message_email";
        $message_famille           = "vf.vfm_famille AS message_famille";
        $message_societe           = "ts.scv_nom AS message_societe";
        $message_view              = "CONCAT('<a href=\"#\" class=\"view-text\" data-id=\"',t_airmail.message,'\" data-message=\"',t_message.message,'\">','Voir Message','</a>') as message_view";
        $message_commercial        = "t_salesman.emp_nom as message_commercial";
        $ht                        = "v_fac.total_ht AS ht";
        $airmail_current           = "'0' as airmail_current";
        $airmail_number_of_open    = "'0' as airmail_number_of_open";
        $airmail_open_rate         = "'0' as airmail_open_rate";
        $airmail_number_of_click   = "'0' as airmail_number_of_click";
        $airmail_click_rate        = "'0' as airmail_click_rate";
        $segment_part              = "'' as segment_part";
        $stats                     = "'' as stats";
        $physical_server           = "'' as physical_server";
        $smtp                      = "'' as smtp";
        $rotation                  = "'' as rotation";
        $date_envoi                = "'' as date_envoi";
        $segment_nom               = "CONCAT(t_segments.id,'-',t_segments.name) as segment_nom";
        $open                      = "(select SUM(open) from t_airmail_child where parent_id = airmail_id AND inactive IS NULL AND deleted IS NULL) as open";
        //$open_pourcentage = "'' as open_pourcentage";
        $open_pourcentage = "(select ROUND(AVG(open_pourcentage),1) from t_airmail_child where parent_id = airmail_id AND inactive IS NULL AND deleted IS NULL) as open_pourcentage";
        $quantite_envoyee = "(select SUM(quantite_envoyee) from t_airmail_child where parent_id = airmail_id AND inactive IS NULL AND deleted IS NULL) as quantite_envoyee";

        $this->db->select($table . ".*,
                $checkbox,
                $airmail_id,
                $client_name,
                $commande_name,
                facture_name,
                software_nom,
                $segment_nom,
                filtering,
                $ht,
                $operateur_qui_envoie_name,
                $date_envoi,
                date_limite_de_fin,
                quantite_envoyer,
                $open,
                $open_pourcentage,
                $message_numero,
                $message_name,
                $message_lien,
                $message_object,
                $message_type,
                $message_famille,
                $message_societe,
                $message_telephone,
                $message_email,
                $message_view,
                $message_commercial,
                $airmail_current,
                $airmail_number_of_open,
                $airmail_open_rate,
                $airmail_number_of_click,
                $airmail_click_rate,
                $quantite_envoyee,
                $segment_part,
                $stats,
                $physical_server,
                $smtp,
                $rotation
            ", false);
        $this->db->join('t_softwares', 'software=software_id', 'left');
        $this->db->join('t_contacts', 'ctc_id=client', 'left');
        $this->db->join('t_commandes', 'cmd_id=commande', 'left');
        $this->db->join('t_articles_devis', 'ard_devis=cmd_devis', 'left');
        $this->db->join('factures_view as v_fac', 'commande=fac_commande', 'left');
        $this->db->join('t_message_list as t_message', 't_message.message_list_id=' . $table . '.message', 'left');
        $this->db->join('v_familles as vf', 'vf.vfm_id = t_message.famille_darticles', 'left');
        $this->db->join('t_societes_vendeuses as ts', 'ts.scv_id = t_message.societe', 'left');
        $this->db->join('t_utilisateurs as t_util', 't_message.salesman = t_util.utl_id', 'left');
        $this->db->join('t_employes as t_salesman', 't_salesman.emp_id = t_util.utl_id', 'left');
        $this->db->join('t_segments', 't_segments.id=segment_numero', 'left');
        //$this->db->where("t_articles_devis.ard_description LIKE 'Envoi d''un email au %'");
        //$this->db->group_by($table . '.airmail_id');

        //customize filter quantite_envoyer using having not where because where in mysql not using group/aggregate function
        if ($filters != null) {
            if (array_key_exists("quantite_envoyer", $filters)) {
                $filters_quantite_envoyer = $filters['quantite_envoyer'];
                $input                    = $filters_quantite_envoyer['input'];

                if (is_numeric($input)) {
                    $this->db->having('SUM(ard_quantite) = ' . $input);
                }
                unset($filters["quantite_envoyer"]);
            }
        }

        switch ($void) {
            case 'archived':
                $this->db->where($table . '.inactive != "0000-00-00 00:00:00"');
                break;
            case 'deleted':
                $this->db->where($table . '.deleted != "0000-00-00 00:00:00"');
                break;
            case 'all':
                break;
            default:
                $this->db->where($table . '.inactive is NULL');
                $this->db->where($table . '.deleted is NULL');
                break;
        }

        $id = intval($void);
        if ($id > 0) {
            $this->db->where($table . '.airmail_id', $id);
        }

        $this->db->stop_cache();

        // aliases
        $aliases = array(
            'client_name'               => $client,
            'commande_name'             => $commande,
            'operateur_qui_envoie_name' => $operateur_qui_envoie,
            'ht'                        => 'v_fac.total_ht',
            'message_numero'            => $table . ".message",
            'message_name'              => 't_message.name',
            'message_lien'              => 't_message.lien_pour_telecharger',
            'message_object'            => 't_message.object',
            'message_type'              => 't_message.type',
            'message_telephone'         => 't_message.telephone',
            'message_email'             => 't_message.email',
            'message_famille'           => 'vf.vfm_famille',
            'message_societe'           => 'ts.scv_nom',
            'message_commercial'        => 't_salesman.emp_nom',
            'message_view'              => 't_message.message',
            'airmail_current'           => "tos.current",
            'airmail_number_of_open'    => "tos.number_of_open",
            'airmail_open_rate'         => "CONCAT(tos.open_rate * 100 , '%')",
            'airmail_number_of_click'   => "tos.number_of_click",
            'airmail_click_rate'        => "CONCAT(tos.click_rate * 100 , '%')",
        );

        $resultat = $this->_filtre($table, $this->liste_filterable_columns(), $aliases, $limit, $offset, $filters, $ordercol, $ordering);
        $this->db->flush_cache();

        //add checkbox into data
        for ($i = 0; $i < count($resultat['data']); $i++) {
            $resultat['data'][$i]->checkbox                 = '<input type="checkbox" name="ids[]" value="' . $resultat['data'][$i]->airmail_id . '">';
            $resultat['data'][$i]->deliv_sur_test_orange    = '';
            $resultat['data'][$i]->deliv_sur_test_free      = '';
            $resultat['data'][$i]->deliv_sur_test_sfr       = '';
            $resultat['data'][$i]->deliv_sur_test_gmail     = '';
            $resultat['data'][$i]->deliv_sur_test_yahoo     = '';
            $resultat['data'][$i]->deliv_sur_test_microsoft = '';
            $resultat['data'][$i]->deliv_sur_test_ovh       = '';
            $resultat['data'][$i]->deliv_sur_test_oneandone = '';
            //get quantity envoyer from t_articles_devis
            //$resultat['data'][$i]->qty_envoyer = $this->calc_qty_envoyer($resultat['data'][$i]->commande);
            $resultat['data'][$i]->critere_one    = '';
            $resultat['data'][$i]->critere_two    = '';
            $resultat['data'][$i]->many_criterias = '';

            $resultat['data'][$i]->view_detail = '<a href="#" data-id="' . $resultat['data'][$i]->airmail_id . '" class="btn-view-detail">view detail</a>';

            $critere = "";
            if ($resultat['data'][$i]->filtering != null) {
                $filtering     = json_decode($resultat['data'][$i]->filtering);
                $filtering_arr = (array) $filtering;
                $n             = 0;

                foreach ($filtering_arr as $key => $val) {
                    if ($n % 2 == 0) {
                        $name = $key . "(" . $val . ") : ";
                    }

                    if ($n % 2 == 0) {
                        $critere .= $key . "(" . $val . ") : ";
                    }

                    if ($n % 2 != 0) {
                        if ($val != "") {
                            $critere .= $val . "<br>";
                        } else {
                            $critere .= "<br>";
                        }
                    }

                    $n++;
                }
            }

            $resultat['data'][$i]->critere = $critere;
        }

        return $resultat;
    }

    public function liste_child($void, $parent_id = 0, $limit = 10, $offset = 1, $filters = null, $ordercol = 2, $ordering = "asc")
    {
        $this->load->helper("calcul_factures");
        $table = 't_airmail';
        $this->db->start_cache();

        $airmail_id = $table . ".airmail_id as RowID";
        $checkbox   = $table . ".airmail_id as checkbox";

        $client                    = "ctc_nom";
        $client_name               = $client . " AS client_name";
        $commande                  = "CASE WHEN commande = -1 THEN 'Pas de Commande' ELSE cmd_reference END";
        $commande_name             = $commande . " AS commande_name";
        $operateur_qui_envoie      = "t_operator.emp_nom";
        $operateur_qui_envoie_name = $operateur_qui_envoie . " AS operateur_qui_envoie_name";
        $message_numero            = $table . ".message as message_numero";
        $message_name              = "t_message.name as message_name";
        $message_lien              = "t_message.lien_pour_telecharger as message_lien";
        $message_object            = "t_message.object as message_object";
        $message_type              = "t_message.type as message_type";
        $message_telephone         = "t_message.telephone as message_telephone";
        $message_email             = "t_message.email as message_email";
        $message_famille           = "vf.vfm_famille AS message_famille";
        $message_societe           = "ts.scv_nom AS message_societe";
        $message_view              = "CONCAT('<a href=\"#\" class=\"view-text\" data-id=\"',t_airmail.message,'\" data-message=\"',t_message.message,'\">','Voir Message','</a>') as message_view";
        $message_commercial        = "t_salesman.emp_nom as message_commercial";
        $ht                        = "v_fac.total_ht AS ht";
        $airmail_current           = "'0' as airmail_current";
        $airmail_number_of_open    = "'0' as airmail_number_of_open";
        $airmail_open_rate         = "'0' as airmail_open_rate";
        $airmail_number_of_click   = "'0' as airmail_number_of_click";
        $airmail_click_rate        = "'0' as airmail_click_rate";

        $this->db->select($table . ".*, t_airmail_child.*,
                $checkbox,
                $airmail_id,
                $client_name,
                $commande_name,
                facture_name,
                software_nom,
                date_envoi,
                t_airmail_child.open,
                t_airmail_child.open_pourcentage,
                $ht,
                $operateur_qui_envoie_name,
                $message_numero,
                $message_name,
                $message_lien,
                $message_object,
                $message_type,
                $message_famille,
                $message_societe,
                $message_telephone,
                $message_email,
                $message_view,
                $message_commercial,
                $airmail_current,
                $airmail_number_of_open,
                $airmail_open_rate,
                $airmail_number_of_click,
                $airmail_click_rate
            ", false);
        $this->db->join('t_airmail_child', 'parent_id=' . $table . '.airmail_id', 'inner');
        $this->db->join('t_softwares', 'software=software_id', 'left');
        $this->db->join('t_contacts', 'ctc_id=client', 'left');
        $this->db->join('t_commandes', 'cmd_id=commande', 'left');
        $this->db->join('t_articles_devis', 'ard_devis=cmd_devis', 'left');
        $this->db->join('t_employes as t_operator', 't_operator.emp_id=operateur_qui_envoie', 'left');
        $this->db->join('factures_view as v_fac', 'commande=fac_commande', 'left');
        $this->db->join('t_message_list as t_message', 't_message.message_list_id=' . $table . '.message', 'left');
        $this->db->join('v_familles as vf', 'vf.vfm_id = t_message.famille_darticles', 'left');
        $this->db->join('t_societes_vendeuses as ts', 'ts.scv_id = t_message.societe', 'left');
        $this->db->join('t_utilisateurs as t_util', 't_message.salesman = t_util.utl_id', 'left');
        $this->db->join('t_employes as t_salesman', 't_salesman.emp_id = t_util.utl_id', 'left');
        $this->db->where('parent_id', $parent_id);

        //$this->db->where("t_articles_devis.ard_description LIKE 'Envoi d''un email au %'");
        //$this->db->group_by($table . '.airmail_id');

        //customize filter quantite_envoyer using having not where because where in mysql not using group/aggregate function
        if ($filters != null) {
            if (array_key_exists("quantite_envoyer", $filters)) {
                $filters_quantite_envoyer = $filters['quantite_envoyer'];
                $input                    = $filters_quantite_envoyer['input'];

                if (is_numeric($input)) {
                    $this->db->having('SUM(ard_quantite) = ' . $input);
                }
                unset($filters["quantite_envoyer"]);
            }
        }

        switch ($void) {
            case 'archived':
                $this->db->where('t_airmail_child.inactive IS NOT NULL');
                break;
            case 'deleted':
                $this->db->where('t_airmail_child.deleted IS NOT NULL');
                break;
            case 'all':
                break;
            default:
                $this->db->where('t_airmail_child.inactive is NULL');
                $this->db->where('t_airmail_child.deleted is NULL');
                break;
        }

        $id = intval($void);
        if ($id > 0) {
            $this->db->where('airmail_child_id', $id);
        }

        $this->db->stop_cache();

        // aliases
        $aliases = array(
            'client_name'               => $client,
            'commande_name'             => $commande,
            'operateur_qui_envoie_name' => $operateur_qui_envoie,
            'ht'                        => 'v_fac.total_ht',
            'message_numero'            => $table . ".message",
            'message_name'              => 't_message.name',
            'message_lien'              => 't_message.lien_pour_telecharger',
            'message_object'            => 't_message.object',
            'message_type'              => 't_message.type',
            'message_telephone'         => 't_message.telephone',
            'message_email'             => 't_message.email',
            'message_famille'           => 'vf.vfm_famille',
            'message_societe'           => 'ts.scv_nom',
            'message_commercial'        => 't_salesman.emp_nom',
            'message_view'              => 't_message.message',
            'airmail_current'           => "tos.current",
            'airmail_number_of_open'    => "tos.number_of_open",
            'airmail_open_rate'         => "CONCAT(tos.open_rate * 100 , '%')",
            'airmail_number_of_click'   => "tos.number_of_click",
            'airmail_click_rate'        => "CONCAT(tos.click_rate * 100 , '%')",
        );

        $resultat = $this->_filtre($table, $this->liste_filterable_columns(), $aliases, $limit, $offset, $filters, $ordercol, $ordering);
        $this->db->flush_cache();

        //add checkbox into data
        for ($i = 0; $i < count($resultat['data']); $i++) {
            $resultat['data'][$i]->checkbox = '<input type="checkbox" name="ids[]" value="' . $resultat['data'][$i]->airmail_id . '">';

            //get quantity envoyer from t_articles_devis
            //$resultat['data'][$i]->qty_envoyer = $this->calc_qty_envoyer($resultat['data'][$i]->commande);

            $resultat['data'][$i]->segment_numero = '';
            $resultat['data'][$i]->critere        = '';
            $resultat['data'][$i]->critere_one    = '';
            $resultat['data'][$i]->critere_two    = '';
            $resultat['data'][$i]->many_criterias = '';
        }

        return $resultat;
    }

    /******************************
     * Return filterable columns
     ******************************/
    public function liste_filterable_columns()
    {
        $filterable_columns = array(
            'operateur_qui_envoie_name' => 'char',
            'date_envoi'                => 'date',
            'date_limite_de_fin'        => 'date',
            'stats'                     => 'char',
            'client_name'               => 'char',
            'commande_name'             => 'char',
            'facture_name'              => 'char',
            'ht'                        => 'int',
            'quantite_envoyer'          => 'int',
            'message_numero'            => 'int',
            'message_name'              => 'char',
            'message_lien'              => 'char',
            'message_object'            => 'char',
            'message_type'              => 'char',
            'message_telephone'         => 'char',
            'message_email'             => 'char',
            'message_famille'           => 'char',
            'message_societe'           => 'char',
            'message_commercial'        => 'char',
            'message_view'              => 'char',
            'segment_part'              => 'char',
            'deliv_sur_test_orange'     => 'char',
            'deliv_sur_test_free'       => 'char',
            'deliv_sur_test_sfr'        => 'char',
            'deliv_sur_test_gmail'      => 'char',
            'deliv_sur_test_yahoo'      => 'char',
            'deliv_sur_test_microsoft'  => 'char',
            'deliv_sur_test_ovh'        => 'char',
            'deliv_sur_test_oneandone'  => 'char',
            'physical_server'           => 'char',
            'smtp'                      => 'char',
            'rotation'                  => 'char',
            'quantite_envoyer'          => 'int',
            'airmail_current'           => 'int',
            'airmail_number_of_open'    => 'int',
            'airmail_open_rate'         => 'int',
            'airmail_number_of_click'   => 'int',
            'airmail_click_rate'        => 'int',
            'open'                      => 'int',
            'open_pourcentage'          => 'double',

        );

        return $filterable_columns;
    }

    /******************************
     * Detail d'une airmail
     ******************************/
    public function detail($id)
    {
        $this->load->helper("calcul_factures");
        //$date_envoi                = formatte_sql_date("date_envoi");
        $date_limite_de_fin        = formatte_sql_date("date_limite_de_fin");
        $client                    = "ctc_nom";
        $client_name               = $client . " AS client_name";
        $commande                  = "CASE WHEN commande = -1 THEN 'Pas de Commande' ELSE cmd_reference END";
        $commande_name             = $commande . " AS commande_name";
        $operateur_qui_envoie      = "t_operator.emp_nom";
        $operateur_qui_envoie_name = $operateur_qui_envoie . " AS operateur_qui_envoie_name";

        $message_name       = "t_message.name as message_name";
        $message_lien       = "t_message.lien_pour_telecharger as message_lien";
        $message_object     = "t_message.object as message_object";
        $message_type       = "t_message.type as message_type";
        $message_telephone  = "t_message.telephone as message_telephone";
        $message_email      = "t_message.email as message_email";
        $message_famille    = "vf.vfm_famille AS message_famille";
        $message_societe    = "ts.scv_nom AS message_societe";
        $message_view       = "t_message.message as message_view";
        $message_commercial = "t_salesman.emp_nom as message_commercial";

        $this->db->select("tmb.*,
                airmail_id as checkbox,
                airmail_id,
                $client_name,
                $commande_name,
                fac_id,
                fac_tva,
                fac_reference as facture,
                $operateur_qui_envoie_name,
                $date_limite_de_fin,
                $message_name,
                $message_lien,
                $message_object,
                $message_type,
                $message_famille,
                $message_societe,
                $message_telephone,
                $message_email,
                $message_view,
                $message_commercial
            ", false);
        $this->db->join('t_contacts', 'ctc_id=client', 'left');
        $this->db->join('t_commandes', 'cmd_id=commande', 'left');
        $this->db->join('t_employes as t_operator', 't_operator.emp_id=operateur_qui_envoie', 'left');
        $this->db->join('t_factures', 'commande=fac_commande', 'left');
        $this->db->join('t_message_list as t_message', 't_message.message_list_id=tmb.message', 'left');
        $this->db->join('v_familles as vf', 'vf.vfm_id = t_message.famille_darticles', 'left');
        $this->db->join('t_societes_vendeuses as ts', 'ts.scv_id = t_message.societe', 'left');
        $this->db->join('t_utilisateurs as t_util', 't_message.salesman = t_util.utl_id', 'left');
        $this->db->join('t_employes as t_salesman', 't_salesman.emp_id = t_util.utl_id', 'left');

        $this->db->where('airmail_id = "' . $id . '"');
        $q = $this->db->get('t_airmail as tmb');
        if ($q->num_rows() > 0) {
            $resultat = $q->row();
            //get facture ht
            $facture          = new stdClass;
            $facture->fac_id  = $resultat->fac_id;
            $facture->fac_tva = $resultat->fac_tva;
            $data_factures    = calcul_factures($facture);
            $resultat->ht     = $data_factures->fac_montant_ht;

            //get quantity envoyer from t_articles_devis
            $resultat->qty_envoyer = $this->calc_qty_envoyer($resultat->commande);

            //get airmail data
            /*$airmail_data                      = $this->get_mailing_detail($resultat->airmail);
            $resultat->airmail_name            = $airmail_data['airmail_name'];
            $resultat->airmail_current         = $airmail_data['airmail_current'];
            $resultat->airmail_number_of_open  = $airmail_data['airmail_number_of_open'];
            $resultat->airmail_open_rate       = ($airmail_data['airmail_open_rate'] * 100) . '%';
            $resultat->airmail_number_of_click = $airmail_data['airmail_number_of_click'];
            $resultat->airmail_click_rate      = ($airmail_data['airmail_click_rate'] * 100) . '%';*/

            return $resultat;
        } else {
            return null;
        }
    }

    public function detail_for_form($id)
    {
        $this->db->select('*');
        $this->db->where('airmail_id = "' . $id . '"');
        $q = $this->db->get('t_airmail');
        if ($q->num_rows() > 0) {
            $resultat = $q->row();
            return $resultat;
        } else {
            return null;
        }
    }

    public function detail_for_form_child($id)
    {
        $this->db->select('*');
        $this->db->where('airmail_child_id = "' . $id . '"');
        $q = $this->db->get('t_airmail_child');
        if ($q->num_rows() > 0) {
            $resultat = $q->row();
            return $resultat;
        } else {
            return null;
        }
    }

    /******************************
     * New Livraisons insert into t_airmail table
     ******************************/
    public function nouveau($data)
    {
        return $this->_insert('t_airmail', $data);
    }

    public function nouveau_child($data)
    {
        return $this->_insert('t_airmail_child', $data);
    }

    /******************************
     * Updating airmail data
     ******************************/
    public function maj($data, $id)
    {
        return $this->_update('t_airmail', $data, $id, 'airmail_id');
    }

    public function maj_child($data, $id)
    {
        return $this->_update('t_airmail_child', $data, $id, 'airmail_child_id');
    }

    /******************************
     * Archive airmail data
     ******************************/
    public function archive($id)
    {
        return $this->_delete('t_airmail', $id, 'airmail_id', 'inactive');
    }

    public function archive_child($id)
    {
        return $this->_delete('t_airmail_child', $id, 'airmail_child_id', 'inactive');
    }

    /******************************
     * Archive airmail data
     ******************************/
    public function remove($id)
    {
        return $this->_delete('t_airmail', $id, 'airmail_id', 'deleted');
    }

    public function remove_child($id)
    {
        return $this->_delete('t_airmail_child', $id, 'airmail_child_id', 'deleted');
    }

    /******************************
     *
     ******************************/
    public function unremove($id)
    {
        $data = array('deleted' => null, 'inactive' => null);
        return $this->_update('t_airmail', $data, $id, 'airmail_id');
    }

    public function parent_option()
    {
        $query = $this->db->select("airmail_id as id, CONCAT(airmail_id,'-',t_message.name) as value")
            ->join('t_message_list as t_message', 't_message.message_list_id=t_airmail.message', 'left')
            ->where('t_airmail.inactive is NULL')
            ->where('t_airmail.deleted is NULL')
            ->get('t_airmail');

        return $query->result();
    }

    public function commande($airmail_id)
    {
        $this->db->select("
                tc.cmd_id,
                tc.cmd_reference
            ");
        $this->db->join('t_devis as td', 'td.dvi_client = tmb.client', 'inner');
        $this->db->join('t_commandes as tc', 'tc.cmd_devis = td.dvi_id');
        $this->db->where('tmb.airmail_id = "' . $airmail_id . '"');
        $q                         = $this->db->get('t_airmail tmb');
        $resultat                  = $q->result();
        $new_object                = new stdClass;
        $new_object->cmd_id        = "-1";
        $new_object->cmd_reference = 'Pas de Commande';
        array_unshift($resultat, $new_object);

        return $resultat;
    }

    public function commande_by_client($client_id)
    {
        $this->db->select("
                tc.cmd_id,
                tc.cmd_reference
            ");
        $this->db->join('t_devis as td', 'td.dvi_client = tcs.ctc_id', 'inner');
        $this->db->join('t_commandes as tc', 'tc.cmd_devis = td.dvi_id');
        $this->db->where('tcs.ctc_id = "' . $client_id . '"');
        $q = $this->db->get('t_contacts tcs');
        return $q->result();
    }

    public function stats_option()
    {
        $values = array('oui', 'non');
        return $this->form_option($values);
    }

    public function message_option()
    {
        $this->db->select('message_list_id as id, name as value');
        $q = $this->db->get('t_message_list');
        return $q->result();
    }

    public function client_option()
    {
        $this->db->order_by('ctc_nom', 'ASC');
        $q = $this->db->get('t_contacts');
        return $q->result();
    }

    public function utilisateurs_option()
    {
        $this->db->select('emp_id as id, emp_nom as value');
        //$this->db->order_by('utl_login','ASC');
        $q = $this->db->get('t_employes');
        return $q->result();
    }

    public function segment_part_option()
    {
        $values = range(1, 100);
        return $this->form_option($values);
    }

    public function verification_number_option()
    {
        $values = array('yes', 'no');
        return $this->form_option($values);
    }

    public function delivrabilite_sur_test_option()
    {
        $values = array('spam', 'not delivered', 'delivered', 'bl IP', 'bl domain', 'bl message');
        return $this->form_option($values);
    }

    public function physical_server_option()
    {
        $values = array('server1', 'server2');
        return $this->form_option($values);
    }

    public function smtp_option()
    {
        $values = array('mx.smtp.fr', 'mxg.125hjk.fr');
        return $this->form_option($values);
    }

    public function rotation_option()
    {
        $values = array('Yes', 'No');
        return $this->form_option($values);
    }

    public function form_option($values, $inc_index = false)
    {
        for ($i = 0; $i < count($values); $i++) {
            $val = new stdClass();
            if ($inc_index) {
                $val->id = $i;
            } else {
                $val->id = $values[$i];
            }

            $val->value = $values[$i];
            $result[$i] = $val;
        }
        return $result;
    }

    public function get_facture($data)
    {
        $data->facture = '';
        $data->ht      = 0;
        // récupération des lignes de la facture
        if ($data->commande != 0) {
            $factures = $this->db->query("SELECT fac_id,fac_reference FROM t_factures WHERE fac_commande =" . $data->commande);

            if ($factures->num_rows() > 0) {
                foreach ($factures->result() as $row) {
                    /** PUSH FACTURES */
                    $data->facture .= $row->fac_reference . " <br />";
                }
            }
        }

        if ($data->dvi_id) {
            /** CALCULATE HT */
            $q = $this->db->query("SELECT art_code,ard_prix,ard_quantite,ard_remise_ht FROM t_articles_devis LEFT JOIN t_articles ON art_id=ard_article WHERE ard_inactif IS NULL AND ard_devis=" . $data->dvi_id);

            if ($q->num_rows() > 0) {
                $articles = $q->result();
                // calcul des montants HT et TTC
                $ht     = 0;
                $remise = 0;
                foreach ($articles as $a) {
                    if ($a->art_code == 'R') {
                        $remise += $a->ard_prix;
                    } else {
                        $ht += $a->ard_prix * $a->ard_quantite - $a->ard_remise_ht;
                    }
                }
                $ht       = $ht * (1 - $remise);
                $data->ht = $ht;
            }
        }

        return $data;
    }

    public function facture_option($commande)
    {
        $this->db->select("*");
        $this->db->where('fac_commande = "' . $commande . '"');
        $result = $this->db->get('t_factures')->result();
        if (count($result)) {
            $facture         = $result[0];
            $data['facture'] = $facture->fac_reference;

            //calculate ht
            $this->load->helper("calcul_factures");
            $data_factures = calcul_factures($facture);
            $data['ht']    = $data_factures->fac_montant_ht;
        } else {
            $data['facture'] = '';
            $data['ht']      = 0;
        }
        return $data;
    }

    /***************************/
    /*  airmail Integration    */
    /***************************/
    public function get_mailing()
    {
        $query = $this->db->select('mailing_id as id, shortname as value')
            ->where("deleted != 1")
            ->get('t_mailing_tbl')->result();
        return $query;
    }

    /*public function get_mailing_detail($id)
    {
    $query = $this->db->get_where('t_airmail_stats', array('airmail_id' => $id));

    if ($query->row()) {
    $row  = $query->row();
    $data = array(
    'airmail_name'             => '',
    'airmail_open_rate'        => $row->open_rate,
    'airmail_bounce_rate'      => $row->bounce_rate,
    'airmail_hard_bounce_rate' => $row->hard_bounce_rate,
    'airmail_soft_bounce_rate' => $row->soft_bounce_rate,
    'airmail_click_rate'       => $row->click_rate,
    'airmail_number_of_open'   => $row->number_of_open,
    'airmail_number_of_click'  => $row->number_of_click,
    'airmail_total'            => $row->total,
    'airmail_current'          => $row->current,
    'airmail_opened'           => 0,
    );

    return $data;
    } else {
    return false;
    }
    }*/

    public function calc_qty_envoyer($commande)
    {
        $q = $this->db->query("SELECT * FROM t_commandes
                                    INNER JOIN t_articles_devis ON ard_devis = cmd_devis
                                    WHERE cmd_id = $commande AND ard_description LIKE 'Envoi d''un email au %'  ");

        $total = 0;
        foreach ($q->result() as $row) {
            $total = $total + $row->ard_quantite;
        }

        return $total;
    }

}

/* End of file M_airmail.php */
/* Location: .//tmp/fz3temp-1/M_airmail.php */
