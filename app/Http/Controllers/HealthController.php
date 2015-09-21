<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
		//echo "hi";  exit;
		$curl = curl_init();
		curl_setopt($curl , CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://vm3.in/rmiservice/health.org/support/city/*/pattern/*',
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS =>10,
		  CURLOPT_TIMEOUT =>30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
			'https://vm3.in/rmiservice/health.org/support/city/*/pattern/*'
		  ),

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data['hospitaldata'] = json_decode($response);
			$data['content_api'] = 'apidatatable';
				//$this->load->view('apidatafolder/apidata',$data);
				//var_dump($request->ajax());
				if ($request->ajax())
				{
					echo $response;
				}else{
					return View::make('apidatatable')->with('data', $data);
				}
				//echo $response;
		}
    }

	
	
	public function searchhospital()
  {
			
	if($this->input->post('submit')){

		$name = $_POST['keyword'];
		$city  = $_POST['city1'];
		
		if($name ==""){
			$name = "*";
		}else{
			$name = $_POST['keyword'];
		}
		
		if($city == ""){
			$city = "*";
		}else{
			
			$city  = $_POST['city1'];
		}
	$curl = curl_init();
	curl_setopt($curl , CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt_array($curl, array(
	 CURLOPT_URL => 'https://vm3.in/rmiservice/health.org/support/city/'.$city.'/pattern/'.$name,
	 CURLOPT_RETURNTRANSFER => true,
	 CURLOPT_ENCODING => "",
	 CURLOPT_MAXREDIRS =>10,
	  CURLOPT_TIMEOUT =>30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  
	  CURLOPT_HTTPHEADER => array(
		"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
		'https://vm3.in/rmiservice/health.org/support/city/'.$city.'/pattern/'.$name
	  ),

	));

	$response = curl_exec($curl);
	$err = curl_error($curl);


	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
		
		$data['searchnamehos'] = json_decode($response);
		$data['content_api'] = 'hossearchname';
			//$this->load->view('apidatafolder/apidata',$data);
			
			return $response;
		
		

	}

	}	
}

public function edit_hospitaldata()
	{
		 $id = $this->uri->segment(3);		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		 CURLOPT_URL => 'https://vm3.in/rmiservice/health.org/support/'.$id.'',
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS =>10,
		  CURLOPT_TIMEOUT =>30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D"
			
		  ),

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data['hospitaleditdata'] = json_decode($response);
			$data['content_api'] = 'edithospitaldata';
				$this->load->view('apidatafolder/apidata',$data);
		}
			}
			
			
			public function health_update()
			{
		$data=array(		
		'id'=>$this->input->post('id'),
		'name'=>$this->input->post('name'), 
		'address'=>$this->input->post('address'),
		'city'=>$this->input->post('city'),
		'contactNumber'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'pincode'=>$this->input->post('pincode'),
		'state'=>$this->input->post('state'),
		'type'=>$this->input->post('type'),
		'country'=>$this->input->post('country'));
		$id = $this->uri->segment(3);		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		 CURLOPT_URL => 'https://vm3.in/rmiservice/health.org/support/1d11af1271811a81a81c31b117d1251d91c5146149133124/'.$data,
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS =>10,
		  CURLOPT_TIMEOUT =>30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		  
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
			
		  ),

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data['hospitaleditdata'] = json_decode($response);
			$data['content_api'] = 'edithospitaldata';
				//$this->load->view('apidatafolder/apidata',$data);
				return $response;
		}
	}
	
		
public function update_data(){
		 $id = $this->input->post('id'); 	
		$name=$this->input->post('name'); 
		$address=$this->input->post('address');
		$city=$this->input->post('city');
		$contactNumber=$this->input->post('phone');
		$email=$this->input->post('email');
		$pincode=$this->input->post('pincode');
		$state=$this->input->post('state');
		$type=$this->input->post('type');
		$country=$this->input->post('country');

		//print_r($data);
		 //exit;
			
			$curl = curl_init();
		curl_setopt($curl , CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);



		$b = curl_setopt_array($curl, array(
		  CURLOPT_URL =>"https://vm3.in/rmiservice/health.org/support/1d11af1271811a81a81c31b117d1251d91c5146149133124/1e814118d11d17016c1d71351481f91f116f11d1551ad16e",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		 CURLOPT_POSTFIELDS => "{\n  \"name\": \"$name \",\n  \"id\": \"$id\",\n  \"type\": \"$type\",\n  \"address\": \"$address\",\n  \"pincode\": \"$pincode \",\n  \"city\": \"$city \",\n  \"country\": \"$country \",\n  \"state\": \"$state \",\n  \"contactNumber\": \"contactNumber \",\n  \"email\": \"$email \",\n  \"hasPHR\": false,\n  \"canUserChange\": false,\n  \"verified\": true,\n  \"portalLoginUrl\": null\n}",
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
			"content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		 $da=json_decode($response);
		 
		 
		redirect('health');
		}
			

}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
