<?php

namespace Tour\Http\Controllers;

use Illuminate\Http\Request;

use Tour\Http\Requests;

use Tour\Repositories\PortfoliosRepository;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep) {
    	
    	parent::__construct(new \Tour\Repositories\MenusRepository(new \Tour\Menu));
    	
    	$this->p_rep = $p_rep;

    	$this->template = env('THEME').'.portfolios';
		
	}
	
	public function index()
    {
        //
        $this->title = 'Галлерея';
		    $this->keywords = 'Туры';
		    $this->meta_desc = 'Отдых';
		
		$portfolios = $this->getPortfolios();

        $content = view(env('THEME').'.portfolios_content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);
        
         
        return $this->renderOutput();
    }
    
    public function getPortfolios($take = FALSE,$paginate = TRUE) {
			$portfolios = $this->p_rep->get('*',$take,$paginate);
			if($portfolios) {
				$portfolios->load('filter');
			}
			
			return $portfolios;
	}

	//детальный просмотр галлереи
	public function show($alias) {
		
		//выборка определенной записи из бд
		$portfolio = $this->p_rep->one($alias);
		$portfolios = $this->getPortfolios(config('settings.other_portfolios'), FALSE);
		
		$this->title = $portfolio->title;
		$this->keywords = $portfolio->keywords;
		$this->meta_desc = $portfolio->meta_desc;
		
		//обращение к макету при нажатии на заголовок под картинкой в галлереи
		$content = view(env('THEME').'.portfolio_content')->with(['portfolio' => $portfolio,'portfolios' => $portfolios])->render();
		$this->vars = array_add($this->vars,'content',$content);

        
		return $this->renderOutput();
	}

}
