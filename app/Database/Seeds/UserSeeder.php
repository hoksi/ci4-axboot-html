<?php

namespace App\Database\Seeds;

/**
 * Description of UserSeeder
 *
 * @author hoksi
 * @property \CodeIgniter\Database\BaseConnection $db
 */
class UserSeeder extends \CodeIgniter\Database\Seeder
{

    public function run()
    {
        // Using Query Builder
        $this->db->table(TBL_USER)->replace([
            'cu_idx' => 1,
            'user_id' => 'system',
            'user_pw' => password_hash('1234', PASSWORD_DEFAULT)
        ]);
    }
}