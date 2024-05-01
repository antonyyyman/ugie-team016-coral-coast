<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;




?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

    <main class="main">
    <img alt="Plane booked through Coral Coast" src="https://www.forbes.com/advisor/wp-content/uploads/2021/03/traveling-based-on-fare-deals.jpg" width="100%" height="600px" />
        <div class="container text-center">
            <h1>
            CORAL COAST TRAVEL AGENCY
            </h1>

            <h2><li><a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Enquire Here</a></li></h2>
        </div>
    </main>
</body>

</html>
