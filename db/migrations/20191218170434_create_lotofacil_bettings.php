<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateLotofacilBettings extends AbstractMigration
{
    public function up() {
        $this->table('lotofacil_bettings')
            ->addColumn('bola1', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola2', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola3', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola4', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola5', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola6', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola7', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola8', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola9', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola10', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola11', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola12', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola13', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola14', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('bola15', 'integer', ['limit' => MysqlAdapter::INT_SMALL])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->save();
    }
    
    public function down() {
        $this->dropTable('lotofacil_bettings');
    }
}
