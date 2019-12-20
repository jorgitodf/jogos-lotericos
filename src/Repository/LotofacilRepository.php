<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;
use App\Models\Lotofacil;
use Illuminate\Support\Facades\DB;

class LotofacilRepository extends DefaultRepository
{
    
    /**
     * LotofacilRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Lotofacil::class);
    }

    public function insertAllDatas(array $data) 
    {
        $i = 0;
        $ni = 0;

        foreach ($data as $row) {
            $return = self::findByField('numero_concurso', $row['numero_concurso']);

            if (count($return) === 0) {
                Lotofacil::create(['data' => $row['data'], 'numero_concurso'=> $row['numero_concurso'],
                'bola1'=> $row['bola1'], 'bola2'=> $row['bola2'], 'bola3'=> $row['bola3'], 'bola4'=> $row['bola4'], 
                'bola5'=> $row['bola5'], 'bola6'=> $row['bola6'], 'bola7'=> $row['bola7'], 'bola8'=> $row['bola8'], 
                'bola9'=> $row['bola9'], 'bola10'=> $row['bola10'], 'bola11'=> $row['bola11'], 'bola12'=> $row['bola12'], 
                'bola13'=> $row['bola13'], 'bola14'=> $row['bola14'], 'bola15'=> $row['bola15'],                     
                'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                $i++;
            } else {
                $ni++;
            }
        }

        return $array = ['i' => $i, 'ni' => $ni];
    }

}