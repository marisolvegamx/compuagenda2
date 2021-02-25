<?php namespace App\Http\Controllers;

	use App\Category;
use App\Contact;
use App\State;
use Session;
	use Request;
	use DB;
use CRUDBooster;

	class AdminCaContactos20Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = false;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "ca_contactos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nombre","name"=>"name"];
			$this->col[] = ["label"=>"Descrpción","name"=>"description"];
			$this->col[] = ["label"=>"Dirección","name"=>"adress"];
			$this->col[] = ["label"=>"Sitio de internet","name"=>"internet_adress"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nombre','name'=>'name','type'=>'text','validation'=>'required|min:3|max:70|regex:/^[0-9A-Za-z.\\-_ &]+$/','width'=>'col-sm-10','placeholder'=>'Puedes introducir solo una letra'];
			$this->form[] = ['label'=>'Descripción','name'=>'description','type'=>'textarea','validation'=>'required|min:5|max:5000|alpha_spaces','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Dirección','name'=>'adress','type'=>'text','validation'=>'required|min:1|max:255|alpha_spaces','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ca States Id','name'=>'ca_states_id','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Telefonos','name'=>'telephones','type'=>'text','validation'=>'required|min:1|max:255|string','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Dirección de internet','name'=>'internet_adress','type'=>'text','validation'=>'required|min:1|max:255|regex:/^[0-9A-Za-z.\\-_]+$/','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Evaluation','name'=>'evaluation','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:ca_contactos','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			$this->form[] = ['label'=>'Logo','name'=>'logo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cms Users Id','name'=>'cms_users_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nombre','name'=>'name','type'=>'text','validation'=>'required|min:3|max:70|regex:/^[0-9A-Za-z.\\-_&]+$/','width'=>'col-sm-10','placeholder'=>'Puedes introducir solo una letra'];
			//$this->form[] = ['label'=>'Descripción','name'=>'description','type'=>'textarea','validation'=>'required|min:5|max:5000|alpha_spaces','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Dirección','name'=>'adress','type'=>'text','validation'=>'required|min:1|max:255|alpha_spaces','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ca States Id','name'=>'ca_states_id','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Telefonos','name'=>'telephones','type'=>'text','validation'=>'required|min:1|max:255|string','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Dirección de internet','name'=>'internet_adress','type'=>'text','validation'=>'required|min:1|max:255|regex:/^[0-9A-Za-z.\\-_]+$/','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Evaluation','name'=>'evaluation','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:ca_contactos','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			//$this->form[] = ['label'=>'Logo','name'=>'logo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Cms Users Id','name'=>'cms_users_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	     
	        $this->sub_module = array();
	        $this->sub_module[] = ['label'=>'Categorias','path'=>'ca_contactos_subcategorias','parent_columns'=>'name','foreign_key'=>'ca_contactos_id','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }
	 
	    public function getEdit($id){
	        $contact=Contact::find($id);
// 	        die($contact->cms_users_id."--".\crocodicstudio\crudbooster\helpers\CRUDBooster::myId());
 	        if($contact->cms_users_id==\crocodicstudio\crudbooster\helpers\CRUDBooster::myId()){
	        $data["page-title"]="Editar contacto";
	        $data["categorias"]=Category::orderBy('name');
	        //cargo estados
	        $data["estados"]=State::all();
	        $data["contact"]=$contact;
	        $this->cbView("admin.contact_edit",$data);
	   }
 	        else 
 	        return    \crocodicstudio\crudbooster\helpers\CRUDBooster::redirect(\crocodicstudio\crudbooster\helpers\CRUDBooster::adminPath("ca_contactos20"),"Error de selección");
	    }
	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	        $query->where('cms_users_id',\crocodicstudio\crudbooster\helpers\CRUDBooster::myId());
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
         
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here
	        $postdata["cms_users_id"]=\crocodicstudio\crudbooster\helpers\CRUDBooster::myId();
	            //no puede editar
	        //    $this->alert[] = ['message'=>'No puede editar este dato','type'=>'danger'];
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}