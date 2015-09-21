<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
		
			$curl = curl_init();
		curl_setopt($curl , CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		 CURLOPT_URL => 'http://vm3.in/rmiservice/doctors/support/city/Hyderabad/email/*/phone/*/pattern/*/pageno/1',
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS =>10,
		  CURLOPT_TIMEOUT =>30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
			'http://vm3.in/rmiservice/doctors/support/city/Hyderabad/email/*/phone/*/pattern/*/pageno/1'
		  ),

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);


		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data['doctorsdata'] = json_decode($response);
			$data['content_api'] = 'doctorsdatatable';
				//$this->load->view('apidatafolder/apidata',$data);
				
				return $response;
		}
    }
	
		
public function searchdoctor()
{
		
		if($this->input->post('submit')){

		$name = $_POST['name1'];
			$email  = $_POST['email1'];
			
			if($name ==""){
				$name = "*";
			}else{
				$name = $_POST['name1'];
			}
			
			if($email == ""){
				$email = "*";
			}else{
				
				$email  = $_POST['email1'];
			}

			
			
		$curl = curl_init();
		curl_setopt($curl , CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		 CURLOPT_URL => 'http://vm3.in/rmiservice/doctors/support/city/Hyderabad/email/'.$email.'/phone/*/pattern/'.$name.'/pageno/1',
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS =>10,
		  CURLOPT_TIMEOUT =>30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  
		  CURLOPT_HTTPHEADER => array(
			"authorization: 1451021C5135-19817918917B-1C91C613C115-1E616814E16D",
			'http://vm3.in/rmiservice/doctors/support/city/Hyderabad/email/'.$email.'/phone/*/pattern/'.$name.'/pageno/1'
		  ),

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			
			$data['searchnamedoc'] = json_decode($response);
			$data['content_api'] = 'docsearchname';
				//$this->load->view('apidatafolder/apidata',$data);
				
				return $response;
			
			

		}

		}	
}


public function edit_doctordata()
	{
		 $id = $this->uri->segment(3);		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt_array($curl, array(
		 CURLOPT_URL => 'https://vm3.in/rmiservice/doctors/support/'.$id.'',
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
			$data['doctoreditdata'] = json_decode($response);
			$data['content_api'] = 'editdoctordata';
				//$this->load->view('apidatafolder/apidata',$data);
				return $response;
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
