<?php
declare(strict_types = 1);
namespace App\Plugins;

use Interop\Container\ContainerInterface;
use App\Models\User;
use App\Model\Lotofacil;
use App\Repository\RepositoryFactory;
use App\Repository\LotofacilRepository;
use App\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;  
use App\Repository\StatementRepository;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();
        
        $container->add('repository.factory', new RepositoryFactory());

        $container->addLazy('user.repository', function(ContainerInterface $container){
            return $container->get('repository.factory')->factory(User::class);
        });

        $container->addLazy('lotofacil.repository', function(){
            return new LotofacilRepository();
        });
       
        $container->addLazy('statement.repository', function(){
            return new StatementRepository();
        });
    }
}