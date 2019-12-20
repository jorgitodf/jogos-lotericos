<?php

use Psr\Http\Message\ServerRequestInterface;
use App\Helpers\ValidacaoLotofacil;


$app
    ->get('/lotofacil', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'lotofacil/index.html.twig', ['title' => 'Lotofácil']
            );
        }, 'lotofacil.index'
    )
    ->get('/lotofacil/new', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'lotofacil/create.html.twig', ['title' => 'Novo Concurso Lotofácil']
            );
        }, 'lotofacil.new'
    )
    ->post('/lotofacil/create', function (ServerRequestInterface $request) use ($app) {
            $json = "";
            $view = $app->service('view.renderer');
            $repository = $app->service('lotofacil.repository');
            $data = $request->getParsedBody();

            $json = ValidacaoLotofacil::validateConcurso($data);

            if (!$json) {

                $result = $repository->findByField('numero_concurso', (int)$data['numero_concurso']);

                if (count($result) === 0) {
                    $repository->create($data);
                    $json = array('status' => 'success', 'message' => "Concurso Cadastrado com Sucesso!");
                    //return $view->render('lotofacil/create.html.twig', ['title' => 'Novo Concurso Lotofácil']);
                } else {
                    $json = array('status' => 'error', 'message' => "Concurso de Número {$data['numero_concurso']} já está Cadastrado!");
                }
    
                
                    
            }


            return new \Zend\Diactoros\Response\JsonResponse($json);


        }, 'lotofacil.create'

    )
    ->get('/lotofacil/import', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render(
                'lotofacil/import.html.twig', ['title' => 'Importar Resultados dos Concursos da Lotofácil']
            );
        }, 'lotofacil.import'  
    )
    ->post('/lotofacil/importing', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('lotofacil.repository');
            $arquivo = "";
            $json = ""; 

            $ext = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
            $arq = $_FILES['arquivo']['tmp_name'];

            if (empty($arq)) {
                $json = array('status' => 'error', 'message' => "Selecione o Arquivo a ser importado!");
            } 

            if (!empty($arq) && $ext != "xml") {
                $json = array('status' => 'error', 'message' => "O Arquivo deve ser do tipo XML!");
            } 
            
            if (!empty($arq) && $ext === "xml") {

                $arquivo = new DomDocument();
                $arquivo->load($arq);
                
                $linhas = $arquivo->getElementsByTagName("Row");

                $primeira_linha = true;

                $i = 0;
                foreach ($linhas as $linha) {
                    ini_set('memory_limit', '-1');

                    if ($primeira_linha == false) {
                        $data[$i]['data'] = date('Y-m-d', strtotime($linha->getElementsByTagName("Data")->item(1)->nodeValue));
                        $data[$i]['numero_concurso'] = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                        $data[$i]['bola1'] = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                        $data[$i]['bola2'] = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                        $data[$i]['bola3'] = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                        $data[$i]['bola4'] = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                        $data[$i]['bola5'] = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                        $data[$i]['bola6'] = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                        $data[$i]['bola7'] = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                        $data[$i]['bola8'] = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                        $data[$i]['bola9'] = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
                        $data[$i]['bola10'] = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
                        $data[$i]['bola11'] = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
                        $data[$i]['bola12'] = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
                        $data[$i]['bola13'] = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
                        $data[$i]['bola14'] = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
                        $data[$i]['bola15'] = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
                        $data[$i]['created_at'] = date('Y-m-d H:i:s');
                        $data[$i]['updated_at'] = date('Y-m-d H:i:s');
                    }  
                    $primeira_linha = false; 

                    $i++;  
                } 

                $return = $repository->insertAllDatas($data);

                if ($return['i'] === 0 && $return['ni'] > 0) {
                    $json = array('status' => 'success', 'message' => "Nenhum Concurso Importado!");
                } else if ($return['i'] > 0 && $return['ni'] > 0) {
                    $json = array('status' => 'success', 'message' => "Importação Realizada com Sucesso! Total: {$return['i']}");
                }

            }

            return new \Zend\Diactoros\Response\JsonResponse($json);

        }, 'lotofacil.importing'

    );