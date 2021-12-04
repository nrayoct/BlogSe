<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blogs extends Migration
{
    public function up()
    {
        #forge->addfield ini utk buat table
        $this->forge->addField([
            'blog_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

        ]);
        //addkey ini utk jadiin blogid ini PK
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('blogs');
    }

    public function down()
    {
        //ini utk ngapus table/drop tabel baru abis tu create yg terbaru. ini berguna misal utk refresh blognya
        $this->forge->dropTable('blogs');
    }
}
