<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_t_openemm_child extends CI_Migration 
{
    public function up() 
    {
        $sql = <<<'EOT'
CREATE TABLE IF NOT EXISTS `t_openemm_child` (
  `openemm_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `operateur_qui_envoie` int(11) NOT NULL,
  `date_envoi` date DEFAULT NULL,
  `date_limite_de_fin` date DEFAULT NULL,
  `stats` varchar(55) NOT NULL,
  `segment_part` int(11) NOT NULL,
  `openemm` int(11) NOT NULL,
  `deliv_sur_test_orange` varchar(55) NOT NULL,
  `deliv_sur_test_free` varchar(55) NOT NULL,
  `deliv_sur_test_sfr` varchar(55) NOT NULL,
  `deliv_sur_test_gmail` varchar(55) NOT NULL,
  `deliv_sur_test_microsoft` varchar(55) NOT NULL,
  `deliv_sur_test_yahoo` varchar(55) NOT NULL,
  `deliv_sur_test_ovh` varchar(55) NOT NULL,
  `deliv_sur_test_oneandone` varchar(55) NOT NULL,
  `physical_server` varchar(55) NOT NULL,
  `smtp` varchar(55) NOT NULL,
  `rotation` varchar(5) NOT NULL,
  `inactive` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`openemm_child_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
EOT;
    
    $this->db->query($sql);
    }

    public function down() {
        $sql = <<<'EOT'
DROP TABLE IF EXISTS `t_openemm_child`;
EOT;
        $this->db->query($sql);
    }
}

// EOF
