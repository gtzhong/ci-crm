<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Softwares extends MY_Controller {

	private $profil;
    private $barre_action = array(
        "Softwares" => array(
            array(
                "Nouveau" => array('softwares/nouveau', 'plus', true, 'softwares_nouveau', null, array('form')),
            ),
            array(
                //"Consulter" => array('softwares/detail', 'eye-open', false, 'softwares_detail'),
                "Consulter/Modifier"  => array('softwares/modification', 'pencil', false, 'softwares_modification', null, array('form')),
                "Supprimer" => array('softwares/remove', 'trash', false, 'softwares_supprimer',"Veuillez confirmer la suppression du software", array('confirm-delete' => array('softwares/index'))),
            ),
            array(
                "Voir la liste" => array('#', 'th-list', true, 'voir_liste'),
    		),
    		array(
                "Export xlsx"   => array('#', 'list-alt', true, 'export_xls'),
                "Export pdf"    => array('#', 'book', true, 'export_pdf'),
    			"Imprimer"		=> array('#', 'print', true, 'print_list'),
            ),
        )
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_softwares');
    }

    /******************************
     * List of softwares Data
     ******************************/
    public function index($id = 0, $liste = 0)
    {
        $this->liste($id = 0, '');
    }

    public function archiver()
    {
        $this->liste($id = 0, 'archiver');
    }

    public function supprimees()
    {
        $this->liste($id = 0, 'supprimees');
    }

    public function all()
    {
        $this->liste($id = 0, 'all');
    }

    public function liste($id = 0, $mode = 0)
    {
        // commandes globales
        $cmd_globales = array(
            // array("Ajouter un e-mailing pages jaunes","softwares/nouveau",'default')
        );

        // toolbar
        $toolbar = '';

        $menu_extra = '';

        // descripteur
        $descripteur = array(
            'datasource'         => 'softwares/index',
            'detail'             => array('softwares/detail', 'software_id', 'description'),
            'archive'            => array('softwares/archive', 'software_id', 'archive'),
            'champs'             => $this->m_softwares->get_champs('read'),
            'filterable_columns' => $this->m_softwares->liste_filterable_columns(),
        );

        //determine json script that will be loaded
        //for eg: softwares/archived_json in kendo_grid-js
        switch ($mode) {
            case 'archiver':
                $descripteur['datasource'] = 'softwares/archived';
                break;
            case 'supprimees':
                $descripteur['datasource'] = 'softwares/deleted';
                break;
            case 'all':
                $descripteur['datasource'] = 'softwares/all';
                break;
        }

        $this->session->set_userdata('_url_retour', current_url());
        $scripts = array();

        $scripts[] = $this->load->view("templates/datatables-js",
            array(
                'id'                    => $id,
                'descripteur'           => $descripteur,
                'toolbar'               => $toolbar,
                'controleur'            => 'softwares',
                'methode'               => 'index',
                'mass_action_toolbar'   => true,
                'view_toolbar'          => true,
            ), true);
        $scripts[] = $this->load->view("softwares/liste-js", array(), true);
        // listes personnelles
        $vues = $this->m_vues->vues_ctrl('softwares', $this->session->id);
        $data = array(
            'title'        => "Liste suivi des Hebergeurs",
            'page'         => "templates/datatables",
            'menu'         => "Extra|Softwares",
            'scripts'      => $scripts,
            'barre_action' => $this->barre_action['Softwares'],
            'menu_extra'   => $menu_extra,
            'values'       => array(
                'id'           => $id,
                'vues'         => $vues,
                'cmd_globales' => $cmd_globales,
                'toolbar'      => $toolbar,
                'descripteur'  => $descripteur,
            ),
        );
        $layout = "layouts/datatables";
        $this->load->view($layout, $data);
    }

    /******************************
     * Ajax call for Livraison List
     ******************************/
    public function index_json($id = 0)
    {
        $pagelength = $this->input->post('length');
        $pagestart  = $this->input->post('start');

        $order   = $this->input->post('order');
        $columns = $this->input->post('columns');
        $filters = $this->input->post('filters');
        if (empty($filters)) {
            $filters = null;
        }

        $filter_global = $this->input->post('filter_global');
        if (!empty($filter_global)) {

            // Ignore all other filters by resetting array
            $filters = array("_global" => $filter_global);
        }

        if($this->input->post('export')) {
            $pagelength = false;
            $pagestart = 0;
        }

        if (empty($order) || empty($columns)) {

            //list with default ordering
            $resultat = $this->m_softwares->liste($id, $pagelength, $pagestart, $filters);
        } else {

            //list with requested ordering
            $order_col_id = $order[0]['column'];
            $ordering     = $order[0]['dir'];

            // tables for LINK columns
            $tables = array(
                'software_id' => 't_softwares',
            );
            if ($order_col_id >= 0 && $order_col_id <= count($columns)) {
                $order_col = $columns[$order_col_id]['data'];
                if (empty($order_col)) {
                    $order_col = 2;
                }

                if (isset($tables[$order_col])) {
                    $order_col = $tables[$order_col] . '.' . $order_col;
                }

                if (!in_array($ordering, array("asc", "desc"))) {
                    $ordering = "asc";
                }

                $resultat = $this->m_softwares->liste($id, $pagelength, $pagestart, $filters, $order_col, $ordering);
            } else {
                $resultat = $this->m_softwares->liste($id, $pagelength, $pagestart, $filters);
            }
        }

        if($this->input->post('export')) {
            //action export data xls
            $champs = $this->m_softwares->get_champs('read');
            $params = array(
                'records' => $resultat['data'], 
                'columns' => $champs,
                'filename' => 'Softwares'
            );
            $this->_export_xls($params);
        } else {
            $this->output->set_content_type('application/json')
            ->set_output(json_encode($resultat));
        }
    }

    public function archived_json($id = 0)
    {
        $this->index_json('archived');
    }

    public function deleted_json($id = 0)
    {
		$this->index_json('deleted');
    }
	
    public function all_json($id = 0)
    {
		$this->index_json('all');
    }

    /******************************
     * New nouveau
     ******************************/
    public function nouveau($id=0, $ajax=false)
    {
        $this->load->helper(array('form', 'ctrl'));
        $this->load->library('form_validation');

        // règles de validation
        $config = array(
            array('field' => 'software_nom', 'label' => "Software nom", 'rules' => 'trim|required'),
        );

        // validation des fichiers chargés
        $validation = true;

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() and $validation) {

            // validation réussie
            $valeurs = array(
                'software_nom'           => $this->input->post('software_nom'),
            );

            $resultat = $this->m_softwares->nouveau($valeurs);

            if ($resultat === false) {
                $this->my_set_action_response($ajax, false);
            }
            else {
                $ajaxData = array(
                     'event' => array(
                         'controleur' => $this->my_controleur_from_class(__CLASS__),
                         'type' => 'recordadd',
                         'id' => $resultat,
                         'timeStamp' => round(microtime(true) * 1000),
                     ),
                 );
                $this->my_set_action_response($ajax, true, "Hebergeur a été enregistré avec succès",'info', $ajaxData);
            }
            if ($ajax) {
                return;
            }

            $redirection = $this->session->userdata('_url_retour');
            if (! $redirection) $redirection = '';
            redirect($redirection); 
            
        } else {
            // validation en échec ou premier appel : affichage du formulaire
            $valeurs                = new stdClass();
            $listes_valeurs         = new stdClass();
            $valeurs->software_nom           = $this->input->post('software_nom');

            $scripts = array();

            // descripteur
            $descripteur = array(
                'champs'  => $this->m_softwares->get_champs('write'),
                'onglets' => array(),
            );

            $data = array(
                'title' => "Ajouter un nouveau Hebergeur",
                'page' => "templates/form",
                'menu' => "Agenda|Nouveau Softwares",              
                'values' => $valeurs,
                'action' => "création",
                'multipart' => false,
                'confirmation' => 'Enregistrer',
                'controleur' => 'softwares',
                'methode' => __FUNCTION__,
                'descripteur' => $descripteur,
                'listes_valeurs' => $listes_valeurs
            );

            $this->my_set_form_display_response($ajax, $data);
        }
    }

     /******************************
     * Edit modification
     ******************************/
    public function modification($id = 0, $ajax=false)
    {
        $this->load->helper(array('form', 'ctrl'));
        $this->load->library('form_validation');

        // règles de validation
        $config = array(
            array('field' => 'software_nom', 'label' => "Software nom", 'rules' => 'trim|required'),
        );

        // validation des fichiers chargés
        $validation = true;

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() and $validation) {

            // validation réussie
            $valeurs = array(
                'software_nom'           => $this->input->post('software_nom'),
            );

            $resultat = $this->m_softwares->maj($valeurs, $id);

            if ($resultat === false) {
                $this->my_set_action_response($ajax, false);
            }
            else {
                 if ($resultat == 0) {
                     $message = "Pas de modification demandée";
                     $ajaxData = null;
                 }
                 else {
                     $message = "Hebergeur a été modifié";
                     $ajaxData = array(
                     'event' => array(
                     'controleur' => $this->my_controleur_from_class(__CLASS__),
                     'type' => 'recordchange',
                     'id' => $id,
                     'timeStamp' => round(microtime(true) * 1000),
                     ),
                     );
                 }
                $this->my_set_action_response($ajax, true, $message, 'info', $ajaxData);
            }
            
            if ($ajax) {
                return;
            }

            $redirection = 'softwares/detail/'.$id;
            redirect($redirection);
            
        } else {

            // validation en échec ou premier appel : affichage du formulaire
            $valeurs = $this->m_softwares->detail($id);
            $scripts = array();
			
			$listes_valeurs = new stdClass();

            // descripteur
            $descripteur = array(
                'champs'  => $this->m_softwares->get_champs('write'),
                'onglets' => array(),
            );           

            $data = array(
                'title' => "Modifier Hebergeur",
                'page' => "templates/form",
                'menu' => "Extra|Edit Softwares",
                'scripts' => $scripts,
                'id' => $id,
                'values' => $valeurs,
                'action' => "modif",
                'multipart' => false,
                'confirmation' => 'Enregistrer',
                'controleur' => 'softwares',
                'methode' => 'modification',
                'descripteur' => $descripteur,
                'listes_valeurs' => $listes_valeurs
            );
            $this->my_set_form_display_response($ajax,$data);
        }
    }

     /******************************
     * Detail 
     ******************************/
    public function detail($id)
    {
        $this->load->helper(array('form', 'ctrl'));
        if (count($_POST) > 0) {
            $redirection = $this->session->userdata('_url_retour');
            if (!$redirection) {
                $redirection = '';
            }

            redirect($redirection);
        } else {
            $valeurs = $this->m_softwares->detail($id);

            $cmd_globales = array();

            // commandes locales
            $cmd_locales = array(
                array("Modifier", 'softwares/modification', 'primary'),
                array("Archiver", 'softwares/archive', 'warning'),
                array("Supprimer", 'softwares/remove', 'danger'),
            );

            // descripteur
            $descripteur = array(
                'champs'  => array(
                    'software_nom' => array("Software nom", 'VARCHAR 50', 'text', 'software_nom'),
                ),
                'onglets' => array(),
            );

            $data = array(
                'title'        => "Détail of Hebergeur",
                'page'         => "templates/detail",
                'menu'         => "Extra|Softwares",
                'id'           => $id,
                'values'       => $valeurs,
                'controleur'   => 'softwares',
                'methode'      => 'detail',
                'cmd_globales' => $cmd_globales,
                'cmd_locales'  => $cmd_locales,
                'descripteur'  => $descripteur,
            );
            $layout = "layouts/standard";
            $this->load->view($layout, $data);
        }
    }

    /******************************
     * Archive Purchase Data
     ******************************/
    public function archive($id)
    {
        $resultat = $this->m_softwares->archive($id);
        if ($resultat === false) {
            if (null === $this->session->flashdata('danger')) {
                $this->session->set_flashdata('danger', "Un problème technique est survenu - veuillez reessayer ultérieurement");
            }
            $redirection = $this->session->userdata('_url_retour');
            if (!$redirection) {
                $redirection = '';
            }

            redirect($redirection);
        } else {
            $this->session->set_flashdata('success', "Hebergeur a été archivé");
            $redirection = $this->session->userdata('_url_retour');
            if (!$redirection) {
                $redirection = '';
            }

            redirect($redirection);
        }
    }

    /******************************
     * Delete 
     ******************************/
    public function remove($id, $ajax=false)
    {
        if ($this->input->method() != 'post') {
            die;
        }
        
        $redirection = $this->session->userdata('_url_retour');
        if (!$redirection) {
            $redirection = '';
        }

        $resultat = $this->m_softwares->remove($id);

        if ($resultat === false) {
            $this->my_set_action_response($ajax, false);
        } else {
            $ajaxData = array(
                'event' => array(
                    'controleur' => $this->my_controleur_from_class(__CLASS__),
                    'type'       => 'recorddelete',
                    'id'         => $id,
                    'timeStamp'  => round(microtime(true) * 1000),
                    'redirect'   => $redirection,
                ),
            );
            $this->my_set_action_response($ajax, true, "Hebergeur a été supprimé", 'info', $ajaxData);
        }

        if ($ajax) {
            return;
        }        

        redirect($redirection);        
    }

    public function mass_archiver()
    {
        $ids = json_decode($this->input->post('ids'), true); //convert json into array
        foreach ($ids as $id) {
            $resultat = $this->m_softwares->archive($id);
        }
    }

    public function mass_remove()
    {
        $ids = json_decode($this->input->post('ids'), true); //convert json into array
        foreach ($ids as $id) {
            $resultat = $this->m_softwares->remove($id);
        }
    }

    public function mass_unremove()
    {
        $ids = json_decode($this->input->post('ids'), true); //convert json into array
        foreach ($ids as $id) {
            $resultat = $this->m_softwares->unremove($id);
        }
    }


}

/* End of file Softwares.php */
/* Location: .//tmp/fz3temp-1/Softwares.php */