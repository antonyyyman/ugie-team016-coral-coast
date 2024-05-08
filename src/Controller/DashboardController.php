<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class DashboardController extends AppController
{

    public function index() {
        $tables = $this ->getTableNames();
        $this->set('tables',$tables);
    }

    private function getTableNames()
    {
        $connection = $this->getConnection();
        $tables = $connection->execute("SHOW TABLES")->fetchAll('assoc');
        $tableNames = [];
        foreach ($tables as $table) {
            $tableNames[] = $table['Tables_in_' . $connection->config()['database']];
        }
        return $tableNames;
    }

    private function getConnection()
    {
        return ConnectionManager::get('default');
    }


}
