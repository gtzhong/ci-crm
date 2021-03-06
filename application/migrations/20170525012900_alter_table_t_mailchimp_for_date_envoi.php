<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_table_t_mailchimp_for_date_envoi extends CI_Migration {

	public function up() {
		$sql = <<<'EOT'
ALTER TABLE  `t_mailchimp` DROP  `date_envoi` ;
EOT;
        $this->db->query($sql);
	}

	public function down() {
		$sql = <<<'EOT'
ALTER TABLE  `t_mailchimp` ADD  `date_envoi` DATE NULL AFTER  `commande` ;
EOT;
        $this->db->query($sql);
	}

}

/* End of file 20170525012900_alter_table_t_mailchimp_for_date_envoi.php */
/* Location: .//tmp/fz3temp-1/20170525012900_alter_table_t_mailchimp_for_date_envoi.php */