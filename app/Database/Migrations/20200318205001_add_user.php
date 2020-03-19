<?php namespace App\Database\Migrations;
class AddUser extends \CodeIgniter\Database\Migration {
    public function up()
    {
        $this->forge->addField([
            'cu_idx' => [
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'user_pw' => [
                'type' => 'VARCHAR',
                'constraint' => '128'
            ]
        ]);

        $this->forge->addPrimaryKey('cu_idx');
        $this->forge->addKey('user_id');
        $this->forge->createTable(TBL_USER);
    }

    public function down()
    {
        $this->forge->dropTable(TBL_USER);
    }
}