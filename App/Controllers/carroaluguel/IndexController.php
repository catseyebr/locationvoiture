<?php
    
    namespace Carroaluguel\Controllers\carroaluguel;
    
    use Core\Controller;
    use Carroaluguel\Models\Financeiro\StatusVenda;
    use Core\DateTimeUnit;
    use Core\Period;
    use Jenssegers\Agent\Agent;
    use Psr\Http\Message\ServerRequestInterface;

    class IndexController extends Controller
    {
        public function __construct($generator)
        {
            parent::__construct($generator);
        }
        
        public function actionHello()
        {
            $locadoras = $this->aluguelcarros->listGrupos(array('locadora'=>124));
            var_dump($locadoras);

        }
        
        public function home()
        {
            $dados = array(
                'test' => 'CarroAluguel.net!'
            );
            $this->render('home.tpl',$dados);
        }
        
        public function statusVendaList()
        {
            $repository = $this->entityManager->getRepository(StatusVenda::class);
            $statusvendas = $repository->findAll();
            $dados = [
                'statusvendas' => $statusvendas
            ];
            $this->render('statusvenda/list.tpl',$dados);
        }
        
        public function statusVendaCreate()
        {
            $this->render('statusvenda/create.tpl');
        }
        
        public function statusVendaStore(ServerRequestInterface $request)
        {
            $data = $request->getParsedBody();
            $statusvenda = new StatusVenda();
            $statusvenda->setNome($data['name']);
            $this->entityManager->persist($statusvenda);
            $this->entityManager->flush();
            $this->redirect('statusvenda.list');
        }
    
        public function statusVendaEdit(ServerRequestInterface $request)
        {
            $id = $request->getAttribute('id');
            $repository = $this->entityManager->getRepository(StatusVenda::class);
            $statusvenda = $repository->find($id);
            $dados = [
                'statusvenda' => $statusvenda
            ];
            $this->render('statusvenda/edit.tpl',$dados);
        }
        public function statusVendaUpdate(ServerRequestInterface $request)
        {
            $id = $request->getAttribute('id');
            $repository = $this->entityManager->getRepository(StatusVenda::class);
            $statusvenda = $repository->find($id);
            $data =$request->getParsedBody();
            $statusvenda->setNome($data['name']);
            $this->entityManager->flush();
            $this->redirect('statusvenda.list');
        }
        public function statusVendaRemove(ServerRequestInterface $request)
        {
            $id = $request->getAttribute('id');
            $repository = $this->entityManager->getRepository(StatusVenda::class);
            $statusvenda = $repository->find($id);
            $this->entityManager->remove($statusvenda);
            $this->entityManager->flush();
            $this->redirect('statusvenda.list');
        }

        public function getCss(){
            echo 'css';
        }
    }