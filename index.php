<?php
require_once ("common/page.php");
require_once ("common/a_content.php");

class index extends \common\a_content {
	
	private string $image = "data/image1.jpg";
	
    public function show_content(): void {
				
        print ('<div class="card text-justify bg-body-secondary h-100 my-2 pe-0 me-0">');
        print('<div class="row g-0 ">');
        print('<div class="col-12 col-md-4">');
        print("<img src='{$this->image}' class='img-fluid rounded-start p-1' alt='image1'>")
	  ?>
    </div>
    <div class="col-12 col-md-8">
      <div class="card-body">
        <h5 class="card-title">Общие сведения</h5>
        <ul class="list-group list-group-horizontal w-100 text-start ">
  <li class="list-group-item flex-fill w-100 text-break">ФИО</li>
  <li class="list-group-item flex-fill w-100">Халиуллин Азат Ильгамович</li>
</ul>
<ul class="list-group list-group-horizontal w-100 text-start">
  <li class="list-group-item flex-fill w-100">Институт</li>
  <li class="list-group-item flex-fill w-100">ИМиМ</li>
</ul>
<ul class="list-group list-group-horizontal w-100 text-start">
  <li class="list-group-item flex-fill w-100">Направление</li>
  <li class="list-group-item flex-fill w-100">Математика и компьютерные науки</li>
</ul>
<ul class="list-group list-group-horizontal w-100 text-start">
  <li class="list-group-item flex-fill w-100">Специализация</li>
  <li class="list-group-item flex-fill w-100 ">Методы математического и алгоритмического моделирования общенаучных и прикладных задач</li>
</ul>
<ul class="list-group list-group-horizontal w-100 text-start">
  <li class="list-group-item flex-fill w-100">№ группы</li>
  <li class="list-group-item flex-fill w-100">05-214</li>
</ul>
      </div>
    </div>
  </div>
</div>
		
		<?php
    }
}

$content = new index();
new \common\page($content);