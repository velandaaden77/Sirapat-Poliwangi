<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
        is_logged_in();
        $this->load->library('Telegram/Telegram_lib');
		
    }

    public function index(){

        $data['title'] = 'Share Undangan';
        $data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();
        
        $this->template->load('layout/template', 'undangan/sendtelegram', $data);

    }
    public function sendmessage(){

        $data = [
            'phone' => '6281332291361', // Receivers phone
            'body' => 'https://upload.wikimedia.org/wikipedia/ru/3/33/NatureCover2001.jpg', // Message
            'filename' => 'Sirapat.jpg', // Message
            'caption' => 'Bissmilah Wisuda!', // Message
            
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://eu146.chat-api.com/instance147383/sendMessage?token=2asy4tirshqi0jxw';
        // Make a POST request
        $options = stream_context_create(['http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $json
            ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);

        $data['title'] = 'Send Message';

        $data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();
        $this->template->load('layout/template', 'undangan/sendmessage', $data);

    }

    public function undangan(){

        
        $data['title'] = 'Send Telegram';
        $data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();
        $this->template->load('layout/template', 'undangan/sendtelegram', $data);
    }


    public function sendtelegram(){

        // $file = $_FILES['photo']['name'];

        // $bot = new \TelegramBot\Api\BotApi('1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8');
        // $chatId = '1292022051';
        // // $messageText ='hallo, Sayangkuh';
        // $document = 'absensi.pdf';
        // $bot->sendMessage($chatId, $document);

        // $chatId = $this->input->post('chat_id');
        // $caption = $this->input->post('caption');
        // $file = $_FILES['document']['name'];

        // $url = 'https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument?chat_id='.$chatId.'';

        // redirect('sirapat/admin/undangan');

        
        // $file_name = 'absensi.pdf';
        // $chat_id = '1292022051';
        // $data = [
        //     'caption' => 'Iki Caption',
        //     'chat_id' => $chat_id,
        //     'document' => Request::encodeFile('C:\Users\ACER\Downloads' . '/' . $file_name),
        // ];

        // return Request::sendDocument($data);

            // file_get_contents('https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument');

        // "https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument";
        // $url = 'https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument?chat_id=1292022051&text=hallo aden&docume';
        // $result = file_get_contents($url, true);
        // return $result;
        $data = [
        'chatId' => $this->input->post('chat_id'),
        'caption' => $this->input->post('caption'),
        'document' => $_FILES['document']['name'],
            ];

            $json = json_encode($data);

            

        $url = 'https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument?chat_id='.$chatId.'&caption='.$caption.'&document='.$document;
        // $url = 'https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument';

        // Make a POST request
        // $options = stream_context_create(['http' => [
        //     'method'  => 'POST',
        //     'header'  => 'Content-type: application/json',
        //     'content' => $json
        // ]
        // ]);

        // $result = file_get_contents($url);
        
        redirect('sirapat/admin/undangan');

        
       
    }

    public function kirim_laporan_rekap(){

		$bulanini = date('M');

		$lampiran = $_FILES['lampiran']['name'];
       		// $extension  = ".".pathinfo($lampiran, PATHINFO_EXTENSION);

		if($lampiran):
			$config['allowed_types'] = 'docx|xls|pdf';
			$config['max_size'] = '5000';
			$config['upload_path'] = './assets/dashboard/file/';
				// $config['file_name'] = 'Laporan_Rekap_Presensi '.$bulanini.$extension;
			$this->load->library('upload', $config);

			if($this->upload->do_upload('lampiran')):


					// $new_lampiran = $this->upload->data($config['file_name']);
					// $this->db->set('lampiran', $new_lampiran);

				try {
					// $this->telegram_lib->senddoc($nama_dokumen);
					$this->telegram_lib->senddoc($config['upload_path'].$lampiran, 'Laporan Rekap Presensi Bulan '.$bulanini);

                    

					if ($this->telegram_lib->senddoc($config['upload_path'].$config['file_name'], 'no caption')):
						$this->session->set_flashdata('message', 
							'<div class="alert alert-success" role="alert">Laporan rekap telah dikirim</div>');
						// $this->telegram_lib->sendmsg('Alhamdulillah Kekirim');
					endif;


					redirect('sirapat/admin/undangan/index');

				} catch (Exception $e) {
					$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">Laporan rekap gagal dikirim</div>');
				}

			else: 
					//jika tidak upload maka error
				echo $this->upload->display_errors();
			endif;
		endif;
    }
    
    public function sendwa(){

        // $lampiran = $_FILES['document']['name'];

		// if($lampiran){
        //     $config['allowed_types'] = 'docx|xls|pdf';
        //     $config['max_size'] = '2048';
        //     $config['upload_path'] = 'assets/dashboard/file/';

        //     $this->load->library('upload', $config);

        //     if($this->upload->do_upload('document')){
        //         //insert data file ke database
        //         $new_lampiran = $this->upload->data('file_name');
        //         $this->db->set('document', $new_lampiran);

        //         $my_apikey = "2IO9WT0L169697PFKKNA";
        //         $destination = "6283847876447";
        //         $message = $config['upload_path'].$config['file_name'];
        //         $api_url = "http://panel.rapiwha.com/send_message.php";
        //         $api_url .= "?apikey=".urlencode($my_apikey);
        //         $api_url .= "&number=".urlencode($destination);
        //         $my_result_object = json_decode(file_get_contents($api_url, false));
        //         echo "<br>Result: ".$my_result_object->success;
        //         echo "<br>Description: ".$my_result_object->description;
        //         echo "<br>Code: ".$my_result_object->result_code;
        //     }else {
        //         //jika tidak upload maka error
        //         echo $this->upload->display_errors();
        //     }
        // }
        
        $my_apikey = "2IO9WT0L169697PFKKNA";
        $destination = "6283847876447";
        $message = "https://ta.poliwangi.ac.id/~ti17034/assets/dashboard/file/Tes.pdf";
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=".urlencode($my_apikey);
        $api_url .= "&number=".urlencode($destination);
        $api_url .= "&text=".urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));

        $this->session->set_flashdata('message', 
        'Pesan Berhasil Di Kirim');
        redirect('sirapat/admin/agenda/index');

        // echo "<br>Result: ".$my_result_object->success;
        // echo "<br>Description: ".$my_result_object->description;
        // echo "<br>Code: ".$my_result_object->result_code;
    }

    public function sendtele(){
        $my_apikey = "2IO9WT0L169697PFKKNA";
        $destination = "6283847876447";
        $chat_id = "-431627117";
        $caption = $this->input->post('caption');
        $message = "https://ta.poliwangi.ac.id/~ti17034/assets/dashboard/file/Tes.pdf";
        $api_url = "https://api.telegram.org/bot1283571393:AAFUK0H1SvcIyD3YvYTt8b6CA1DtMQGZkzs/sendDocument";
        $api_url .= "?chat_id=".urlencode($chat_id);
        $api_url .= "&caption=".urlencode($caption);
        $api_url .= "&document=".urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));

        $this->session->set_flashdata('message', 
        'Pesan Berhasil Di Kirim');
        redirect('sirapat/admin/agenda/index');
    }
}