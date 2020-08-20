<?php namespace App\Models;
    use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = TABLENAME;
    protected $DBGroup = DATABASENAME;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    function __construct()
    {
        parent::__construct();
        $fields = [
            'id'          => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'unique'         => TRUE,
                'primary'       => TRUE,
            ],
            'title'       => [
                    'type'           => 'TEXT',
            ],
            'description'      => [
                    'type'           =>'VARCHAR',
                    'constraint'     => 255,
                    'default'        => '',
            ],
            'image'      => [
                'type'           =>'VARCHAR',
                'constraint'     => 255,
                'default'        => '',
            ],
            'status'      => [
                    'type'           => 'ENUM',
                    'constraint'     => ['Enabled', 'Disabled'],
                    'default'        => 'Enabled',
            ],
        ];

        $forge1 = \Config\Database::forge();
        if ($forge1->createDatabase(DATABASENAME,TRUE)) {
          //  $this->myforge=\Config\Database::forge(DATABASENAME);
        }
        $db = \Config\Database::connect(DATABASENAME);
        $forge= \Config\Database::forge(DATABASENAME);
        $forge->addField($fields);
        $forge->createTable(TABLENAME, TRUE);
        $query1="ALTER TABLE `basic` ADD COLUMN create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ADD COLUMN update_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        if($db->fieldExists('create_at',TABLENAME)==false) $db->query($query1);
    }   
    public function getPosts($slug = null)
    {
        if (!$slug) {
            return $this->findAll();
        }
        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
    public function insertData( $data )
    {
        # code...
        $this->db->table(TABLENAME)->insert($data);
    }
    public function updateData($id, $data )
    {
        $db = \Config\Database::connect(DATABASENAME);
        $builder=$db->table(TABLENAME);
        $builder->where('id',$id);
        $builder->update($data);
    }
    public function deleteData($id){
        $db = \Config\Database::connect(DATABASENAME);
        $builder=$db->table(TABLENAME);
        $builder->where('id',$id);
        $builder->delete();
    }
}