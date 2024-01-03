<?php

namespace common;

require_once ("a_content.php");
require_once ("json_loader.php");

class page
{
    private a_content $content;
    private array $pages;
    private string $pages_file = "data/pages.json";

    public function __construct(a_content $content){
		//session_start(); 
        $this->content = $content;
        $this->pages = json_loader::get_full_info($this->pages_file);
        $this->create_headers();
        $this->create_body();
        $this->finish_page();
    }

    private function create_headers(): void
    {
        ?>
        <!DOCTYPE HTML>
        <html lang="ru"><head>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <script src="js/bootstrap.bundle.min.js"></script>
			
			<?php
			$pi = $this->get_current_page_info();
			print("<title>{$pi['name']}</title>")
			
			?>
        </head><body>
        <?php
    }

    private function create_body(): void
    {
        $this->create_body_head();
        print ('<div class="container-fluid mx-0 my-0 g-0 w-100 text-center ">');
        print ('<div class="row align-items-start w-100 mx-0 g-1">');
		print('<div class="col-xl-3 col-4 mb-0 pb-0 mx-0 sticky-top px-1 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 overflow-y-scroll vh-100">');
        $this->create_menu();
		print ('</div>');
        print ('<div class="col-xl-9 col-8">');
		print('<div class="row row-lg-4 mx-0 g-1 px-0">');
		print('<div class=" col-xl-12">');
        $this->content->show_content();
		print ('</div>');
		print ('</div>');
        print ('</div>');
        print ('</div>');
		print ('</div>');
        $this->create_footer();
    }

    private function finish_page(): void
    {
        print("</body></html>");
    }

    private function create_body_head(): void
    {
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary " style="height:100px;"  data-bs-theme="dark">
  <div class="container-fluid w-100 g-0 mx-0">
  <div class="row w-100 gap-0 g-0 mx-0 d-md-flex text-center  text-white fs-3" >
  <div class="col-12 ">
  
  <?php
  $pi = $this->get_current_page_info();
      print("<p >{$pi['header']}</p>");
	  
	  
	  ?>
	  </div>
      </div>
  
    
  </div>
</nav>
        <?php
    }

    private function create_menu(): void
    {
        print ('<ul class="list-unstyled mb-1 mt-1 text-start">');
        foreach ($this->pages as $page){
            
            $pi = $this->get_current_page_info();
            
            if (strcmp($pi['uri'], $page['uri']) === 0){
                print ("<li class='d-inline fw-bold mb-1'>{$page['header']}</li>");
            } else {
				print('<li class="mb-1">');
                print ("<a href='{$page['uri']}' class='link-dark link-offset-2-hover link-underline-opacity-0 link-underline-opacity-100-hover'>{$page['header']}</a>");
				print('</li>');
            }
        }
		print('</ul>');
        
    }

    private function create_footer(): void
    {
        print ('<div class="row w-100 gap-0 g-0 mx-0 mb-0 d-md-flex text-center  text-white">');
        print ('<div class="col-12 text-white bg-dark border border-dark  text-end py-4 px-2" style="height:100px;" >&copy Азат Халиуллин, 2023.</div>');
        print ('</div>');
    }

    private function get_current_page_info(): array | null
    {
		$file = preg_replace('/\\?.*/', '', basename($_SERVER['REQUEST_URI']));
        foreach ($this->pages as $page){
            if (strcmp($file, $page['uri']) === 0 || isset($page['alias']) && strcmp($file, $page['alias']) === 0){
                return $page;
            }
        }
        return null;
    }

}