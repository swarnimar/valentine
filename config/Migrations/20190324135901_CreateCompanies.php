<?php
use Migrations\AbstractMigration;

class CreateCompanies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('companies');
        $table->addColumn('cid', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('website_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('image_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('image_path', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'cid',
        ], [
            'name' => 'UNIQUE_CID',
            'unique' => true,
        ]);
        $table->create();
    }
}
